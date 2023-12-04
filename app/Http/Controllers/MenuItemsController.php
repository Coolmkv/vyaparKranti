<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuItemRequest;
use App\Models\MenuItemsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MenuItemsController extends Controller
{
    use CommonFunctions;
    
    public function addMenuItems()
    {
        return view("Dashboard.Pages.menuItems");
    }

    public function saveMenuItems(MenuItemRequest $request)
    {
        try {
            $requestData = $request->all();
            if ($requestData["action"] == "insert") {
                $return = $this->insertMenuItem($requestData, $request);
            } else if ($request["action"] == "update") {
                $return = $this->updateWebSiteElement($requestData, $request);
            } else if ($request["action"] == "disable") {
                $check = MenuItemsModel::where(MenuItemsModel::ID, $requestData[MenuItemsModel::ID])->first();
                $check->{MenuItemsModel::UPDATED_BY} = Auth::user()->id;
                $check->{MenuItemsModel::STATUS} = 0;
                $check->save();
                $this->forgetWebSiteElements();
                $return = ["status" => true, "message" => "Details updated", "data" => null];
            } else if ($request["action"] == "enable") {
                $check = MenuItemsModel::where(MenuItemsModel::ID, $requestData[MenuItemsModel::ID])->first();
                $check->{MenuItemsModel::UPDATED_BY} = Auth::user()->id;
                $check->{MenuItemsModel::STATUS} = 1;
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

    public function updateWebSiteElement($requestData, MenuItemRequest $request)
    {
        $check = MenuItemsModel::where(MenuItemsModel::ID, $requestData[MenuItemsModel::ID])->first();
        if ($check) {
            if ($this->checkDuplicateElement($requestData[MenuItemsModel::ITEM_NAME], $requestData[MenuItemsModel::ID])) {
                $return = ["status" => false, "message" => "Element already found", "data" => null];
            } else {
                $check->{MenuItemsModel::ITEM_NAME} = $requestData[MenuItemsModel::ITEM_NAME];
                $check->{MenuItemsModel::ITEM_DETAILS} = $requestData[MenuItemsModel::ITEM_DETAILS];
                $check->{MenuItemsModel::ITEM_PRIORITY} = $requestData[MenuItemsModel::ITEM_PRIORITY];
                $check->{MenuItemsModel::PRICE} = $requestData[MenuItemsModel::PRICE];
                $check->{MenuItemsModel::CURRENCY} = $requestData[MenuItemsModel::CURRENCY];
                $check->{MenuItemsModel::STATUS} = 1;
                if (isset($requestData[MenuItemsModel::ITEM_IMAGE])) {
                        $fileUpload = $this->uploadLocalFile($request,MenuItemsModel::ITEM_IMAGE, "/website/uploads/MenuItems/");
                        if ($fileUpload["status"]) {
                            $check->{MenuItemsModel::ITEM_IMAGE} = $fileUpload["data"];
                        } else {
                            return $fileUpload;
                        }
                }
                $check->save();
                $this->forgetMenuItems();
                $return = ["status" => true, "message" => "Details updated", "data" => null];
            }
        } else {
            $return = ["status" => false, "message" => "Details not found", "data" => null];
        }
        return $return;
    }

    public function checkDuplicateElement($element, $existingId = null)
    {
        $check = MenuItemsModel::where(MenuItemsModel::ITEM_NAME, $element);
        if ($existingId) {
            $check->where(MenuItemsModel::ID, "!=", $existingId);
        }
        return $check->exists();
    }    
    /**
     * insertMenuItem
     *
     * @param  mixed $requestData
     * @param  mixed $request
     * @return void
     */
    public function insertMenuItem($requestData, MenuItemRequest $request)
    {
        $check = MenuItemsModel::where([
            [MenuItemsModel::ITEM_NAME, $requestData[MenuItemsModel::ITEM_NAME]],
            ])->first();
        if (!empty($check)) {
            $return = ["status" => false, "message" => "Item already found", "data" => null];
        } else {
            $check = new MenuItemsModel();
            $check->{MenuItemsModel::ITEM_NAME} = $requestData[MenuItemsModel::ITEM_NAME];
            $check->{MenuItemsModel::ITEM_DETAILS} = $requestData[MenuItemsModel::ITEM_DETAILS];
            $check->{MenuItemsModel::ITEM_PRIORITY} = $requestData[MenuItemsModel::ITEM_PRIORITY];
            $check->{MenuItemsModel::PRICE} = $requestData[MenuItemsModel::PRICE];
            $check->{MenuItemsModel::CURRENCY} = $requestData[MenuItemsModel::CURRENCY];
            $check->{MenuItemsModel::STATUS} = 1;
            $fileUpload = $this->uploadLocalFile($request,MenuItemsModel::ITEM_IMAGE, "/website/uploads/MenuItems/");
            if ($fileUpload["status"]) {
                $check->{MenuItemsModel::ITEM_IMAGE} = $fileUpload["data"];
            } else {
                return $fileUpload;
            }
            
            $this->forgetMenuItems();
            $check->save();
            $return = ["status" => true, "message" => "Saved successfully.", "data" => null];
        }
        return $return;
    }


    public function menuItemsData()
    {
        $data = MenuItemsModel::select(
            MenuItemsModel::ID,
            MenuItemsModel::ITEM_DETAILS,
            MenuItemsModel::ITEM_NAME,
            MenuItemsModel::ITEM_IMAGE,
            MenuItemsModel::PRICE,
            MenuItemsModel::CURRENCY,
            MenuItemsModel::ITEM_PRIORITY,
            MenuItemsModel::STATUS
        );

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                if ($row->{MenuItemsModel::STATUS} == 1) {
                    $btn .= '<a href="javascript:void(0)" onclick="Disable(\''.$row->{MenuItemsModel::ID}.'\')" class="btn btn-danger btn-sm">Disable</a>';
                } else {
                    $btn .= '<a href="javascript:void(0)" onclick="Enable(\''.$row->{MenuItemsModel::ID}.'\')" class="btn btn-info btn-sm">Enable</a>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
