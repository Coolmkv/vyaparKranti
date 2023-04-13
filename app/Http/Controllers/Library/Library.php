<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryCategoriesRequest;
use App\Http\Requests\LibraryCategoryItemsRequest;
use App\Repositories\AddCategoryItemsRepository;
use App\Repositories\AddLibraryCategories;
use Illuminate\Http\Request;

class Library extends Controller
{
    //

    public function viewLibrary(){
        return view("WebSitePages.Library.library_category_items");
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
