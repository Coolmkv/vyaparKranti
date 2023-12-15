<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\GalleryItem;
use App\Models\NavMenu;
// use App\Models\WebSiteElements;
use App\Repositories\SaveTestimonials;
use App\Traits\CommonFunctions;
use Exception;
use Captcha;

class HomePageController extends Controller
{
    use CommonFunctions;
    public function homePage(){
        try{
            $data = $this->getElement();
            $data["menuItems"] = $this->getMenuItems();
            $data["testimonials"] = $this->getTestimonials();
            $data["slides"] = $this->getSlides();
            return view("HomePage.dynamicHomePage",$data);
        }catch(Exception $exception){
            echo $exception->getMessage();
            return false;
        }

    }
    /**
     * aboutUs
     *
     * @return void
     */
    public function aboutUs(){

        $data = $this->getElement();            
        return view("HomePage.aboutUs",$data);
    }
    public function servicePage(){

        $data = $this->getElement();            
        return view("HomePage.servicePage",$data);
    }
    public function menuPage(){

        $data = $this->getElement();
        $data["menuItems"] = $this->getMenuItems();
        return view("HomePage.menuPage",$data);
    }

    public function reservationPage(){
        $data = $this->getElement();
        return view("HomePage.reservationPage",$data);
    }

    public function testimonialsPage(){
        $data = $this->getElement();
        $data["testimonials"] = $this->getTestimonials();
        return view("HomePage.testimonialsPage",$data);
    }

    public function contactUsPage(){
        $data = $this->getElement();
        return view("HomePage.contactUsPage",$data);
    }
    

    public function getElement(){
        $elements = $this->getWebSiteElements();
        $data = [];
        if(!empty($elements)){
            foreach($elements as $item){
                $data[$item->{WebSiteElements::ELEMENT}] = $item->{WebSiteElements::ELEMENT_DETAILS};
            }
        } 
        return $data;
    }

    public function getMenu(){
        $menuItems = NavMenu::where([
            [NavMenu::STATUS,1],
            [NavMenu::VIEW_IN_LIST,NavMenu::VIEW_IN_LIST_YES]])
        ->select(NavMenu::TITLE,NavMenu::URL,NavMenu::URL_TARGET,NavMenu::PARENT_ID,
        NavMenu::NAV_TYPE,NavMenu::POSITION,NavMenu::ID)
        ->orderBy(NavMenu::PARENT_ID,"asc")
        ->orderBy(NavMenu::POSITION,"asc")->get();
        $returnData = [];
        if(count($menuItems)){
            // Nav Menu By Type
            $menuItemTypes = collect($menuItems)->groupBy(NavMenu::NAV_TYPE)->toArray();
             
            foreach($menuItemTypes as $navType=>$val){
                //for each type item
                foreach($val as $item){
                    if(!filter_var($item[NavMenu::URL], FILTER_VALIDATE_URL)){
                        $item[NavMenu::URL] = url("")."/".$item[NavMenu::URL];
                        //dd(url("items"));
                    }
                    //parent id is null
                    if($item[NavMenu::PARENT_ID]==null && !isset($returnData[$navType][$item[NavMenu::ID]])){
                        $returnData[$navType][$item[NavMenu::ID]] = $item;
                    }
                    //if parent id is set i.e child node
                    if($item[NavMenu::PARENT_ID]){
                        $this->setChildren($returnData,$item);
                    }
                }                 
            } 
            if(count($returnData)){
                $return = ["status"=>true,"message"=>"menu items found.","data"=>$returnData,
                "menu_html"=>$this->getHtml($returnData)];
            }else{
                $return = ["status"=>false,"message"=>"menu items not found.","data"=>null];
            }
        }else{
            $return = ["status"=>false,"message"=>"menu items not set","data"=>null];
        }
        return response()->json($return);
    }

