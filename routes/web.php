<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendContactController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PortalController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/migrate', function () {
    Artisan::call('migrate ');
    return redirect()->route("home")->with('success', 'Migrate Successfull');

});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect()->route("home")->with('success', 'Application all kind of cache has been cleared');

    // return 'Application all kind of cache has been cleared';
});

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/blog/{blog:slug}', [HomeController::class, 'showblog'])->name('showblog');

Route::get('blogs', [HomeController::class, 'allblogs'])->name('allblogs');
Route::get('/search/blog', [HomeController::class, 'searchblog'])->name('searchblog');

Route::get('products', [HomeController::class, 'products'])->name('allproducts');
Route::get('/product/{product:slug}', [HomeController::class, 'singlepage'])->name('product.singlepage');

Route::post('productreview/{productreview}', [HomeController::class, 'productreview'])->name('productreview');
Route::get('/search', [HomeController::class, 'productsearch'])->name('productsearch');


Route::get('brand/{brand:slug}', [HomeController::class, 'getbybrand'])->name('getbybrand');

Route::get('categories', [HomeController::class, 'allcategories'])->name('allcategories');
Route::get('brands', [HomeController::class, 'brands'])->name('brands');

Route::get('category/{category}', [HomeController::class, 'getbycategory'])->name('getbycategory');

Route::get('newarrival', [HomeController::class, 'newarrival'])->name('newarrival');
Route::get('trending', [HomeController::class, 'trending'])->name('trending');
Route::get('topsellingproducts', [HomeController::class, 'bestsellingproduct'])->name('bestsellingproduct');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'storeuser'])->name('user.register');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'customerlogin'])->name('customerlogin');

Route::get('forgotpassword', [AuthController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('forgotpassword', [AuthController::class, 'checkemail'])->name('checkemail');

Route::get('checkotp/{checkotp}', [AuthController::class, 'viewcheckotp'])->name('viewcheckotp');
Route::post('checkotp/{checkotp}', [AuthController::class, 'checkotp'])->name('checkotp');

Route::get('changepassword/{getchangepassword}', [AuthController::class, 'getchangepassword'])->name('getchangepassword');
Route::post('changepassword/{changepassword}', [AuthController::class, 'changepassword'])->name('changepassword');

Route::post('/logout', [AuthController::class, 'logout'])->name('front.logout');

Route::get('/contact', [FrontendContactController::class, 'contactus'])->name('contactus');

Route::post('/contact', [FrontendContactController::class, 'storecontactus'])->name('contactus.store');


Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist')->middleware("user");

Route::get('/addwishlist/{product}', [HomeController::class, 'addwishlist'])->name('addwishlist');

Route::get('/removewishlist/{product}', [HomeController::class, 'removewishlist'])->name('removewishlist');

// cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/thankyou', [HomeController::class, 'thanks'])->name('thanks');

Route::post('/checkcouponcode', [HomeController::class, 'checkcouponcode'])->name('checkcouponcode');

Route::post('/checkoutpay', [HomeController::class, 'checkoutpay'])->name('checkoutpay');

Route::get('/addCart/{product}', [CartController::class, 'addCart'])->name('addCart');
Route::get('/getcartdata', [CartController::class, 'getCart'])->name('getCart');
Route::get('/countAdd/{product}', [CartController::class, 'addCount'])->name('addCount');
Route::get('/subCount/{product}', [CartController::class, 'subCount'])->name('subCount');
Route::get('/clearallcart', [CartController::class, 'removeCart'])->name('remove.cart');
Route::get('/clearcart/{product}', [CartController::class, 'removeSingleCart'])->name('remove.single.cart');
Route::post('addincart', [CartController::class, 'storecart'])->name('cart.store');

Route::get('/autocomplete', [HomeController::class, 'autocomplete'])->name('autocomplete');

Route::get('/products', [HomeController::class, 'filtersearch'])->name('filtersearch');




Route::get('/teams', [HomeController::class, 'teams'])->name('teams');

Route::get('/termsandcondition', [HomeController::class, 'termsandcondition'])->name('termsandcondition');
Route::get('/privacypolicy', [HomeController::class, 'privacypolicy'])->name('privacypolicy');

// portal
Route::get('/portal/dashboard', [PortalController::class, 'index'])->name('portal.dashboard')->middleware("user");

Route::get('track-order', [PortalController::class, 'getorder'])->name('user.tracker');

Route::group(['middleware' => 'user'], function () {
    Route::post('portal/user-update/{userid}', [PortalController::class, 'update_address'])->name('user.updates');
    Route::post('portal/user-update-password/{userid}', [PortalController::class, 'changePassword'])->name('user.passwordchange');
    Route::post('portal/user-address-update/{userid}', [PortalController::class, 'update_delivery_address'])->name('userDeliveryAddressUpdate');
    // Route::get('portal/viewcommission/{viewcommission}', [PortalController::class, 'viewaffilatecommission'])->name('user.affilatecommission');
    Route::get('portal/profile', [PortalController::class, 'profile'])->name('user.profile');
    // Route::get('portal/payment-history', [PortalController::class, 'paymentHistory'])->name('payment.history');
    Route::get('portal/change-password', [PortalController::class, 'passwordChange'])->name('user.passwordChange');
    Route::get('portal/order-history', [PortalController::class, 'orderHistory'])->name('user.history');
    Route::get('portal/order-details/{orderid}', [PortalController::class, 'orderDetails'])->name('user.details');
    Route::get('portal/transaction-statements', [PortalController::class, 'statements'])->name('user.statements');
});

Route::get('/changePaymentStatus/{orderid}', [HomeController::class, 'changePaymentStatus'])->name('changePaymentStatus');

Route::get('NICASIA', [HomeController::class, 'NICASIA'])->name('NICASIA');

// google
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('auth/google/call-back', [GoogleController::class, 'callbackGoogle'])->name('google.callback');
