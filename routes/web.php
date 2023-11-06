<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LandingPageController;
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
});

Route::get('register', [RegisterController::class, 'registerPage']);
Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::controller(LandingPageController::class)->prefix('landing_page')->name('landing_page.')->group(function () {
        Route::prefix('hero_section')->name('hero_section.')->group(function () {
            Route::get('title', 'hero_section_title')->name('title');
            Route::post('title', 'hero_section_title_update')->name('title.update');
        });

        Route::prefix('our_values')->name('our_values.')->group(function () {
            Route::get('title', 'our_values_title')->name('title');
            Route::post('title', 'our_values_title_update')->name('title.update');
        });

        Route::prefix('about_us')->name('about_us.')->group(function () {
            Route::get('title', 'about_us_title')->name('title');
            Route::post('title', 'about_us_title_update')->name('title.update');
        });

        Route::prefix('our_services')->name('our_services.')->group(function () {
            Route::get('title', 'our_services_title')->name('title');
            Route::post('title', 'our_services_title_update')->name('title.update');
        });

        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('title', 'testimonials_title')->name('title');
            Route::post('title', 'testimonials_title_update')->name('title.update');
        });

        Route::prefix('portfolio')->name('portfolio.')->group(function () {
            Route::get('title', 'portfolio_title')->name('title');
            Route::post('title', 'portfolio_title_update')->name('title.update');
        });

        Route::prefix('pricing')->name('pricing.')->group(function () {
            Route::get('title', 'pricing_title')->name('title');
            Route::post('title', 'pricing_title_update')->name('title.update');
        });

        Route::prefix('faq')->name('faq.')->group(function () {
            Route::get('title', 'faq_title')->name('title');
            Route::post('title', 'faq_title_update')->name('title.update');
        });
    });
});
