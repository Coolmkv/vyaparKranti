<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Library\Library;
use Illuminate\Support\Facades\Route;

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

    Route::get('build-a-project-data',[AdminController::class,"buildAprojectData"])->name("buildAprojectData");
    Route::get('contact-us-data',[AdminController::class,"contactUsData"])->name("contactUsData");
    Route::post('build-a-project-datatable',[AdminController::class,"buildAprojectDataTable"])->name("buildAprojectDataTable");
    
    Route::get('run-api',[AdminController::class,"runAPI"])->name("runAPI");
    Route::get('run-api-form',[AdminController::class,"runAPIForm"])->name("runAPIForm");
    
    Route::get("mange-contact-us",[ContactUsController::class,"manageContactUs"])->name("manageContactUs");
    Route::post("contact-us-data",[ContactUsController::class,"contactUsData"])->name("ContactUsData");
});

require __DIR__.'/auth.php';
Route::get("login",[AdminController::class,"Login"])->name("login");
Route::post("AdminUserLogin",[AdminController::class,"AdminLoginUser"])->name("AdminLogin");
