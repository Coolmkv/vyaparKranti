<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryCategoriesRequest;
use App\Repositories\AddLibraryCategories;
use Illuminate\Http\Request;

class Library extends Controller
{
    //

    public function viewLibrary(Request $request){
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
}
