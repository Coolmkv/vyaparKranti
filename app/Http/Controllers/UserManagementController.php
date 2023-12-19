<?php

namespace App\Http\Controllers;

use App\Repositories\UserRolesRepository;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function userRoles(){
        return view("Dashboard.Pages.UserManagement.userRoles");
    }

    public function addUserRoles(Request $request){
        return (new UserRolesRepository())->addUpdateUserRoles($request);
    }
}
