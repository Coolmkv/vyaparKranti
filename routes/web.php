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

include_once "adminRoutes.php";