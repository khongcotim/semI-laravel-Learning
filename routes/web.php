<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\VehicleController;
use App\Http\Controllers\admin\HotelController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SlideController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\DiscontController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\AccountAdminController;
use App\Http\Controllers\admin\AccountCustomerController;
use App\Http\Controllers\admin\CommentAdminController;
use App\Http\Controllers\admin\LogoController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ReplyAdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TourDeletedController;
use App\Http\Controllers\admin\TourGuildController;
use App\Http\Controllers\admin\TourManagerController;
//Customer
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\TourController;
use App\Http\Controllers\customer\AboutController;
use App\Http\Controllers\customer\ContactController;
use App\Http\Controllers\customer\BecomeController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\CheckoutController;
use App\Http\Controllers\customer\FaqController;
use App\Http\Controllers\customer\UserDashboardController;
use App\Http\Controllers\customer\AccountController;
use App\Http\Controllers\customer\BlogController as CustomerBlogController;
use App\Http\Controllers\customer\BlogsController;
use App\Http\Controllers\customer\ReplyController;
use App\Http\Controllers\customer\CommentController;
use App\Http\Controllers\customer\FavoriteController;
use App\Http\Controllers\customer\BookingController;
use App\Http\Controllers\customer\LoadmoreController;

// Trang Sign Up Customer
Route::get('/sign_up.html',[AccountController::class, 'sign_up'])->name('customer.sign_up');
Route::post('/sign_up.html',[AccountController::class, 'post_sign_up'])->name('customer.post_sign_up');
Route::get('/continue-register.html',[AccountController::class, 'continue_register'])->name('continue-register');
Route::post('/continue-register.html',[AccountController::class, 'post_continue_register'])->name('post-continue-register');

// Trang Login Customer
Route::get('/login.html',[AccountController::class, 'login'])->name('customer.login');
Route::post('/login.html',[AccountController::class, 'post_login'])->name('customer.post_login');
//recovery customer
Route::get('recovery.html',[AccountController::class,'recovery'])->name('customer.recovery');
Route::post('recovery.html',[AccountController::class,'post_recovery'])->name('customer.post_recovery');
//change password customer
Route::get('reset_password.html',[AccountController::class,'reset_password'])->name('customer.reset_password');
Route::post('reset_password.html',[AccountController::class,'post_reset_password'])->name('customer.post_reset_password');
//Log Out
Route::get('/logout',[AccountController::class, 'logout'])->name('customer.logout');

//List Customer route
Route::group(['prefix'=>''],function(){
    ///My Profile
    Route::get('',[CustomerController::class,'index'])->name('customer.index');

    // Trang user_dashboard
    Route::get('my-profile/{name}',[UserDashboardController::class,'my_profile'])->name('my_profile');
    Route::get('my-booking',[UserDashboardController::class,'my_booking'])->name('my-booking');
    Route::get('my-booking-detail/{id}',[UserDashboardController::class,'my_booking_detail'])->name('my-booking-detail');
    Route::get('my-profile-information',[UserDashboardController::class,'my_profile_information'])->name('my_profile_information');
    Route::get('my-reviews',[UserDashboardController::class,'my_reviews'])->name('my_reviews');
    Route::get('settings',[UserDashboardController::class,'settings'])->name('settings');
    Route::post('settings',[UserDashboardController::class,'update_settings'])->name('update_settings');
    Route::get('remove_avatar',[UserDashboardController::class,'remove_avatar'])->name('remove_avatar');
    Route::get('my-blog',[UserDashboardController::class,'my_blog'])->name('my_blog');
    Route::post('update_order/{id}',[UserDashboardController::class,'update_order'])->name('update_order');

    Route::get('user-profile/{id}.html',[UserDashboardController::class,'user_profile'])->name('user_profile');

    Route::post('tour_shop', [TourController::class, 'tour_shop'])->name('tour_shop');
    Route::get('tour_shop', [TourController::class, 'tour_shop'])->name('tour_shop');
    // Trang Tour_Detail
    Route::get('tour_detail/{slug}',[TourController::class, 'tour_detail'])->name('tour_detail');
    // Trang Blog
    Route::resource('blogs',BlogsController::class);
    // Trang Blog
    Route::resource('booking',BookingController::class);
    //Comment
    Route::resource('comment', CommentController::class);
    //Reply
    Route::resource('replies', ReplyController::class);
    // Trang About Us
    Route::get('about',[AboutController::class, 'about'])->name('about');
    // Trang Contact Us
    Route::get('contact',[ContactController::class, 'contact'])->name('contact');
    // Trang Become A Employee
    Route::get('become',[BecomeController::class, 'become'])->name('become');
    Route::post('post_feedback',[BecomeController::class, 'post_feedback'])->name('post_feedback');
    Route::post('post_register_employee',[BecomeController::class, 'post_register_employee'])->name('post_register_employee');
    // Trang Cart
    Route::get('cart',[CartController::class, 'cart'])->name('cart');
    Route::get('delete-cart/{id}',[CartController::class, 'delete_cart'])->name('cart.destroy');
    Route::post('add-order',[CartController::class, 'add_order'])->name('add_order');
    // Trang Check_Out
    Route::get('check_out',[CheckoutController::class, 'check_out'])->name('check_out');
    // Trang FAQ
    Route::get('faq',[FaqController::class, 'faq'])->name('faq');
    Route::resource('favorite', FavoriteController::class);
});

//Admin
//Login
Route::get('adminstrator/login.html',[AdminController::class,'login'])->name('adminLogin');
Route::post('submit_login.html',[AdminController::class,'submit_login'])->name('submit_login');

//recovery
Route::get('adminstrator/recovery.html',[AdminController::class,'recovery'])->name('admin.recovery');
Route::post('adminstrator/recovery.html',[AdminController::class,'post_recovery'])->name('admin.post_recovery');
//change password
Route::get('adminstrator/reset_password.html',[AdminController::class,'reset_password'])->name('admin.reset_password');
Route::post('adminstrator/reset_password.html',[AdminController::class,'post_reset_password'])->name('admin.post_reset_password');


//List Admin route
Route::group(['prefix'=>'adminstrator','middleware'=>'manager'],function(){
    Route::get('',[AdminController::class,'index'])->name('admin.home');
    Route::get('reviews',[AdminController::class,'reviews'])->name('admin.reviews');
    Route::resource('category', CategoryController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('hotel', HotelController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('slides', SlideController::class);
    Route::get('/update_slide_status',[AdminController::class,'update_slide_status'])->name('slide.update_status');
    Route::resource('feedback', FeedbackController::class);
    Route::resource('discount', DiscontController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('accountAdmin', AccountAdminController::class);
    Route::resource('accountCustomer', AccountCustomerController::class);
    Route::resource('order', OrderController::class);
    Route::resource('tour', TourManagerController::class);
    Route::resource('trash', TourDeletedController::class);
    Route::resource('reply', ReplyAdminController::class);
    Route::resource('comments', CommentAdminController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('tour_guide', TourGuildController::class);
    Route::resource('logo', LogoController::class);
    Route::get('logout',[AdminController::class,'logout'])->name('adminLogout');
    //update tour status
    Route::post('/tour/update/status/{id}',[AdminController::class,'update_tour_status'])->name('tour.update_status');
    Route::get('/tour/update/destroyByCheck',[AdminController::class,'destroyByCheck'])->name('tour.destroyByCheck');
    Route::get('/tour/update/restoreByCheck',[AdminController::class,'restoreByCheck'])->name('tour.restoreByCheck');
});
