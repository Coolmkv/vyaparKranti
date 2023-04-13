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
Route::get('library-category',[WebSitePages::class,"libraryCategory"]);

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
 
});

require __DIR__.'/auth.php';
Route::get("login",[AdminController::class,"Login"])->name("login");
Route::post("AdminUserLogin",[AdminController::class,"AdminLoginUser"])->name("AdminLogin");
Route::get("getmenu-items",[HomePageController::class,"getMenu"]);
