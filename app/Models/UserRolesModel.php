<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRolesModel extends Model
{
    use HasFactory;
    protected $table = "user_roles";

    const ID = "id";
    const ROLE_NAME = "role_name";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    // public function roleRoutes(){
    //     return $this->hasManyThrough(
    //         RoutesModel::class,
    //         RoleRoutes::class,
    //         "role_id",
    //         "id",
    //         "id",
    //         "route_id"
    //         )->where(RoleRoutes::STATUS_ALIAS,1)
    //         ->where(RoutesModel::STATUS_ALIAS,1);
    // }
}
