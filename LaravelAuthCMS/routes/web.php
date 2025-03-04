<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

// Nauman's Controllers list starts here
use App\Http\Controllers\newControllers\AdminControllerNew;
use App\Http\Controllers\newControllers\ImagesController;

// Nauman's Controllers list starts here


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


// Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::get('stripe/success/{id}', [StripeController::class, 'stripe_success'])->name('stripe.success');
Route::get('stripe/cancel', [StripeController::class, 'stripe_cancel'])->name('stripe.cancel');

    Route::group(['middleware' => ['auth']], function () {


        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
          //Users
          Route::get('user/list', [AdminController::class, 'user_list'])->name('user.list');
          Route::get('user/create/{id}', [AdminController::class, 'user_create'])->name('user.create');
          Route::post('user/submit/{id}', [AdminController::class, 'user_submit'])->name('user.submit');
          Route::post('user/detail', [AdminController::class, 'user_detail'])->name('user.detail');
          Route::post('user/destroy', [AdminController::class, 'user_destroy'])->name('user.destroy');

        //Categories
        Route::get('category/list', [AdminController::class, 'category_list'])->name('category.list');
        Route::get('category/create/{id}', [AdminController::class, 'category_create'])->name('category.create');
        Route::post('category/submit/{id}', [AdminController::class, 'category_submit'])->name('category.submit');
        Route::post('category/detail', [AdminController::class, 'category_detail'])->name('category.detail');
        Route::post('category/destroy', [AdminController::class, 'category_destroy'])->name('category.destroy');



         //Job
        Route::get('job/list', [AdminController::class, 'job_list'])->name('job.list');
        Route::get('job/create/{id}', [AdminController::class, 'job_create'])->name('job.create');
        Route::post('job/submit/{id}', [AdminController::class, 'job_submit'])->name('job.submit');
        Route::post('job/detail', [AdminController::class, 'job_detail'])->name('job.detail');
        Route::post('job/destroy', [AdminController::class, 'job_destroy'])->name('job.destroy');
        Route::get('job/getchapters', [AdminController::class, 'job_get_chapters'])->name('job.chapters');

 //Business
        Route::get('business/list', [AdminController::class, 'business_list'])->name('business.list');
        Route::get('business/create/{id}', [AdminController::class, 'business_create'])->name('business.create');
        Route::post('business/submit/{id}', [AdminController::class, 'business_submit'])->name('business.submit');
        Route::post('business/detail', [AdminController::class, 'business_detail'])->name('business.detail');
        Route::post('business/destroy', [AdminController::class, 'business_destroy'])->name('business.destroy');

        // Nauman's Routes starts from here
        Route::get('new/dashboard', [AdminControllerNew::class, 'index'])->name('dashboard.new');
        // User Routes
        Route::get('user/list', [AdminControllerNew::class, 'user_list'])->name('user.list.new');
        Route::get('user/create/{id}', [AdminControllerNew::class, 'user_create'])->name('user.create.new');
        Route::post('user/submit/{id}', [AdminControllerNew::class, 'user_submit'])->name('user.submit.new');
        Route::post('user/detail', [AdminControllerNew::class, 'user_detail'])->name('user.detail.new');
        Route::post('user/destroy', [AdminControllerNew::class, 'user_destroy'])->name('user.destroy.new');

        // Images Routes
        Route::get('head/image', [ImagesController::class, 'head_img_form'])->name('head.img.form');
        Route::post('head/submit/{id}', [ImagesController::class, 'head_img_submit'])->name('images.submit');
        // Nauman's Routes ends here
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
