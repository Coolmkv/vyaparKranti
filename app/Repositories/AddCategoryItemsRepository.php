<?php

namespace App\Repositories;

use App\Http\Requests\LibraryCategoryItemsRequest;
use App\Models\CategoryItems;
use App\Models\LibraryCategories;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AddCategoryItemsRepository{
    use CommonFunctions;
    use ResponseAPI;
    const CATEGORY_ITEM_FILE = "/upload/library_images/category_item/";

    public function viewCategoryItems()
    {
        $categories = LibraryCategories::where(LibraryCategories::STATUS,1)
        ->select(LibraryCategories::ID,LibraryCategories::CATEGORY_NAME)->get();
        return view("Dashboard.Pages.libraryCategoryItems",compact("categories"));
    }

    public function saveCategoryItems(LibraryCategoryItemsRequest $request){
        try{
            if (in_array($request->input("action"),["delete","enable"])) {
                $return = $this->deleteLibraryCategoryItem($request,$request->input("action"));
            } elseif ($request->input("action") == "insert") {
                $return = $this->insertCategoryItem($request);
            } elseif ($request->input("action") == "update") {
                $check = LibraryCategories::where([
                    [LibraryCategories::CATEGORY_NAME, $request->input(LibraryCategories::CATEGORY_NAME)],
                    [LibraryCategories::ID, "<>", $request->input(LibraryCategories::ID)]
                ])->first();
                if ($check) {
                    $return = $this->error("Category name already taken.", 200);
                } else {
                    $return = $this->updateCategoryItem($request);
                }
            } else {
                $return = $this->error("Invalid operation", 200);
            }

        }catch(Exception $exception){
            $return = $this->reportException($exception);
        
        }
        return $return;
    }    
    /**
     * deleteLibraryCategoryItem
     *
     * @param  mixed $request
     * @param  mixed $action
     * @return void
     */
    public function deleteLibraryCategoryItem(LibraryCategoryItemsRequest $request,$action)
    {

        $check = CategoryItems::where([
            [CategoryItems::ID, $request->input(CategoryItems::ID)]
        ])
            ->first();
        if ($check) {
            $status = 1;
            if($action=="delete"){
                $status = 0;
            }
            $check->{CategoryItems::STATUS} = $status;
            $check->{CategoryItems::UPDATED_BY} = Auth::user()->id;
            $check->save();
            $return = $this->success($action=="delete"?"Disabled Successfully.":"Enbaled successfully", null);
        } else {
            $return = $this->error("Details not found.");
        }
        return $return;
    }
    
    /**
     * insertCategoryItem
     *
     * @param  mixed $request
     * @return void
     */
    public function insertCategoryItem(LibraryCategoryItemsRequest $request){

        $imageUpload = $this->uploadLocalFile($request, CategoryItems::ITEM_IMAGE, self::CATEGORY_ITEM_FILE, "");
        if ($imageUpload["status"]) {
            $data = [
                CategoryItems::LIBRARY_CATEGORY_ID => $request->input(CategoryItems::LIBRARY_CATEGORY_ID),
                CategoryItems::ITEM_TITLE => $request->input(CategoryItems::ITEM_TITLE),
                CategoryItems::ITEM_DETAILS => $request->input(CategoryItems::ITEM_DETAILS),
                CategoryItems::ITEM_IMAGE => $imageUpload["data"]
            ];
            CategoryItems::updateOrInsert($data,[CategoryItems::STATUS => 1,
            CategoryItems::CREATED_BY => Auth::id(),]);
            $return = $this->success("Category Item successfully.", null);
        } else {
            $return = $this->error($iconFile["message"] ?? "Error in image upload", 200);
        }
    
        return $return;
    }

    public function updateCategoryItem(LibraryCategoryItemsRequest $request){


        $data = [
            CategoryItems::ITEM_TITLE => $request->input(CategoryItems::ITEM_TITLE),
            CategoryItems::ITEM_DETAILS => $request->input(CategoryItems::ITEM_DETAILS),
            CategoryItems::LIBRARY_CATEGORY_ID => $request->input(CategoryItems::LIBRARY_CATEGORY_ID),
            CategoryItems::STATUS => 1
        ];
        if ($request->file(CategoryItems::ITEM_IMAGE)) {
            $imageUpload = $this->uploadLocalFile($request, CategoryItems::ITEM_IMAGE, self::CATEGORY_ITEM_FILE, "");
            if ($imageUpload["status"]) {
                $data[CategoryItems::ITEM_IMAGE] = $imageUpload["data"];
                CategoryItems::where(CategoryItems::ID,$request->input(CategoryItems::ID))->update($data);
                $return = $this->success("Category item saved successfully.", null);
            } else {
                $return = $this->error($iconFile["message"] ?? "Error in image upload", 200);
            }
        } else {
            CategoryItems::where(CategoryItems::ID,$request->input(CategoryItems::ID))->update($data);
            $return = $this->success("Category saved successfully.", null);
        }
        return $return;
    }

    public function viewCategoryItemsDataTable(){
        return Datatables::of(CategoryItems::select(CategoryItems::STATUS,CategoryItems::ID,CategoryItems::ITEM_TITLE,
         CategoryItems::ITEM_DETAILS, CategoryItems::ITEM_IMAGE, CategoryItems::LIBRARY_CATEGORY_ID)->with("libraryCategory"))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                if($row->{CategoryItems::STATUS}==1){
                    $btn .= '<a href="javascript:void(0)" onclick="deleteItem(\'' . $row->{CategoryItems::ID} . '\')" class="edit btn btn-danger btn-sm">Disable</a>';
                }else{
                    $btn .= '<a href="javascript:void(0)" onclick="enableItem(\'' . $row->{CategoryItems::ID} . '\')" class="edit btn btn-info btn-sm">Enable</a>';
                }
                return $btn;
            })->addColumn('iconImage', function ($row) {
                return '<img  class="img-thumbnail h-80" src="' . $row->{CategoryItems::ITEM_IMAGE} . '" >';
            })->rawColumns(['action', 'iconImage'])
            ->make(true);
    
    }
}