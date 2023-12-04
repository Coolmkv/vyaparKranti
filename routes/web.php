<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Library\Library;
use App\Http\Controllers\WebSitePages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*///inteial name is admincontroller//inteial name is admincontroller

Route::get('/', [WebSitePages::class,"homePage"])->name("homePage");
Route::get('about-us', [WebSitePages::class,"aboutUs"])->name("aboutUs");
Route::get('services', [WebSitePages::class,"ourServices"])->name("ourServices");
Route::get('library', [WebSitePages::class,"ourPortfolio"])->name("ourPortfolio");
Route::get('contact-us', [WebSitePages::class,"contactUs"])->name("contactUs");
Route::get('library-category',[WebSitePages::class,"libraryCategory"])->name("libraryCategory");
//Route::get('library-category-details/{id}',[WebSitePages::class,"libraryCategoryDetails"]);

Route::get('refresh-captcha',[WebSitePages::class,"refreshCapthca"])->name("refreshCaptcha");
Route::post('subscribe-news-letter',[WebSitePages::class,"subscribeNewsLetter"])->name("subscribeNewsLetter");

Route::post('contact-us-form-submit',[WebSitePages::class,"contactUsFormSubmit"])->name("contactUsForm");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

 

Route::middleware(['auth'])->group(function () {
    Route::get("/new-dashboard",[AdminController::class,"dashboard"])->name("new-dashboard");
    Route::get("site-navigation",[AdminController::class,"siteNav"])->name("siteNav");
    Route::post("addEditNavigation",[AdminController::class,"addEditNavigation"])->name("addNaviagtion");
    Route::post("deleteNavigation",[AdminController::class,"deleteNavigation"])->name("deleteNavigation");
    Route::post("navDataTable",[AdminController::class,"navDataTable"])->name("navDataTable");

    Route::get("manage-gallery",[AdminController::class,"manageGallery"])->name("manageGallery");
    Route::post("addGalleryItems",[AdminController::class,"addGalleryItems"])->name("addGalleryItems");
    Route::post("addGalleryDataTable",[AdminController::class,"addGalleryDataTable"])->name("addGalleryDataTable");

    Route::get("web-site-elements",[AdminController::class,"webSiteElements"])->name("webSiteElements");

    Route::get('library-categories',[Library::class,"manageLibraryCategories"])->name("LibraryCategories");
    Route::post('add-library-categories',[Library::class,"addLibraryCategories"])->name("addLibraryCategories");
    Route::post("libraryCategoryDataTable",[Library::class,"categoryDetailsDataTable"])->name("categoryDetailsDataTable");

    Route::get("category-items",[Library::class,"viewCategoryItems"])->name("viewCategoryItems");
    Route::post('add-library-categories-items',[Library::class,"addLibraryCategoryItems"])->name("addLibraryCategoriesItems");
    Route::post("library-category-items-dataTable",[Library::class,"categoryItemsDataTable"])->name("categoryItemDetailsDataTable");
 
    Route::get("news-letter-subscribers",[Library::class,"newsLetterSubscribers"])->name("viewNewsLetterSubscribers");
    Route::post("news-letter-items-dataTable",[Library::class,"newsLetterItemsDataTable"])->name("newsLetterDetailsDataTable");
    Route::post("enable-disable-newletter",[Library::class,"enableDisableNewsLetter"])->name("enableDisableNewsLetter");
 
    Route::get('seo-management',[AdminController::class,"seoManagement"])->name("seoManagement");
    
    Route::post('add-seo-details',[AdminController::class,"saveSEODetails"])->name("addSEODetails");
    Route::post("seo-dataTable",[AdminController::class,"seoDataTable"])->name("seoDataTable");
    
});

require __DIR__.'/auth.php';
Route::get("login",[AdminController::class,"Login"])->name("login");
Route::post("AdminUserLogin",[AdminController::class,"AdminLoginUser"])->name("AdminLogin");
Route::get("getmenu-items",[HomePageController::class,"getMenu"]);

Route::fallback(function(){
return "<h1> Page not found . </h1>";

});







// routes added from hprimers
//************************************************************************************************************ */


