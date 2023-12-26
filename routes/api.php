<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    // logout
    Route::post('/logout', [ApiController::class, 'logout']);
    // reset password
    Route::post('/reset-password', [ApiController::class, 'reset_password']);
});
// Route::get('/login', [LoginController::class, 'loginPage']);
// Route::post('/login', [LoginController::class, 'login']);

Route::get('/get-landing-page-data', [ApiController::class, 'get_landing_page_data']);
Route::get('/get-hero-section', [ApiController::class, 'hero_section']);
Route::get('/get-our-values', [ApiController::class, 'our_values']);
Route::get('/get-about-us', [ApiController::class, 'about_us']);
Route::get('/get-our-services', [ApiController::class, 'our_services']);
Route::get('/get-portfolio', [ApiController::class, 'portfolio']);
Route::get('/get-project', [ApiController::class, 'project']);
Route::get('/get-priceing', [ApiController::class, 'pricing']);
Route::get('/get-faq', [ApiController::class, 'faq']);
Route::get('/get-testimonials', [ApiController::class, 'testimonials']);

Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);

