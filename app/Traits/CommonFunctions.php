<?php
namespace App\Traits;

use Exception;
use Illuminate\Foundation\Http\FormRequest;



use App\Models\MenuItemsModel;
use App\Models\SliderModel;
use App\Models\TestimonialsModel;
use App\Models\WebSiteElements;
use Carbon\Carbon;
// use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use MenuItem;


trait CommonFunctions {

    public function reportException(Exception $exception){
        dd([
            "message"=>$exception->getMessage(),
            "File"=>$exception->getFile(),
            "Code"=>$exception->getCode(),
            "Trace as string"=>$exception->getTraceAsString()
        ]);
    }

    public function uploadLocalFile(FormRequest $fileObject,$key_name,$upload_path,$file_name = ""):array{
        try{
            $uploadFile = $fileObject->file($key_name);
            $fileName = $uploadFile->getClientOriginalName();
            $fileName = $file_name.preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);
            $fileUploaded = $uploadFile->move(public_path().$upload_path, $fileName);
            if($fileUploaded){
                $return = ["status"=>true,"message"=>"Success","data"=>$upload_path.$fileName];
            }else{
                $return = ["status"=>false,"message"=>"failed","data"=>$fileUploaded];
            }
        }catch(Exception $exception){
            $this->reportException($exception);
            $return = ["status"=>false,"message"=>$exception->getMessage(),"data"=>$exception->getMessage()];
        } 
        return $return;
    }


/******************from primers*******************************************************************************************************/


public function getWebSiteElements(){
    return Cache::rememberForever('webSiteElements', function () {
        return WebSiteElements::where(WebSiteElements::STATUS,1)->get();
    });
}

public function forgetWebSiteElements(){
    Cache::forget('webSiteElements');
}

public function getMenuItems(){
    return Cache::rememberForever('menuItems', function () {
        return MenuItemsModel::where(MenuItemsModel::STATUS,1)
        ->orderBy(MenuItemsModel::ITEM_PRIORITY,"desc")
        ->orderBy(MenuItemsModel::UPDATED_AT,"desc")->get();
    });
}

public function forgetMenuItems(){
    Cache::forget('menuItems');
}
public function forgetTestimonials(){
    Cache::forget('testimonials');
}
public function getTestimonials(){
    return Cache::rememberForever('testimonials', function () {
        return TestimonialsModel::where([
            [TestimonialsModel::STATUS,1],
            [TestimonialsModel::APPROVAL_STATUS,TestimonialsModel::APPROVED]])
        ->orderBy(TestimonialsModel::ITEM_PRIORITY,"desc")
        ->orderBy(TestimonialsModel::UPDATED_AT,"desc")->get();
    });
}

public function timeNow(){
    return Carbon::now();
}

public function getSlides(){
    return Cache::rememberForever('slides', function () {
        return SliderModel::where([SliderModel::STATUS=>1,SliderModel::SLIDE_STATUS=>SliderModel::SLIDE_STATUS_LIVE])
        ->orderBy(SliderModel::SLIDE_SORTING,"asc")->orderBy(SliderModel::UPDATED_AT,"desc")->get();
    });
}

public function forgetSlides(){
    Cache::forget('slides');
}



}


