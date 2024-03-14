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

    public function getIp(){
        foreach (array('REMOTE_ADDR','HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    }

}