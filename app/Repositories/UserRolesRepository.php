<?php

namespace App\Repositories;

use App\Models\UserRolesModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserRolesRepository
{

    use CommonFunctions;

    use ResponseAPI;
    protected $return;
    public function addUpdateUserRoles(Request $request)
    {
        $action = $request->input("action");
        if ($action == "insert") {
            $this->insertRole($request);
        } else if ($action == "update") {
            $this->updateRole($request);
        }
        return $this->return;
    }

    public function updateRole(Request $request)
    {
        if ($this->validate($request, "update")) {
            $role_current = UserRolesModel::find($request->input("id"));
            if (!$role_current) {
                $this->return = $this->error("Role id is invalid.", []);
            } else {
                $role_current->{UserRolesModel::STATUS} = 1;
                $role_current->{UserRolesModel::ROLE_NAME} = $request->input("role_name");
                $role_current->save();
                $this->return = $this->success("Role name is updated.", []);
            }
        }
    }

    public function insertRole(Request $request)
    {
        if ($this->validate($request, "insert")) {
            UserRolesModel::insert([
                UserRolesModel::ROLE_NAME => $request->input("role_name"),
                UserRolesModel::STATUS => 1
            ]);
            $this->return = $this->success("Role name is inserted.", []);
        }
    }

    public function validate(Request $request, $type)
    {
        $role_name = $request->input("role_name");
        if (empty($role_name)) {
            $this->return = $this->error("Role name is required.", 200);
            $return = false;
        } else {
            if ($type == "insert") {
                $duplicate = UserRolesModel::where(UserRolesModel::ROLE_NAME, $role_name)->first();
                if ($duplicate && $duplicate->{UserRolesModel::STATUS} == 1) {
                    $this->return = $this->error("Role name is duplicate.", 200);
                    $return = false;
                } else if ($duplicate && $duplicate->{UserRolesModel::STATUS} != 1) {
                    $duplicate->{UserRolesModel::STATUS} = 1;
                    $duplicate->save();
                    $this->return = $this->success("Role name is saved.", []);
                    $return = false;
                } else {
                    $return = true;
                }
            } elseif ($type == "update") {
                $role_id = $request->input("id");
                if ($role_id) {
                    $duplicate = UserRolesModel::where([
                        [UserRolesModel::ROLE_NAME, $role_name],
                        [UserRolesModel::ID, "!=", $role_id],
                    ])->first();
                    if ($duplicate) {
                        $this->return = $this->error("Role name is duplicate.", 200);
                        $return = false;
                    } else {
                        $return = true;
                    }
                } else {
                    $this->return = $this->error("Role id is required.", []);
                    $return = false;
                }
            } else {
                $this->return = $this->error("Unknown type.", 200);

                $return = false;
            }
        }
        return $return;
    }

    public function getUserRolesData()
    {

        return DataTables::of(UserRolesModel::select(
            UserRolesModel::ID,
            UserRolesModel::ROLE_NAME,
            UserRolesModel::STATUS
        ))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';
                if ($row->status == 1) {
                    $btn .= '<a href="javascript:void(0)" onclick="deleteItem(\'' . $row->{UserRolesModel::ID} . '\')" class="btn btn-danger btn-sm me-2">Disable</a> ';
                } else {
                    $btn .= '<a href="javascript:void(0)" onclick="enableItem(\'' . $row->{UserRolesModel::ID} . '\')" class="btn btn-info btn-sm me-2">Enable</a>';
                }
                $btn .= '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
