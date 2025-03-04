<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

// Nauman's Controllers list starts here
use App\Http\Controllers\newControllers\AdminControllerNew;
use App\Http\Controllers\newControllers\BusinessControllerDsb;
use App\Http\Controllers\newControllers\GeneralSettingsController;
use App\Http\Controllers\newControllers\ProductControllerDsb;
use App\Http\Controllers\newControllers\SubscriptionController;
use App\Http\Controllers\OrderController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


    // Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/', [AdminControllerNew::class, 'index'])->name('dashboard.new');

    //Users
    Route::get('user/list', [AdminController::class, 'user_list'])->name('user.list');
    Route::get('user/create/{id}', [AdminController::class, 'user_create'])->name('user.create');
    Route::post('user/submit/{id}', [AdminController::class, 'user_submit'])->name('user.submit');
    Route::post('user/detail', [AdminController::class, 'user_detail'])->name('user.detail');
    Route::post('user/destroy', [AdminController::class, 'user_destroy'])->name('user.destroy');
    Route::get('user/change-status/{user_id}/{status}', [AdminController::class, 'user_change_status'])->name('user.change.status');


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
    // Route::get('business/list', [AdminController::class, 'business_list'])->name('business.list');
    // Route::get('business/create/{id}', [AdminController::class, 'business_create'])->name('business.create');
    // Route::post('business/submit/{id}', [AdminController::class, 'business_submit'])->name('business.submit');
    // Route::post('business/detail', [AdminController::class, 'business_detail'])->name('business.detail');
    // Route::post('business/destroy', [AdminController::class, 'business_destroy'])->name('business.destroy');


    // Nauman's Routes starts from here
    // Route::get('/', [AdminControllerNew::class, 'index'])->name('dashboard.new');
    // User Routes
    Route::get('user/list', [AdminControllerNew::class, 'user_list'])->name('user.list.new');
    Route::get('user/create/{id}', [AdminControllerNew::class, 'user_create'])->name('user.create.new');
    Route::post('user/submit/{id}', [AdminControllerNew::class, 'user_submit'])->name('user.submit.new');
    Route::post('user/detail', [AdminControllerNew::class, 'user_detail'])->name('user.detail.new');
    Route::post('user/destroy', [AdminControllerNew::class, 'user_destroy'])->name('user.destroy.new');
    Route::get('user/full/details/{user_id?}/{id?}', [AdminControllerNew::class, 'user_full_details'])->name('user.full.details');
    Route::get('status', [AdminControllerNew::class, 'userOnlineStatus']);
    Route::get('/status',  [AdminControllerNew::class, 'userOnlineStatus']);

    Route::post('update/profileImage', [AdminControllerNew::class, 'edit_image']);

    // Dashboard Bussiness routes
    Route::get('business/list', [BusinessControllerDsb::class, 'index'])->name('business.listing');
    Route::post('business/detail', [BusinessControllerDsb::class, 'business_detail'])->name('business.detail');
    Route::get('business/full/details/{business_id?}/{id?}', [BusinessControllerDsb::class, 'full_details'])->name('business.full.details');

    // Dashboard Products Routes
    Route::get('products/list', [ProductControllerDsb::class, 'index'])->name('products.listing');
    Route::post('products/detail', [ProductControllerDsb::class, 'products_detail'])->name('products.detail');

    // Dashboard Orders Routes
    Route::get('orders/list', [OrderController::class, 'index'])->name('orders.listing');
    Route::post('orders/detail', [OrderController::class, 'orders_detail'])->name('orders.detail');
    Route::get('orders/create/{id}', [OrderController::class, 'orders_create'])->name('orders.create');
    Route::post('orders/submit/{id}', [OrderController::class, 'orders_submit'])->name('orders.submit');

    // Subscriptions Crud Routes
    Route::get('subscriptions/list', [SubscriptionController::class, 'index'])->name('subscription.listing');
    Route::get('subscription/create/{id}', [SubscriptionController::class, 'subscription_create'])->name('subscription.create');
    Route::post('subscription/submit/{id}', [SubscriptionController::class, 'subscription_submit'])->name('subscription.submit');
    Route::post('subscription/detail', [SubscriptionController::class, 'subscription_detail'])->name('subscription.detail');
    Route::post('subscription/destroy', [SubscriptionController::class, 'subscription_destroy'])->name('subscription.destroy');

    // General Settings Routes
    Route::get('general/settings', [GeneralSettingsController::class, 'general_settings_form'])->name('general.setings');
    Route::post('general/settings/submit/{id}', [GeneralSettingsController::class, 'submit'])->name('general.setting.submit');
    // Nauman's Routes ends here
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
