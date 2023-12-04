<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\SliderModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    use CommonFunctions;
    //

    public function slider(){
        return view("Dashboard.Pages.slideAdmin");
    }

    public function sliderData(){
        
        $query = SliderModel::select(SliderModel::IMAGE,
        SliderModel::ID,
        SliderModel::HEADING_TOP,
        SliderModel::HEADING_BOTTOM,
        SliderModel::HEADING_MIDDLE,
        SliderModel::SLIDE_SORTING,
        SliderModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{SliderModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{SliderModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{SliderModel::SLIDE_STATUS}==SliderModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function saveSlide(SliderRequest $request){
        try{
            switch($request->input("action")){
                case "insert":
                    $return = $this->insertSlide($request);
                    break;
                case "update":
                    $return = $this->updateSlide($request);
                    break;
                case "enable":
                case "disable":
                    $return = $this->enableDisableSlide($request);
                    break;
                default:
                $return = ["status"=>false,"message"=>"Unknown case","data"=>""];
            }
        }catch(Exception $exception){
            $return = $this->reportException($exception);
        }
        return response()->json($return);
    }

    public function insertSlide(SliderRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $sliderModel = new SliderModel();
            $sliderModel->{SliderModel::IMAGE} = $imageUpload["data"];
            $sliderModel->{SliderModel::HEADING_TOP} = $request->input(SliderModel::HEADING_TOP);
            $sliderModel->{SliderModel::HEADING_MIDDLE} = $request->input(SliderModel::HEADING_MIDDLE);
            $sliderModel->{SliderModel::HEADING_BOTTOM} = $request->input(SliderModel::HEADING_BOTTOM);
            $sliderModel->{SliderModel::SLIDE_STATUS} = $request->input(SliderModel::SLIDE_STATUS);
            $sliderModel->{SliderModel::SLIDE_SORTING} = $request->input(SliderModel::SLIDE_SORTING);           
            $sliderModel->{SliderModel::STATUS} = 1;
            $sliderModel->{SliderModel::CREATED_BY} = Auth::user()->id;
            $sliderModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(SliderRequest $request){
        $maxId = SliderModel::max(SliderModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(SliderRequest $request){
        $check = SliderModel::where([SliderModel::ID=>$request->input(SliderModel::ID),SliderModel::STATUS=>1])->first();
        if($check){
            if($request->input(SliderModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{SliderModel::IMAGE} = $imageUpload["data"];
                    $check->{SliderModel::SLIDE_SORTING} = $request->input(SliderModel::SLIDE_SORTING);
                    $check->{SliderModel::HEADING_TOP} = $request->input(SliderModel::HEADING_TOP);
                    $check->{SliderModel::HEADING_MIDDLE} = $request->input(SliderModel::HEADING_MIDDLE);
                    $check->{SliderModel::HEADING_BOTTOM} = $request->input(SliderModel::HEADING_BOTTOM);
                    $check->{SliderModel::SLIDE_STATUS} = $request->input(SliderModel::SLIDE_STATUS);
                    $check->{SliderModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{SliderModel::SLIDE_SORTING} = $request->input(SliderModel::SLIDE_SORTING);
                $check->{SliderModel::HEADING_TOP} = $request->input(SliderModel::HEADING_TOP);
                $check->{SliderModel::HEADING_MIDDLE} = $request->input(SliderModel::HEADING_MIDDLE);
                $check->{SliderModel::HEADING_BOTTOM} = $request->input(SliderModel::HEADING_BOTTOM);
                $check->{SliderModel::SLIDE_STATUS} = $request->input(SliderModel::SLIDE_STATUS);
                $check->{SliderModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(SliderRequest $request){
        $check = SliderModel::find($request->input(SliderModel::ID));
        if($check){
            $check->{SliderModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{SliderModel::SLIDE_STATUS} = SliderModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{SliderModel::SLIDE_STATUS} = SliderModel::SLIDE_STATUS_DISABLED;
                $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
            }
            $this->forgetSlides();
            $check->save();
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
        }
        return $return;
    }
}
