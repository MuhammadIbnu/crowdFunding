<?php
namespace App\Http\Controllers\Admin;
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
    return view('auth.login');
});

Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function() {

        //route dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        //route Category
        Route::resource('/category', CategoryController::class,['as'=>'admin']);
        //route Campaign
        Route::resource('/campaign', CampaignController::class,['as'=>'admin']);
        //get route donatur
        Route::get('/donatur', [DonaturController::class,'index'])->name('admin.donatur.index');
        //get route donasi
        Route::get('/donasi', [DonationController::class,'index'])->name('admin.donation.index');
        //get filter donasi
        Route::get('/donasi/filter',[DonationController::class,'filter'])->name('admin.donation.filter');
        //get profile
        Route::get('/profile',[ProfileController::class,'index'])->name('admin.profile.index');
        //slider
        Route::resource('/slider', SliderController::class, ['except' => ['show', 'create', 'edit', 'update'], 'as' => 'admin']);

    });
});
