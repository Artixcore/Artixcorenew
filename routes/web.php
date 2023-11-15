<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('register', [RegisterController::class, 'registerPage'])->name('registerPage');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('login', [LoginController::class, 'loginPage'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('loginPage');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::controller(LandingPageController::class)->prefix('landing_page')->name('landing_page.')->group(function () {
        Route::prefix('hero_section')->name('hero_section.')->group(function () {
            Route::get('title', 'hero_section_title')->name('title');
            Route::post('title', 'hero_section_title_update')->name('title.update');

            Route::get('categories', 'hero_section_categories')->name('categories');
            Route::post('categories', 'hero_section_categories_update')->name('categories.update');
        });

        Route::prefix('our_values')->name('our_values.')->group(function () {
            Route::get('title', 'our_values_title')->name('title');
            Route::post('title', 'our_values_title_update')->name('title.update');

            Route::get('sections', 'our_values_sections')->name('sections');
            Route::post('sections', 'our_values_sections_update')->name('sections.update');
        });

        Route::prefix('about_us')->name('about_us.')->group(function () {
            Route::get('title', 'about_us_title')->name('title');
            Route::post('title', 'about_us_title_update')->name('title.update');
        });

        Route::prefix('our_services')->name('our_services.')->group(function () {
            Route::get('title', 'our_services_title')->name('title');
            Route::post('title', 'our_services_title_update')->name('title.update');

            Route::get('services', 'our_services_services')->name('services');
            Route::post('services', 'our_services_services_update')->name('services.update');
        });

        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('title', 'testimonials_title')->name('title');
            Route::post('title', 'testimonials_title_update')->name('title.update');

            Route::get('testimonials', 'testimonials_testimonials')->name('testimonials');
            Route::post('testimonials', 'testimonials_testimonials_update')->name('testimonials.update');
        });

        Route::prefix('portfolio')->name('portfolio.')->group(function () {
            Route::get('title', 'portfolio_title')->name('title');
            Route::post('title', 'portfolio_title_update')->name('title.update');

            Route::get('projects', 'portfolio_projects')->name('projects');
            Route::post('projects', 'portfolio_projects_update')->name('projects.update');
        });

        Route::prefix('pricing')->name('pricing.')->group(function () {
            Route::get('title', 'pricing_title')->name('title');
            Route::post('title', 'pricing_title_update')->name('title.update');
        });

        Route::prefix('faq')->name('faq.')->group(function () {
            Route::get('title', 'faq_title')->name('title');
            Route::post('title', 'faq_title_update')->name('title.update');

            Route::get('faqs', 'faq_faqs')->name('faqs');
            Route::post('faqs', 'faq_faqs_update')->name('faqs.update');
        });
    });

    Route::controller(PackageController::class)->prefix('packages')->name('packages.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{package}', 'edit')->name('edit');
        Route::put('update/{package}', 'update')->name('update');

        Route::delete('destroy/{package}', 'destroy')->name('destroy');
    });
});
