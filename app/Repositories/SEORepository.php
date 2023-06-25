<?php

namespace App\Repositories;

use App\Http\Requests\SEORequest;
use App\Models\WebSitePagesModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use RalphJSmit\Laravel\SEO\Models\SEO;
use Yajra\DataTables\Facades\DataTables;

class SEORepository{

    use CommonFunctions;

    private $seo_image = "";
    use ResponseAPI;
    const MODEL_TYPE_VALUE = "App\Models\WebSitePagesModel";
    const SEO_IMAGE = "/upload/seo_images/";

    const ID = "id";
    const MODEL_TYPE = "model_type";
    const MODEL_ID = "model_id";
    const DESCRIPTION = "description";
    const TITLE = "title";
    const IMAGE = "image";
    const AUTHOR = "author";
    const ROBOTS = "robots";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function addSEO(){
        
        $pages = WebSitePagesModel::where("status",1)->select('route_name','id')->get();
        return view("Dashboard.Pages.seoManagement",compact("pages"));
    }

    public function saveSEODetails(SEORequest $request){
        $input =  $request->all();
        $this->setSEOImage($request);
        if(!empty($input["id"])){
            $check = SEO::where([
                "id"=>$input["id"]
            ])->first();
            if($check){
                $check->model_type = self::MODEL_TYPE_VALUE;
                $check->model_id = $input["model_id"];
                $check->description = $input["description"];
                $check->title = $input["title"];
                $check->image = $this->seo_image;
                $check->author = $input["author"];
                $check->robots = $input["robots"];
                $check->save();
                $return = $this->success("Updated Successfully",[]);
            }else{
                $return = $this->insertSEO($input);
            }
        }else{
            $return = $this->insertSEO($input);
        }
        return $return;
    }

    public function insertSEO($input){
        $check = SEO::where("model_id",$input["model_id"])->first();
        if($check){
            $check->model_type = self::MODEL_TYPE_VALUE;
            $check->description = $input["description"];
            $check->title = $input["title"];
            $check->image = $this->seo_image;
            $check->author = $input["author"];
            $check->robots = $input["robots"];
            $check->save();
            $return = $this->success("Updated Successfully",[]);
        }else{
            $check = new SEO();
            $check->model_type = self::MODEL_TYPE_VALUE;
            $check->model_id = $input["model_id"];
            $check->description = $input["description"];
            $check->title = $input["title"];
            $check->image = $this->seo_image;
            $check->author = $input["author"];
            $check->robots = $input["robots"];
            $check->save();
            $return = $this->success("Saved Successfully",[]);
        }
        return $return;        
    }

    public function setSEOImage(FormRequest $request){
        if($request->file("image")){
            $uploadResponse = $this->uploadLocalFile($request,'image',self::SEO_IMAGE);
            if($uploadResponse["status"]){
                $this->seo_image = $uploadResponse["data"];
            }
        }

    }

    public function seoDataTable(){
        
        return DataTables::of(WebSitePagesModel::select(
            WebSitePagesModel::ID,
            WebSitePagesModel::ROUTE_NAME,
            
        )->where(WebSitePagesModel::STATUS,1)->has("seoData")->with("seoData"))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn .= '<a href="javascript:void(0)" onclick="deleteItem(\'' . $row->{WebSitePagesModel::ID} . '\')" class="edit btn btn-danger btn-sm">Disable</a>';
                $btn .= '<a data-row="'.base64_encode(json_encode($row)).'" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                return $btn;
            })
            ->addColumn('seoImage', function ($row) {
                return '<img  class="img-thumbnail h-80" src="' . $row->seoData->{self::IMAGE} . '" >';
            })->rawColumns(['action','seoImage'])
            ->make(true);
    }

}