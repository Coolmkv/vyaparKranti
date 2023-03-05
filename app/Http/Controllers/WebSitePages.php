<?php

namespace App\Http\Controllers;

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
}
