<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminSettingController;


use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\RoomController;

use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerProfileController;
use App\Http\Controllers\Customer\CustomerOrdersController;


// Front
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact_submit');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/post/{id}', [BlogController::class, 'single'])->name('post');
Route::get('/room', [RoomController::class, 'index'])->name('room');
Route::get('/room/{id}', [RoomController::class, 'single_room'])->name('room_detail');

Route::post('/booking/submit', [BookingController::class, 'cart_submit'])->name('cart_submit');
Route::get('/cart', [BookingController::class, 'cart_view'])->name('cart');
Route::get('/cart/delete/{id}', [BookingController::class, 'cart_delete'])->name('cart_delete');
Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout');
Route::post('/payment', [BookingController::class, 'payment'])->name('payment');
Route::post('/payment/submit/', [BookingController::class, 'payment_submit'])->name('payment_submit');


// customer
Route::get('/login', [CustomerAuthController::class, 'login'])->name('customer_login');
Route::post('/login-submit', [CustomerAuthController::class, 'login_submit'])->name('customer_login_submit');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer_logout');
Route::get('/signup', [CustomerAuthController::class, 'signup'])->name('customer_signup');
Route::post('/signup-submit', [CustomerAuthController::class, 'signup_submit'])->name('customer_signup_submit');
Route::get('/signup-verify/{email}/{token}', [CustomerAuthController::class, 'signup_verify'])->name('customer_signup_verify');
Route::get('/forget-password', [CustomerAuthController::class, 'forget_password'])->name('customer_forget_password');
Route::post('/forget-password-submit', [CustomerAuthController::class, 'forget_password_submit'])->name('customer_forget_password_submit');
Route::get('/reset-password/{token}/{email}', [CustomerAuthController::class, 'reset_password'])->name('customer_reset_password');
Route::post('/reset-password-submit', [CustomerAuthController::class, 'reset_password_submit'])->name('customer_reset_password_submit');


/* Customer - Middleware */
Route::group(['middleware' =>['customer:customer']], function(){
    Route::get('/customer/home', [CustomerHomeController::class, 'index'])->name('customer_home');
    Route::get('/customer/profile', [CustomerProfileController::class, 'index'])->name('customer_profile');
    Route::post('/customer/edit-profile-submit', [CustomerProfileController::class, 'profile_submit'])->name('customer_profile_submit');
    Route::get('/customer/order/view', [CustomerOrdersController::class, 'index'])->name('customer_order_view');
    Route::get('/customer/invoice/{id}', [CustomerOrdersController::class, 'invoice'])->name('customer_invoice');
});

// Admin

Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/forget_password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget_password_submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset_password_submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

