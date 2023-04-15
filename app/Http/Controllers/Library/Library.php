<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryCategoriesRequest;
use App\Http\Requests\LibraryCategoryItemsRequest;
use App\Http\Requests\LibraryRequest;
use App\Models\CategoryItems;
use App\Models\LibraryCategories;
use App\Repositories\AddCategoryItemsRepository;
use App\Repositories\AddLibraryCategories;

class Library extends Controller
{
    //

    public function viewLibrary(LibraryRequest $request){
        $categoriesItems =  CategoryItems::where(
            [
                [CategoryItems::LIBRARY_CATEGORY_ID,$request->input(CategoryItems::ID)],
                [CategoryItems::STATUS,1]
            ]
            )->get([
                CategoryItems::ID,
                CategoryItems::ITEM_DETAILS,
                CategoryItems::ITEM_IMAGE,
                CategoryItems::ITEM_TITLE,
            ]);
            $category_name =LibraryCategories::where(LibraryCategories::ID,$request->input(LibraryCategories::ID))->value(LibraryCategories::CATEGORY_NAME);
        return view("WebSitePages.Library.library_category_items",compact("categoriesItems","category_name"));
    }

    public function manageLibraryCategories(){
        return view("Dashboard.Pages.libraryCategories");
    }

    public function addLibraryCategories(LibraryCategoriesRequest $request){
        return (new AddLibraryCategories)->saveCategory($request);
    }

    public function categoryDetailsDataTable(){
        return (new AddLibraryCategories)->getCategoryDataTable();
    }

    public function viewCategoryItems(){
        return (new AddCategoryItemsRepository)->viewCategoryItems();
    }

    public function addLibraryCategoryItems(LibraryCategoryItemsRequest $request){
        return (new AddCategoryItemsRepository)->saveCategoryItems($request);
    }

    public function categoryItemsDataTable()
    {
        return (new AddCategoryItemsRepository)->viewCategoryItemsDataTable();
    }
}
