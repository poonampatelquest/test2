<?php
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
     return view('welcome');
 });

Route::get('/q', [App\Http\Controllers\HomeController::class, 'index']);

 //Clear route cache:
 Route::get('/route-cache', function() {
	$exitCode = Artisan::call('route:cache');
	return 'Routes cache cleared';
});


 //Clear route cache:
Route::get('/queue-work', function() {
	$exitCode =Artisan::call('queue:work');
	return $exitCode;
	return 'Routes cache cleared';
});



//Clear config cache:
Route::get('/config-cache', function() {
	$exitCode = Artisan::call('config:cache');
	return 'Config cache cleared';
}); 

// Clear application cache:
Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('cache:clear');
	return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
	$exitCode = Artisan::call('view:clear');
	return 'View cache cleared';
});

// Clear view cache:
Route::get('/dump-autoload', function() {
	$exitCode = Artist::call('dump-autoload');
	return 'Dump autoload';
});

// Admin Routes 
Route::prefix('admin')->name('admin.')->group(function () {

	Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login.show');
	Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
});


// Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

	Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
	Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
	Route::get('/change-password', [App\Http\Controllers\Admin\Profile\ProfileController::class, 'getPassword'])->name('update.password.show');
	Route::post('/change-password', [App\Http\Controllers\Admin\Profile\ProfileController::class, 'updatePassword'])->name('update.password');
	Route::get('/artist-list', [App\Http\Controllers\Admin\Artist\ArtistController::class, 'artistList'])->name('artist.list');
	Route::get('/artist-change-status', [App\Http\Controllers\Admin\Artist\ArtistController::class, 'changeStatus'])->name('artist.change.status');
	Route::get('/add-artist', [App\Http\Controllers\Admin\Artist\ArtistController::class, 'addArtistShow'])->name('artist.add');
	// user 
	Route::get('/user-list', [App\Http\Controllers\Admin\User\UserController::class, 'userList'])->name('user.list');
	Route::get('/user-change-status', [App\Http\Controllers\Admin\User\UserController::class, 'changeStatus'])->name('user.change.status');
	Route::get('/painting-list', [App\Http\Controllers\Admin\Painting\PaintingController::class, 'paintingList'])->name('painting.list');
	Route::get('/change-painting-status', [App\Http\Controllers\Admin\Painting\PaintingController::class, 'changePaintingStatus'])->name('change.painting.status');
	Route::get('/painting-view/{id}', [App\Http\Controllers\Admin\Painting\PaintingController::class, 'paintingView'])->name('painting.view');
	Route::get('/painting-delete/{id}', [App\Http\Controllers\Admin\Painting\PaintingController::class, 'paintingDelete'])->name('painting.delete');
	Route::get('/art-cash', [App\Http\Controllers\Admin\ArtCash\ArtCashController::class, 'artCashList'])->name('art.cash');
	// CMS
	Route::get('/about-us', [App\Http\Controllers\Admin\Page\PageController::class, 'aboutUs'])->name('about.us');
	Route::post('/about-us', [App\Http\Controllers\Admin\Page\PageController::class, 'aboutUsUpdate'])->name('about.us.update');
	Route::get('/terms-conditions', [App\Http\Controllers\Admin\Page\PageController::class, 'termsCondition'])->name('terms.conditions');
	Route::post('/terms-conditions', [App\Http\Controllers\Admin\Page\PageController::class, 'termsConditionUpdate'])->name('terms.conditions.update');
	Route::get('/privacy-policy', [App\Http\Controllers\Admin\Page\PageController::class, 'privacyPolicy'])->name('privacy.policy');
	Route::post('/privacy-policy', [App\Http\Controllers\Admin\Page\PageController::class, 'privacyPolicyUpdate'])->name('privacy.policy.update');


});

// Artist Routes

