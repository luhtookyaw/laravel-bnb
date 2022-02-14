<?php

use App\Models\Bookable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookableController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BookablePriceController;
use App\Http\Controllers\BookableReviewsController;
use App\Http\Controllers\BookingByReviewController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('bookables', BookableController::class)->only(['index', 'show']);

Route::get('bookables/{bookable}/availibility', BookingController::class)
->name('bookables.availibility.show');

Route::get('bookables/{bookable}/reviews', BookableReviewsController::class)
->name('bookables.reviews.show');

Route::get('/booking-by-review/{reviewKey}', BookingByReviewController::class)
->name('booking.by-review.show');

Route::get('bookables/{bookable}/price', BookablePriceController::class)
->name('bookables.price.show');

Route::get('reviews/{review}', [ReviewController::class, 'show']);

Route::post('reviews', [ReviewController::class, 'store']);

Route::post('checkout', CheckoutController::class);

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
 
    return $token;
});



