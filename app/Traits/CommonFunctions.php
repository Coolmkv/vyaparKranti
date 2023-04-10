<?php
namespace App\Traits;

use Exception;
use Illuminate\Foundation\Http\FormRequest;

trait CommonFunctions{

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

}