Route::prefix('artist')->name('artist.')->group(function () {

	Route::get('/login', [App\Http\Controllers\Artist\Auth\LoginController::class, 'showLoginForm'])->name('login.show');
	Route::post('/login', [App\Http\Controllers\Artist\Auth\LoginController::class, 'login'])->name('login');
	Route::get('/register', [App\Http\Controllers\Artist\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.show');
	Route::post('/register', [App\Http\Controllers\Artist\Auth\RegisterController::class, 'register'])->name('register');
	Route::get('/forget-password', [App\Http\Controllers\Artist\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('forget.password.show');
	Route::post('/forget-password', [App\Http\Controllers\Artist\Auth\ForgotPasswordController::class, 'sendPasswordInMail'])->name('forget.password');

});

Route::middleware(['auth:artist', 'checkValidArtist'])->prefix('artist')->name('artist.')->group(function () {

	Route::get('/', [App\Http\Controllers\Artist\DashboardController::class, 'index'])->name('dashboard');
	Route::post('/logout', [App\Http\Controllers\Artist\Auth\LoginController::class, 'logout'])->name('logout');
	Route::get('/change-password', [App\Http\Controllers\Artist\Profile\ProfileController::class, 'getPassword'])->name('update.password.show');
	Route::post('/change-password', [App\Http\Controllers\Artist\Profile\ProfileController::class, 'updatePassword'])->name('update.password');
	Route::get('/change-profile', [App\Http\Controllers\Artist\Profile\ProfileController::class, 'updateProfileShow'])->name('update.profile.show');
	Route::post('/change-profile', [App\Http\Controllers\Artist\Profile\ProfileController::class, 'updateProfile'])->name('update.profile');

	Route::get('/art-cash', [App\Http\Controllers\Artist\Art\ArtCashController::class, 'artCashList'])->name('art.cash');
	Route::get('/painting-list', [App\Http\Controllers\Artist\Art\PaintingController::class, 'paintingList'])->name('painting.list');
	Route::get('/painting-add', [App\Http\Controllers\Artist\Art\PaintingController::class, 'paintingAddShow'])->name('painting.add');
	Route::get('/get-other-attribute-based-on-art-work-type', [App\Http\Controllers\Artist\Art\PaintingController::class, 'getOtherAttributeBasedOnTypeOfArtWork'])->name('get-other-attribute-based-on-art-work-type');
	Route::get('/painting-images', [App\Http\Controllers\Artist\Art\PaintingController::class, 'paintingImages'])->name('painting-images');

	Route::post('/painting-add', [App\Http\Controllers\Artist\Art\PaintingController::class, 'paintingStore'])->name('painting.store');
	Route::get('/painting-edit/{id}', [App\Http\Controllers\Artist\Art\PaintingController::class, 'paintingEdit'])->name('painting.edit');

	Route::get('/painting-delete/{id}', [App\Http\Controllers\Artist\Art\PaintingController::class, 'paintingDelete'])->name('painting.delete');
	Route::post('/painting-edit', [App\Http\Controllers\Artist\Art\PaintingController::class, 'paintingUpdate'])->name('painting.update');
});


// Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('forget.password.show');
Route::post('/forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendPasswordInMail'])->name('forget.password');

Route::name('user.')->prefix('user')->middleware(['auth:web'])->group(function () {
	
	Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
	Route::get('/', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');
	Route::get('/change-password', [App\Http\Controllers\User\Profile\ProfileController::class, 'getPassword'])->name('update.password.show');
	Route::post('/change-password', [App\Http\Controllers\User\Profile\ProfileController::class, 'updatePassword'])->name('update.password');
	Route::get('/change-profile', [App\Http\Controllers\User\Profile\ProfileController::class, 'updateProfileShow'])->name('update.profile.show');
	Route::post('/change-profile', [App\Http\Controllers\User\Profile\ProfileController::class, 'updateProfile'])->name('update.profile');
	Route::get('/address-list', [App\Http\Controllers\User\Profile\AddressController::class, 'addressList'])->name('address.list');
	Route::get('/add-address', [App\Http\Controllers\User\Profile\AddressController::class, 'addressAddShow'])->name('address.add.show');
	Route::post('/add-address', [App\Http\Controllers\User\Profile\AddressController::class, 'addressAdd'])->name('address.add');
	Route::get('/edit-address/{id}', [App\Http\Controllers\User\Profile\AddressController::class, 'addressEditShow'])->name('address.edit.show');
	Route::post('/edit-address', [App\Http\Controllers\User\Profile\AddressController::class, 'addressEdit'])->name('address.edit');
	Route::get('/delete-address/{id}', [App\Http\Controllers\User\Profile\AddressController::class, 'addressDelete'])->name('address.delete');
	Route::get('/wishlist', [App\Http\Controllers\User\Wishlist\WishlistController::class, 'wishlist'])->name('wishlist');
	Route::get('/remove-from-wishlist/{id}', [App\Http\Controllers\User\Wishlist\WishlistController::class, 'removeFromWishlist'])->name('remove.from.wishlist');
	Route::get('/add-in-wishlist', [App\Http\Controllers\User\Wishlist\WishlistController::class, 'addInWishlist'])->name('add.wishlist');
	
});

Route::name('front.')->group(function () {

	Route::get('/all-artist-list', [App\Http\Controllers\Front\Artist\ArtistController::class, 'artistList'])->name('artist.list');
	Route::get('/artist-painting-list', [App\Http\Controllers\Front\Artist\ArtistController::class, 'artistPaintingList'])->name('artist.painting.list');
	Route::get('/get-other-attribute-based-on-art-work-type', [App\Http\Controllers\Front\Artist\ArtistController::class, 'getOtherAttributeBasedOnTypeOfArtWork'])->name('get-other-attribute-based-on-art-work-type');;
	Route::get('/artist/artist-detail/{name}/{id}', [App\Http\Controllers\Front\Artist\ArtistController::class, 'artistDetail'])->name('artist.detail');
	Route::get('/artist/artist-painting-details/{name}/{paintingname}/{id}', [App\Http\Controllers\Front\Artist\ArtistController::class, 'artistPaintingDetail'])->name('artist.painting.detail');
	Route::get('/artist/painting-commision-message/', [App\Http\Controllers\Front\Artist\ArtistController::class, 'sendPaintingCommisionMessage'])->name('artist.commision.message');
	Route::get('ask-question', [App\Http\Controllers\Front\Common\CommonController::class, 'askQuestion'])->name('askquestion');
	Route::get('subsciber', [App\Http\Controllers\Front\Common\CommonController::class, 'subscribe'])->name('subsciber');
	// Cms
	Route::get('about-us', [App\Http\Controllers\Front\Common\PageController::class, 'aboutUs'])->name('about.us');
	Route::get('contact-us', [App\Http\Controllers\Front\Common\PageController::class, 'contactUsShow'])->name('contact.us.show');
	Route::post('contact-us', [App\Http\Controllers\Front\Common\PageController::class, 'contactUs'])->name('contact.us');
	Route::get('terms-and-conditions', [App\Http\Controllers\Front\Common\PageController::class, 'termsAndCondition'])->name('term.condition');
	Route::get('how-it-works', [App\Http\Controllers\Front\Common\PageController::class, 'howItWork'])->name('howitwork');
	Route::get('faq', [App\Http\Controllers\Front\Common\PageController::class, 'faq'])->name('faq');
	Route::get('services', [App\Http\Controllers\Front\Common\PageController::class, 'services'])->name('services');
	// Cart

	Route::get('cart', [App\Http\Controllers\Front\Cart\CartController::class, 'cart'])->name('cart');



});