/* Admin - Middleware */
Route::group(['middleware' =>['admin:admin']], function(){

    Route::get('/admin/setting', [AdminSettingController::class, 'index'])->name('admin_setting');
    Route::post('/admin/setting/update', [AdminSettingController::class, 'update'])->name('admin_setting_update');

    Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin_customer');
    Route::get('/admin/customer/change-status/{id}', [AdminCustomerController::class, 'change_status'])->name('admin_customer_change_status');

    Route::get('/admin/order/view', [AdminOrderController::class, 'index'])->name('admin_orders');
    Route::get('/admin/order/invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin_invoice');
    Route::get('/admin/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin_order_delete');

    Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
    Route::get('admin/home', [AdminDashboardController::class, 'index'])->name('admin_home');
    Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::post('admin/profile-edit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
    
    Route::get('admin/slide/view', [AdminSlideController::class, 'index'])->name('admin_slide_view');
    Route::get('admin/slide/add', [AdminSlideController::class, 'create'])->name('admin_slide_add');
    Route::post('admin/slide/submit', [AdminSlideController::class, 'store'])->name('admin_slide_submit');
    Route::get('admin/slide/delete/{id}', [AdminSlideController::class, 'delete'])->name('admin_slide_delete');
    Route::get('admin/slide/edit/{id}', [AdminSlideController::class, 'edit'])->name('admin_slide_edit');
    Route::post('admin/slide/update/{id}', [AdminSlideController::class, 'update'])->name('admin_slide_update');
    
    Route::get('admin/feature/view', [AdminFeatureController::class, 'index'])->name('admin_feature_view');
    Route::get('admin/feature/add', [AdminFeatureController::class, 'create'])->name('admin_feature_add');
    Route::post('admin/feature/submit', [AdminFeatureController::class, 'store'])->name('admin_feature_submit');
    Route::get('admin/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete');
    Route::get('admin/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('admin/feature/update/{id}', [AdminFeatureController::class, 'update'])->name('admin_feature_update');
    
    Route::get('admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_view');
    Route::get('admin/testimonial/add', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_add');
    Route::post('admin/testimonial/submit', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_submit');
    Route::get('admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');
    Route::get('admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    
    Route::get('admin/post/view', [AdminPostController::class, 'index'])->name('admin_post_view');
    Route::get('admin/post/add', [AdminPostController::class, 'create'])->name('admin_post_add');
    Route::post('admin/post/submit', [AdminPostController::class, 'store'])->name('admin_post_submit');
    Route::get('admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');
    Route::get('admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    
    Route::get('admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq_view');
    Route::get('admin/faq/add', [AdminFaqController::class, 'create'])->name('admin_faq_add');
    Route::post('admin/faq/submit', [AdminFaqController::class, 'store'])->name('admin_faq_submit');
    Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');
    Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    
    Route::get('admin/about/view', [AdminPageController::class, 'about'])->name('admin_about_view');
    Route::post('admin/about/update/{id}', [AdminPageController::class, 'about_update'])->name('admin_about_update');
    
    Route::get('admin/contactus/view', [AdminPageController::class, 'contactus'])->name('admin_contactus_view');
    Route::post('admin/contactus/update/{id}', [AdminPageController::class, 'contactus_update'])->name('admin_contactus_update');
    
    Route::get('admin/contact/view', [AdminContactController::class, 'index'])->name('admin_contact_view');
    Route::get('admin/contact/delete/{id}', [AdminContactController::class, 'delete'])->name('admin_contact_delete');
    Route::post('admin/contact/update/{id}', [AdminContactController::class, 'update'])->name('admin_contact_update');
    
    Route::get('admin/cart/view', [AdminPageController::class, 'cart'])->name('admin_cart_view');
    Route::post('admin/cart/update/{id}', [AdminPageController::class, 'cart_update'])->name('admin_cart_update');
    
    Route::get('admin/room/page', [AdminPageController::class, 'room'])->name('admin_page_room_view');
    Route::post('admin/page/update/{id}', [AdminPageController::class, 'room_update'])->name('admin_page_room_update');
    
    Route::get('admin/checkout/view', [AdminPageController::class, 'checkout'])->name('admin_checkout_view');
    Route::post('admin/checkout/update/{id}', [AdminPageController::class, 'checkout_update'])->name('admin_checkout_update');
    
    Route::get('admin/signin/view', [AdminPageController::class, 'signin'])->name('admin_signin_view');
    Route::post('admin/signin/update/{id}', [AdminPageController::class, 'signin_update'])->name('admin_signin_update');
    
    Route::get('admin/signup/view', [AdminPageController::class, 'signup'])->name('admin_signup_view');
    Route::post('admin/signup/update/{id}', [AdminPageController::class, 'signup_update'])->name('admin_signup_update');
    
    Route::get('admin/amenity/view', [AdminAmenityController::class, 'index'])->name('admin_amenity_view');
    Route::get('admin/amenity/add', [AdminAmenityController::class, 'create'])->name('admin_amenity_add');
    Route::post('admin/amenity/submit', [AdminAmenityController::class, 'store'])->name('admin_amenity_submit');
    Route::get('admin/amenity/delete/{id}', [AdminAmenityController::class, 'delete'])->name('admin_amenity_delete');
    Route::get('admin/amenity/edit/{id}', [AdminAmenityController::class, 'edit'])->name('admin_amenity_edit');
    Route::post('admin/amenity/update/{id}', [AdminAmenityController::class, 'update'])->name('admin_amenity_update');
    
    Route::get('admin/room/view', [AdminRoomController::class, 'index'])->name('admin_room_view');
    Route::get('admin/room/add', [AdminRoomController::class, 'create'])->name('admin_room_add');
    Route::post('admin/room/submit', [AdminRoomController::class, 'store'])->name('admin_room_submit');
    Route::get('admin/room/delete/{id}', [AdminRoomController::class, 'delete'])->name('admin_room_delete');
    Route::get('admin/room/edit/{id}', [AdminRoomController::class, 'edit'])->name('admin_room_edit');
    Route::post('admin/room/update/{id}', [AdminRoomController::class, 'update'])->name('admin_room_update');
    
    Route::get('/admin/room/gallery/{id}', [AdminRoomController::class, 'gallery'])->name('admin_room_gallery');
    Route::post('/admin/room/gallery/store/{id}', [AdminRoomController::class, 'gallery_store'])->name('admin_room_gallery_store');
    Route::get('/admin/room/gallery/delete/{id}', [AdminRoomController::class, 'gallery_delete'])->name('admin_room_gallery_delete');
    



});