// use App\Http\Controllers\BookingsController;
// use App\Http\Controllers\HomePageController;
// use App\Http\Controllers\MenuItemsController;
// use App\Http\Controllers\SliderController;
// use App\Http\Controllers\TestimonialsController;
// use App\Http\Controllers\WebSiteElementsController;
// //use Illuminate\Foundation\Application; //initial commented
// // use Illuminate\Support\Facades\Route; //initial commented
// use Inertia\Inertia;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// // Route::get('/', function () {
// //     return Inertia::render('Welcome', [
// //         'canLogin' => Route::has('login'),
// //         'canRegister' => Route::has('register'),
// //         'laravelVersion' => Application::VERSION,
// //         'phpVersion' => PHP_VERSION,
// //     ]);
// // });
// Route::get("/", [HomePageController::class, "homePage"]);
// Route::get("gallery-page", [HomePageController::class, "galleryPage"])->name("Gallery");
// Route::get("adminLogin", [AdminController::class, "adminLogin"]);//inteial name is admincontroller
// Route::get("about-us", [HomePageController::class, "aboutUs"])->name("aboutUs");
// Route::get("service", [HomePageController::class, "servicePage"])->name("servicePage");
// Route::get("menu", [HomePageController::class, "menuPage"])->name("menuPage");
// Route::get("reservation", [HomePageController::class, "reservationPage"])->name("reservationPage");
// Route::get("testimonials", [HomePageController::class, "testimonialsPage"])->name("testimonialsPage");
// Route::get("contact-us", [HomePageController::class, "contactUsPage"])->name("contactUs");
// Route::get('refresh-captcha',[HomePageController::class,"refreshCapthca"])->name("refreshCaptcha");
// Route::post('save-testimonials',[HomePageController::class,"saveTestimonials"])->name("saveTestimonials");
// Route::post('submit-booking',[BookingsController::class,"submitBooking"])->name("submitBooking");

// Route::get('/dashboard', function () {
//     //return view("Dashboard.dashboard_home");
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get("/new-dashboard", [AdminController::class, "dashboard"])->name("new-dashboard");//inteial name is admincontroller
//     Route::get("site-navigation", [AdminController::class, "siteNav"])->name("siteNav");//inteial name is admincontroller
//     Route::post("addEditNavigation", [AdminController::class, "addEditNavigation"])->name("addNaviagtion");//inteial name is admincontroller
//     Route::post("deleteNavigation", [AdminController::class, "deleteNavigation"])->name("deleteNavigation");//inteial name is admincontroller
//     Route::post("navDataTable", [AdminController::class, "navDataTable"])->name("navDataTable");//inteial name is admincontroller

//     Route::get("manage-gallery", [AdminController::class, "manageGallery"])->name("manageGallery");//inteial name is admincontroller
//     Route::post("addGalleryItems", [AdminController::class, "addGalleryItems"])->name("addGalleryItems");//inteial name is admincontroller
//     Route::post("addGalleryDataTable", [AdminController::class, "addGalleryDataTable"])->name("addGalleryDataTable");//inteial name is admincontroller

//     Route::get("add-web-site-elements", [WebSiteElementsController::class, "addWebSiteElements"])->name("webSiteElements");
//     Route::post("save-web-site-element", [WebSiteElementsController::class, "saveWebSiteElement"])->name("saveWebSiteElement");
//     Route::post("web-site-elements-data", [WebSiteElementsController::class, "getWebElementsData"])->name("webSiteElementsData");
    
//     Route::get("add-menu-items", [MenuItemsController::class, "addMenuItems"])->name("menuItems");
//     Route::post("save-menu-items", [MenuItemsController::class, "saveMenuItems"])->name("saveMenuItems");
//     Route::post("menu-elements-data", [MenuItemsController::class, "menuItemsData"])->name("menuItemsData");

//     Route::get("testimonials-admin", [TestimonialsController::class, "testimonials"])->name("Testimonials");
//     Route::post("change-approval-status", [TestimonialsController::class, "changeApproval"])->name("changeApproval");
//     Route::post("testimonials-data", [TestimonialsController::class, "testimonialsData"])->name("testimonialsData");

//     Route::get("bookings-recieved", [BookingsController::class, "bookingsPage"])->name("bookingsPage");
//     Route::post("bookings-data", [BookingsController::class, "bookingsData"])->name("bookingsData");

//     Route::get("slider-admin", [SliderController::class, "slider"])->name("Slider");
//     Route::post("save-Slide", [SliderController::class, "saveSlide"])->name("saveSlide");
//     Route::post("slider-data", [SliderController::class, "sliderData"])->name("sliderData");

// });


// require __DIR__ . '/auth.php';

// Route::get("login", [AdminController::class, "Login"])->name("login");//inteial name is admincontroller
// Route::post("AdminUserLogin", [AdminController::class, "AdminLoginUser"])->name("AdminLogin");//inteial name is admincontroller2
// Route::get("getmenu-items", [HomePageController::class, "getMenu"]);
// //pages
