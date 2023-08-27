<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Library\Library;
use App\Http\Requests\ContactUsFormRequest;
use App\Http\Requests\LibraryRequest;
use App\Http\Requests\NewsLetterSubscriptionRequest;
use App\Models\LibraryCategories;
use App\Models\WebSitePagesModel;
use App\Repositories\ContactUsRepository;
use App\Repositories\NewsLetterRepository;
use Exception;
use Captcha;
class WebSitePages extends Controller
{
    
    public function homePage(){
        $page = WebSitePagesModel::where("route_name",'homePage')->first();
        return view("WebSitePages.home_page",compact('page'));
    }

    
    public function aboutUs(){
        $page = WebSitePagesModel::where("route_name",'aboutUs')->first();
        return view("WebSitePages.aboutUs",compact('page'));
    }
    
    public function ourServices(){
        $page = WebSitePagesModel::where("route_name",'ourServices')->first();
        return view("WebSitePages.ourServices",compact('page'));
    }
    
    public function ourPortfolio(){
        $categories = LibraryCategories::where(LibraryCategories::STATUS,1)->get([
            LibraryCategories::CATEGORY_NAME,
            LibraryCategories::ID,
            LibraryCategories::CATEGORY_ICON,
            LibraryCategories::CATEGORY_DETAILS,
        ]);
        $page = WebSitePagesModel::where("route_name",'ourPortfolio')->first();
        
        return view("WebSitePages.ourPortfolio",compact('categories','page'));
    }
    
    public function contactUs(){
        $page = WebSitePagesModel::where("route_name",'contactUs')->first();
        return view("WebSitePages.contactUs",compact("page"));
    }

    public function libraryCategory(LibraryRequest $request){
        
         return (new Library())->viewLibrary($request);
    }

    public function refreshCapthca(){
        try{
            
            $return = ["status"=>true,"message"=>"Success","data"=>Captcha::src()];
            
        }catch(Exception $exception){
            $return = ["status"=>false,"message"=>$exception->getMessage(),"data"=>$exception->getTraceAsString()];
        }
        return response()->json($return);
    }

    public function subscribeNewsLetter(NewsLetterSubscriptionRequest $request){
        return (new NewsLetterRepository)->subscribe($request);
    }

    public function contactUsFormSubmit(ContactUsFormRequest $request){
        return (new ContactUsRepository)->submitContactUs($request);
    }

}
