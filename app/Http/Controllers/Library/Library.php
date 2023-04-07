<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
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
}
