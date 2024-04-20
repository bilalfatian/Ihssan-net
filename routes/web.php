<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Campaign;
use App\Models\Donation;


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

Route::get('/', [App\Http\Controllers\CampaignController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Campaigns
//Route::resource('campaigns', App\Http\Controllers\CampaignController::class)->middleware('auth');
Route::get('/campaigns', [App\Http\Controllers\CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/create', [App\Http\Controllers\CampaignController::class, 'create'])->middleware('auth')->name('campaigns.create');
Route::post('/campaigns/store', [App\Http\Controllers\CampaignController::class, 'store'])->name('campaigns.store');
Route::get('/my-campaigns', [App\Http\Controllers\CampaignController::class, 'myCampaigns'])->name('campaigns.my')->middleware('auth');
Route::get('/campaigns/{campaign}', [App\Http\Controllers\CampaignController::class, 'show'])->name('campaigns.show')->middleware('auth');
Route::get('/campaigns/{campaign}/edit',[App\Http\Controllers\CampaignController::class, 'edit'])->name('campaigns.edit');
Route::patch('/campaigns/{campaign}',[App\Http\Controllers\CampaignController::class, 'update'])->name('campaigns.update');
Route::delete('/campaigns/{campaign}', [App\Http\Controllers\CampaignController::class, 'destroy'])->name('campaigns.destroy');

// Donations
Route::get('/campaigns/{campaign}/donate', [App\Http\Controllers\DonationController::class, 'create'])->name('donations.create');
Route::post('/campaigns/{campaign}/donate', [App\Http\Controllers\DonationController::class, 'store'])->name('donations.store');
Route::get('/my-donations', [App\Http\Controllers\DonationController::class, 'myDonations'])->name('donations.my')->middleware('auth');


// User Balance (Admin)
Route::get('/users', [App\Http\Controllers\BalanceController::class, 'index'])->name('balance.index');
Route::get('/users/{user}/balance', [App\Http\Controllers\BalanceController::class, 'edit'])->name('balance.edit');
Route::put('/users/{user}/balance', [App\Http\Controllers\BalanceController::class, 'update'])->name('balance.update');

//Categories (Admin)
Route::resource('categories', App\Http\Controllers\CategoryController::class);