    public function setChildren(&$returnData,$item){

        foreach($returnData as $navType=>$navItem){
            //parent id matches             
            if($navType==$item[NavMenu::NAV_TYPE] && !empty($navItem[$item[NavMenu::PARENT_ID]])){
                $returnData[$item[NavMenu::NAV_TYPE]][$item[NavMenu::PARENT_ID]]["child_node"][] = $item;
                return true;
            }
            if(!empty($returnData[$item[NavMenu::NAV_TYPE]])){
                
                $this->findSetChild($returnData[$item[NavMenu::NAV_TYPE]],$item);
            }             

        }

        
    }
    
    /**
     * findSetChild
     *
     * @param  mixed $item
     * @param  mixed $itemSet
     * @return void
     */
    public function findSetChild(&$item,$itemSet){
        try{
            foreach($item as $navId=>$navItem){
                if($navItem[NavMenu::ID]==$itemSet[NavMenu::PARENT_ID]){
                    $item[$navId]["child_node"][] = $itemSet;
                    return true; 
                }
                if(!empty($item[$navId]["child_node"])){
                    return $this->findSetChild($item[$navId]["child_node"],$itemSet);
                }
            }
        }catch(Exception $exception){
            return false;
        }
    }
    
    /**
     * getHtml
     *
     * @param  mixed $returnData
     * @return void
     */
    public function getHtml($returnData){
        $html = [];
        foreach($returnData as $key=>$value){
            if(!isset($html[$key])){
                $html[$key] = '';
            }
            foreach($value as $keyVal){
                $html[$key] .= $this->getItemHTML($key,$html,$keyVal);
            }
            //$html[$key] = $this->getItemHTML($key,$html,$value);
        }
        return $html;
    }
    
    /**
     * getItemHTML
     *
     * @param  mixed $key
     * @param  mixed $html
     * @param  mixed $item
     * @return void
     */
    public function getItemHTML($key,$html,$item){
         
        $link_html = "";
        if($key=="top"){
            if(!empty($item["child_node"])){
                
                $subMenu = $this->getItemChildHTML($item,'<div class="dropdown-menu">');   
                $link_html .= '<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        '.$item[NavMenu::TITLE].'
                                    </a>'.$subMenu.'</div>
                                    </li>';
            }else{
                $link_html .= '<li class="nav-item">
                                    <a target="'.$item[NavMenu::URL_TARGET].'" class="nav-link js-scroll-trigger" href="'.
                                    $item[NavMenu::URL].'">'.$item[NavMenu::TITLE].'</a>
                               </li>';
            }
        }
        
        return $link_html;  
    }
    
    /**
     * getItemChildHTML
     *
     * @param  mixed $item
     * @param  mixed $html
     * @return void
     */
    public function getItemChildHTML($item,$html){
        if(!empty($item["child_node"])){
            $html .='<a target="'.$item[NavMenu::URL_TARGET].'" class="dropdown-item" href="'.$item[NavMenu::URL].'">'.$item[NavMenu::TITLE].'</a>';
            foreach($item["child_node"] as $item_new){
                return $this->getItemChildHTML($item_new,$html);
            }            
        }else{
            return $html .='<a target="'.$item[NavMenu::URL_TARGET].'" class="dropdown-item" href="'.$item[NavMenu::URL].'">'.$item[NavMenu::TITLE].'</a>';
        }
    }
     
    public function galleryPage(){
        $obj = new GalleryItem();
        $data = $this->getElement();            
        $data["getAllGalleryImages"] = $obj->getAllGalleryImages();
        $data["getAllVideos"] = $obj->getAllGalleryVideos();
        
        return view("HomePage.galleryPage",$data);
    }

    public function refreshCapthca(){
        try{
            $return = ["status"=>true,"message"=>"Success","data"=>Captcha::src()];
            
        }catch(Exception $exception){
            $return = ["status"=>false,"message"=>$exception->getMessage(),"data"=>$exception->getTraceAsString()];
        }
        return response()->json($return);
    }

    public function saveTestimonials(TestimonialRequest $request){
        return (new SaveTestimonials())->saveTestimonial($request);
    }
}
