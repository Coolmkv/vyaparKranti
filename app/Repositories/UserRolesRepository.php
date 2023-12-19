<?php

namespace App\Repositories;

use App\Models\UserRolesModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class UserRolesRepository{

    use CommonFunctions;

    use ResponseAPI;
    protected $return;
    public function addUpdateUserRoles(Request $request){
        $action = $request->input("action"); 
        if($action=="insert"){
            $this->insertRole($request);
        }else if($action=="update"){
            $this->insertRole($request);
        }
        return $this->return;
    }

    public function insertRole(Request $request){
        if($this->validate($request,"insert")){
            UserRolesModel::insert([
                UserRolesModel::ROLE_NAME=>$request->input("role_name"),
                UserRolesModel::STATUS=>1
            ]);
            $this->return = $this->success("Role name is inserted.",[]);
        }
    }

    public function validate(Request $request,$type){
        $role_name = $request->input("role_name");
        if(empty($role_name)){
            $this->return = $this->error("Role name is required.",200);
            $return = false;
        }else{
            if($type=="insert"){
                $duplicate = UserRolesModel::where(UserRolesModel::ROLE_NAME,$role_name)->first();
                if($duplicate && $duplicate->{UserRolesModel::STATUS}==1){
                    $this->return = $this->error("Role name is duplicate.",200);
                    $return = false;
                }else if($duplicate && $duplicate->{UserRolesModel::STATUS}!=1){
                    $duplicate->{UserRolesModel::STATUS}=1;
                    $duplicate->save();
                    $this->return = $this->success("Role name is saved.",[]);
                    $return = false;
                }else{
                    $return = true;
                }
            }else{
                $this->return = $this->error("Unknown type.",200);
                    
                $return = false;
            }
        }
        return $return;
        
    }

    
}