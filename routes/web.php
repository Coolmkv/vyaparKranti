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
*/

Route::get('/', [WebSitePages::class,"homePage"])->name("homePage");
Route::get('about-us', [WebSitePages::class,"aboutUs"])->name("aboutUs");
Route::get('services', [WebSitePages::class,"ourServices"])->name("ourServices");
Route::get('library', [WebSitePages::class,"ourPortfolio"])->name("ourPortfolio");
Route::get('contact-us', [WebSitePages::class,"contactUs"])->name("contactUs");
Route::get('library-category',[WebSitePages::class,"libraryCategory"])->name("libraryCategory");

// Create Inner Page
Route::get('content-writing',[WebSitePages::class,"contentwriting"])->name("contentwriting");
Route::get('brand-building',[WebSitePages::class,"brandBuilding"])->name("brandBuilding");
Route::get('business-analytics',[WebSitePages::class,"businessAnalytics"])->name("businessAnalytics");
Route::get('designs-creatives',[WebSitePages::class,"designCreatives"])->name("designCreatives");
Route::get('digital-marketing',[WebSitePages::class,"digitalMarketing"])->name("digitalMarketing");
Route::get('web-development',[WebSitePages::class,"webDevelopment"])->name("webDevelopment");
Route::get('career',[WebSitePages::class,"careerPage"])->name("careerPage");
Route::get('career-details',[WebSitePages::class,"careerDetailPage"])->name("careerDetailPage");
Route::get('package',[WebSitePages::class,"packagePage"])->name("packagePage");




//Route::get('library-category-details/{id}',[WebSitePages::class,"libraryCategoryDetails"]);

Route::get('refresh-captcha',[WebSitePages::class,"refreshCapthca"])->name("refreshCaptcha");
Route::post('subscribe-news-letter',[WebSitePages::class,"subscribeNewsLetter"])->name("subscribeNewsLetter");

Route::post('contact-us-form-submit',[WebSitePages::class,"contactUsFormSubmit"])->name("contactUsForm");

Route::post('build-project-form-submit',[WebSitePages::class,"buildProjectFormSubmit"])->name("buildProjectFormSubmit");


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
