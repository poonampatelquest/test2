<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/common')->group(function () {
    Route::get('/fix-information', [App\Http\Controllers\Api\CommonController::class, 'fixInformations']);
    Route::get('/type-of-art-work', [App\Http\Controllers\Api\CommonController::class, 'typeOfArtWork']);
    Route::get('/country', [App\Http\Controllers\Api\CommonController::class, 'country']);
    Route::get('/faq', [App\Http\Controllers\Api\CommonController::class, 'faq']);
    Route::get('/contact-info', [App\Http\Controllers\Api\CommonController::class, 'contactInfo']);
    Route::get('/contact-us', [App\Http\Controllers\Api\CommonController::class, 'contactUs']);
    
    Route::post('/get-other-attribute-based-on-type-of-art-work', [App\Http\Controllers\Api\CommonController::class, 'getOtherAttributeBasedOnTypeOfArtWork']);
});

Route::prefix('v1/artist')->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\Artist\Auth\LoginController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\Artist\Auth\RegisterController::class, 'register']);
    Route::post('/forgot-password', [App\Http\Controllers\Api\Artist\Auth\ForgotPasswordController::class, 'forgotPassword']);
    Route::middleware(['auth:api_artist'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Api\Artist\Auth\LoginController::class, 'logout']);
        //Profile
        Route::post('/update-profile', [App\Http\Controllers\Api\Artist\Profile\ProfileController::class, 'updateProfile']);
        Route::post('/update-password', [App\Http\Controllers\Api\Artist\Profile\ProfileController::class, 'updatePassword']);
        Route::get('/get-profile', [App\Http\Controllers\Api\Artist\Profile\ProfileController::class, 'getProfile']);

        // Painting
        Route::post('/painting-list', [App\Http\Controllers\Api\Artist\Art\PaintingController::class, 'paintingList']);
        Route::post('/painting-add', [App\Http\Controllers\Api\Artist\Art\PaintingController::class, 'paintingStore']);
        Route::post('/painting-delete', [App\Http\Controllers\Api\Artist\Art\PaintingController::class, 'paintingDelete']);
        Route::post('/painting-details', [App\Http\Controllers\Api\Artist\Art\PaintingController::class, 'paintingDetails']);
        Route::post('/painting-update', [App\Http\Controllers\Api\Artist\Art\PaintingController::class, 'paintingUpdate']);

        // Art Cash
        Route::post('/art-cash', [App\Http\Controllers\Api\Artist\Art\ArtCashController::class, 'artCashList']);

        // Dashboard
        Route::get('/home', [App\Http\Controllers\Api\Artist\DashboardController::class, 'index']);

        // Exbition
        Route::post('/register-exbition', [App\Http\Controllers\Api\Artist\Art\PaintingExhibitionController::class, 'exbitionRegistration']);
        Route::post('/register-for-sale', [App\Http\Controllers\Api\Artist\Art\PaintingExhibitionController::class, 'registerForSale']);
    });
});

Route::prefix('v1/user')->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\User\Auth\LoginController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\User\Auth\RegisterController::class, 'register']);
    Route::post('/forgot-password', [App\Http\Controllers\Api\User\Auth\ForgotPasswordController::class, 'forgotPassword']);
    Route::middleware(['auth:api'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Api\User\Auth\LoginController::class, 'logout']);
        //Profile
        Route::post('/update-profile', [App\Http\Controllers\Api\User\Profile\ProfileController::class, 'updateProfile']);
        Route::post('/update-password', [App\Http\Controllers\Api\User\Profile\ProfileController::class, 'updatePassword']);
        Route::get('/get-profile', [App\Http\Controllers\Api\User\Profile\ProfileController::class, 'getProfile']);

        // Address
        Route::post('/address-list', [App\Http\Controllers\Api\User\Profile\AddressController::class, 'addressList']);
        Route::post('/add-address', [App\Http\Controllers\Api\User\Profile\AddressController::class, 'addressAdd']);
        Route::post('/get-address', [App\Http\Controllers\Api\User\Profile\AddressController::class, 'getAddress']);
        Route::post('/update-address', [App\Http\Controllers\Api\User\Profile\AddressController::class, 'addressEdit']);
        Route::post('/delete-address', [ App\Http\Controllers\Api\User\Profile\AddressController::class, 'addressDelete']);

    });
});


