<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Library\Library;
use App\Http\Requests\LibraryRequest;
use App\Models\LibraryCategories;
class WebSitePages extends Controller
{
    
    public function homePage(){
        return view("WebSitePages.home_page");
    }

    
    public function aboutUs(){
        return view("WebSitePages.aboutUs");
    }
    
    public function ourServices(){
        return view("WebSitePages.ourServices");
    }
    
    public function ourPortfolio(){
        $categories = LibraryCategories::where(LibraryCategories::STATUS,1)->get([
            LibraryCategories::CATEGORY_NAME,
            LibraryCategories::ID,
            LibraryCategories::CATEGORY_ICON,
            LibraryCategories::CATEGORY_DETAILS,
        ]);
        
        return view("WebSitePages.ourPortfolio",compact('categories'));
    }
    
    public function contactUs(){
        return view("WebSitePages.contactUs");
    }

    public function libraryCategory(LibraryRequest $request){
        
         return (new Library())->viewLibrary($request);
    }

}
