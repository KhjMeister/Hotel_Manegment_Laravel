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
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminContactController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;


// Front
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact_submit');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/post/{id}', [BlogController::class, 'single'])->name('post');

Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/login', [WebsiteController::class, 'login'])->name('login');
Route::get('/register', [WebsiteController::class, 'registration'])->name('register');
Route::post('/login-submit', [WebsiteController::class, 'login_submit'])->name('login_submit');
Route::get('/logout', [WebsiteController::class, 'logout'])->name('logout');



// Admin
Route::get('admin/home', [AdminDashboardController::class, 'index'])->name('admin_home')->middleware('admin:admin');

Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('admin/profile-edit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');

Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout')->middleware('admin:admin');

Route::get('admin/forget_password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget_password_submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');

Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset_password_submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('admin/slide/view', [AdminSlideController::class, 'index'])->name('admin_slide_view')->middleware('admin:admin');
Route::get('admin/slide/add', [AdminSlideController::class, 'create'])->name('admin_slide_add')->middleware('admin:admin');
Route::post('admin/slide/submit', [AdminSlideController::class, 'store'])->name('admin_slide_submit')->middleware('admin:admin');
Route::get('admin/slide/delete/{id}', [AdminSlideController::class, 'delete'])->name('admin_slide_delete')->middleware('admin:admin');
Route::get('admin/slide/edit/{id}', [AdminSlideController::class, 'edit'])->name('admin_slide_edit')->middleware('admin:admin');
Route::post('admin/slide/update/{id}', [AdminSlideController::class, 'update'])->name('admin_slide_update')->middleware('admin:admin');

Route::get('admin/feature/view', [AdminFeatureController::class, 'index'])->name('admin_feature_view')->middleware('admin:admin');
Route::get('admin/feature/add', [AdminFeatureController::class, 'create'])->name('admin_feature_add')->middleware('admin:admin');
Route::post('admin/feature/submit', [AdminFeatureController::class, 'store'])->name('admin_feature_submit')->middleware('admin:admin');
Route::get('admin/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete')->middleware('admin:admin');
Route::get('admin/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit')->middleware('admin:admin');
Route::post('admin/feature/update/{id}', [AdminFeatureController::class, 'update'])->name('admin_feature_update')->middleware('admin:admin');

Route::get('admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_view')->middleware('admin:admin');
Route::get('admin/testimonial/add', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_add')->middleware('admin:admin');
Route::post('admin/testimonial/submit', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_submit')->middleware('admin:admin');
Route::get('admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete')->middleware('admin:admin');
Route::get('admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit')->middleware('admin:admin');
Route::post('admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update')->middleware('admin:admin');

Route::get('admin/post/view', [AdminPostController::class, 'index'])->name('admin_post_view')->middleware('admin:admin');
Route::get('admin/post/add', [AdminPostController::class, 'create'])->name('admin_post_add')->middleware('admin:admin');
Route::post('admin/post/submit', [AdminPostController::class, 'store'])->name('admin_post_submit')->middleware('admin:admin');
Route::get('admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');
Route::get('admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update')->middleware('admin:admin');

Route::get('admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq_view')->middleware('admin:admin');
Route::get('admin/faq/add', [AdminFaqController::class, 'create'])->name('admin_faq_add')->middleware('admin:admin');
Route::post('admin/faq/submit', [AdminFaqController::class, 'store'])->name('admin_faq_submit')->middleware('admin:admin');
Route::get('admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete')->middleware('admin:admin');
Route::get('admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit')->middleware('admin:admin');
Route::post('admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update')->middleware('admin:admin');

Route::get('admin/about/view', [AdminAboutController::class, 'index'])->name('admin_about_view')->middleware('admin:admin');
Route::post('admin/about/update/{id}', [AdminAboutController::class, 'update'])->name('admin_about_update')->middleware('admin:admin');

Route::get('admin/contact/view', [AdminContactController::class, 'index'])->name('admin_contact_view')->middleware('admin:admin');
Route::get('admin/contact/delete/{id}', [AdminContactController::class, 'delete'])->name('admin_contact_delete')->middleware('admin:admin');
