<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Library\Library;
use App\Http\Requests\LibraryRequest;
use Illuminate\Http\Request;

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
        return view("WebSitePages.ourPortfolio");
    }
    
    public function contactUs(){
        return view("WebSitePages.contactUs");
    }

    public function libraryCategory(LibraryRequest $request){
         return (new Library())->viewLibrary($request);
    }
}
