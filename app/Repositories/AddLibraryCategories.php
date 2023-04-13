<?php

namespace App\Repositories;

use App\Http\Requests\LibraryCategoriesRequest;
use App\Models\LibraryCategories;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AddLibraryCategories
{

    use CommonFunctions;
    use ResponseAPI;
    const CATEGORY_ICON_FILE = "/upload/library_images/icons/";

    /**
     * saveCategory
     *
     * @param  mixed $request
     * @return void
     */
    public function saveCategory(LibraryCategoriesRequest $request)
    {
        try {
            if (in_array($request->input("action"),["delete","enable"])) {
                $return = $this->deleteLibraryCategoryRequest($request,$request->input("action"));
            } elseif ($request->input("action") == "insert") {
                $return = $this->insertLibraryCategory($request);
            } elseif ($request->input("action") == "update") {
                $check = LibraryCategories::where([
                    [LibraryCategories::CATEGORY_NAME, $request->input(LibraryCategories::CATEGORY_NAME)],
                    [LibraryCategories::ID, "<>", $request->input(LibraryCategories::ID)]
                ])->first();
                if ($check) {
                    $return = $this->error("Category name already taken.", 200);
                } else {
                    $return = $this->updateLibraryCategory($request);
                }
            } else {
                $return = $this->error("Invalid operation", 200);
            }
        } catch (Exception $exception) {
            $return = $this->reportException($exception);
        }
        return $return;
    }

    /**
     * insertLibraryCategory
     *
     * @param  mixed $request
     * @return void
     */
    public function insertLibraryCategory(LibraryCategoriesRequest $request)
    {
        $check = LibraryCategories::where(LibraryCategories::CATEGORY_NAME, $request->input(LibraryCategories::CATEGORY_NAME))->first();
        if (empty($check) && empty($request->input(LibraryCategories::ID))) {
            $iconFile = $this->uploadLocalFile($request, LibraryCategories::CATEGORY_ICON, self::CATEGORY_ICON_FILE, "");
            if ($iconFile["status"]) {
                $data = [
                    LibraryCategories::CATEGORY_NAME => $request->input(LibraryCategories::CATEGORY_NAME),
                    LibraryCategories::CATEGORY_DETAILS => $request->input(LibraryCategories::CATEGORY_DETAILS),
                    LibraryCategories::STATUS => 1,
                    LibraryCategories::CREATED_BY=>Auth::id()
                ];
                $data[LibraryCategories::CATEGORY_ICON] = $iconFile["data"];
                LibraryCategories::insert($data);
                $return = $this->success("Category saved successfully.", null);
            } else {
                $return = $this->error($iconFile["message"] ?? "Error in image upload", 200);
            }
        } else {
            $return = $this->error("Category name already found.", 200);
        }
        return $return;
    }
    
    /**
     * updateLibraryCategory
     *
     * @param  mixed $request
     * @return void
     */
    public function updateLibraryCategory(LibraryCategoriesRequest $request)
    {

        $data = [
            LibraryCategories::CATEGORY_NAME => $request->input(LibraryCategories::CATEGORY_NAME),
            LibraryCategories::CATEGORY_DETAILS => $request->input(LibraryCategories::CATEGORY_DETAILS),
            LibraryCategories::STATUS => 1
        ];
        if ($request->file(LibraryCategories::CATEGORY_ICON)) {
            $iconFile = $this->uploadLocalFile($request, LibraryCategories::CATEGORY_ICON, self::CATEGORY_ICON_FILE, "");
            if ($iconFile["status"]) {
                $data[LibraryCategories::CATEGORY_ICON] = $iconFile["data"];
                LibraryCategories::where(LibraryCategories::ID,$request->input(LibraryCategories::ID))->update($data);
                $return = $this->success("Category saved successfully.", null);
            } else {
                $return = $this->error($iconFile["message"] ?? "Error in image upload", 200);
            }
        } else {
            LibraryCategories::where(LibraryCategories::ID,$request->input(LibraryCategories::ID))->update($data);
            $return = $this->success("Category saved successfully.", null);
        }
        return $return;
    }
    
    /**
     * getCategoryDataTable
     *
     * @return void
     */
    public function getCategoryDataTable()
    {
        return Datatables::of(LibraryCategories::select(LibraryCategories::STATUS,LibraryCategories::CATEGORY_NAME, LibraryCategories::ID, LibraryCategories::CATEGORY_ICON, LibraryCategories::CATEGORY_DETAILS))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                if($row->{LibraryCategories::STATUS}==1){
                    $btn .= '<a href="javascript:void(0)" onclick="deleteItem(\'' . $row->{LibraryCategories::ID} . '\')" class="edit btn btn-danger btn-sm">Disable</a>';
                }else{
                    $btn .= '<a href="javascript:void(0)" onclick="enableItem(\'' . $row->{LibraryCategories::ID} . '\')" class="edit btn btn-info btn-sm">Enable</a>';
                }
                return $btn;
            })->addColumn('iconImage', function ($row) {
                return '<img  class="img-thumbnail h-80" src="' . $row->{LibraryCategories::CATEGORY_ICON} . '" >';
            })->rawColumns(['action', 'iconImage'])
            ->make(true);
    }

    /**
     * deleteLibraryCategoryRequest
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteLibraryCategoryRequest(LibraryCategoriesRequest $request,$action)
    {

        $check = LibraryCategories::where([
            [LibraryCategories::ID, $request->input(LibraryCategories::ID)]
        ])
            ->first();
        if ($check) {
            $status = 1;
            if($action=="delete"){
                $status = 0;
            }
            $check->{LibraryCategories::STATUS} = $status;
            $check->{LibraryCategories::UPDATED_BY} = Auth::user()->id;
            $check->save();
            $return = $this->success($action=="delete"?"Disabled Successfully.":"Enbaled successfully", null);
        } else {
            $return = $this->error("Details not found.");
        }
        return $return;
    }
}
