<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebSiteElementRequest;
use App\Models\WebSiteElements;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class WebSiteElementsController extends Controller
{
    
    use CommonFunctions;
    const ELEMENTS = [
        "Logo",
        "home_page_title",
        "our_story_home_page_title",
        "our_story_home_page",
        "our_vision_home_page",
        "our_vision_check_point_1",
        "our_vision_check_point_2",
        "our_vision_check_point_3",
        "about_us_home_page_title",
        "our_services_home_page_title",
        "address",
        "contact_us_email",
        "contact_us_contact_number",
        "follow_us_text",
        "twitter_link",
        "facebook_link",
        "linked_in_link",
        "instagram_link",
        "regular_opening_days",
        "regular_opening_timings",
        "weekend_opening_days",
        "weekend_opening_timings",
        "news_letter_text",
        "about_us_our_story_heading",
        "about_us_our_story_text",
        "about_us_page_image",
        "about_us_our_vision_heading",
        "about_us_our_vision_check_point_1",
        "about_us_our_vision_check_point_2",
        "about_us_our_vision_check_point_3",
        "menu_page_title",
        "service_page_title",
        "testimonials_page_title",
        "contact_us_page_title",
        "testimonial_form_heading",
        "testimonial_form_side_text",
        "offer_percentage_text",
        "offer_heading_home_page",
        "offer_text_home_page",
        "offer_homepage_point_1",
        "offer_homepage_point_2",
        "offer_homepage_point_3",
        "retail_rostary_text",
        "retail_rostary_image",
        "cafe_service_text",
        "cafe_service_image",
        "corporate_vending_machine_service_image",
        "cart_duplication_service_image",
        "cart_duplication_service_text"
    ];
    public function addWebSiteElements()
    {
        $titles = self::ELEMENTS;
        return view("Dashboard.Pages.webSiteElements", compact("titles"));
    }

    public function saveWebSiteElement(WebSiteElementRequest $request)
    {
        try {
            $requestData = $request->all();
            if ($requestData["action"] == "insert") {
                $return = $this->insertWebSiteElement($requestData, $request);
            } else if ($request["action"] == "update") {
                $return = $this->updateWebSiteElement($requestData, $request);
            } else if ($request["action"] == "disable") {
                $check = WebSiteElements::where(WebSiteElements::ID, $requestData[WebSiteElements::ID])->first();
                $check->{WebSiteElements::UPDATED_BY} = Auth::user()->id;
                $check->{WebSiteElements::STATUS} = 0;
                $check->save();
                $this->forgetWebSiteElements();
                $return = ["status" => true, "message" => "Details updated", "data" => null];
            } else if ($request["action"] == "enable") {
                $check = WebSiteElements::where(WebSiteElements::ID, $requestData[WebSiteElements::ID])->first();
                $check->{WebSiteElements::UPDATED_BY} = Auth::user()->id;
                $check->{WebSiteElements::STATUS} = 1;
                $check->save();
                $this->forgetWebSiteElements();
                $return = ["status" => true, "message" => "Details updated", "data" => null];
            } else {
                $return = ["status" => false, "message" => "Invalid action", "data" => null];
            }
        } catch (Exception $exception) {
            $return = ["status" => false, "message" => "Exception occurred  : " . $exception->getMessage(), "data" => null];
        }
        return response()->json($return);
    }

    public function updateWebSiteElement($requestData, WebSiteElementRequest $request)
    {
        $check = WebSiteElements::where(WebSiteElements::ID, $requestData[WebSiteElements::ID])->first();
        if ($check) {
            if ($this->checkDuplicateElement($requestData[WebSiteElements::ELEMENT], $requestData[WebSiteElements::ID])) {
                $return = ["status" => false, "message" => "Element already found", "data" => null];
            } else {
                $check->{WebSiteElements::ELEMENT} = $requestData[WebSiteElements::ELEMENT];
                $check->{WebSiteElements::ELEMENT_TYPE} = $requestData[WebSiteElements::ELEMENT_TYPE];
                if ($requestData[WebSiteElements::ELEMENT_TYPE] == "Image") {
                    $fileUpload = $this->uploadLocalFile($request, "element_details_image", "/website/uploads/WesiteElements/");
                    if ($fileUpload["status"]) {
                        $check->{WebSiteElements::ELEMENT_DETAILS} = $fileUpload["data"];
                    } else {
                        return $fileUpload;
                    }
                } else {
                    $check->{WebSiteElements::ELEMENT_DETAILS} = $requestData["element_details_text"];
                }
                $check->save();
                $this->forgetWebSiteElements();
                $return = ["status" => true, "message" => "Details updated", "data" => null];
            }
        } else {
            $return = ["status" => false, "message" => "Details not found", "data" => null];
        }
        return $return;
    }

    public function checkDuplicateElement($element, $existingId = null)
    {
        $check = WebSiteElements::where(WebSiteElements::ELEMENT, $element);
        if ($existingId) {
            $check->where(WebSiteElements::ID, "!=", $existingId);
        }
        return $check->exists();
    }
    public function insertWebSiteElement($requestData, WebSiteElementRequest $request)
    {
        $check = WebSiteElements::where([
            [WebSiteElements::ELEMENT, $requestData[WebSiteElements::ELEMENT]],
            [WebSiteElements::ELEMENT_TYPE, $requestData[WebSiteElements::ELEMENT_TYPE]]
        ])->first();
        if ($this->checkDuplicateElement($requestData[WebSiteElements::ELEMENT])) {
            $return = ["status" => false, "message" => "Element already found", "data" => null];
        } else {
            $check = new WebSiteElements();
            $check->{WebSiteElements::ELEMENT} = $requestData[WebSiteElements::ELEMENT];
            $check->{WebSiteElements::ELEMENT_TYPE} = $requestData[WebSiteElements::ELEMENT_TYPE];
            if ($requestData[WebSiteElements::ELEMENT_TYPE] == "Image") {
                $fileUpload = $this->uploadLocalFile($request, "element_details_image", "/website/uploads/WesiteElements/");
                if ($fileUpload["status"]) {
                    $check->{WebSiteElements::ELEMENT_DETAILS} = $fileUpload["data"];
                } else {
                    return $fileUpload;
                }
            } else {
                $check->{WebSiteElements::ELEMENT_DETAILS} = $requestData["element_details_text"];
            }
            $this->forgetWebSiteElements();
            $check->save();
            $return = ["status" => true, "message" => "Saved successfully.", "data" => null];
        }
        return $return;
    }


    public function getWebElementsData()
    {
        $data = WebSiteElements::select(
            WebSiteElements::ID,
            WebSiteElements::ELEMENT,
            WebSiteElements::ELEMENT_TYPE,
            WebSiteElements::ELEMENT_DETAILS,
            WebSiteElements::STATUS
        );

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                if ($row->{WebSiteElements::STATUS} == 1) {
                    $btn .= '<a href="javascript:void(0)" onclick="Disable(\''.$row->{WebSiteElements::ID}.'\')" class="btn btn-danger btn-sm">Disable</a>';
                } else {
                    $btn .= '<a href="javascript:void(0)" onclick="Enable(\''.$row->{WebSiteElements::ID}.'\')" class="btn btn-info btn-sm">Enable</a>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

