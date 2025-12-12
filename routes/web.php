<?php

use Illuminate\Support\Facades\Route;

// =====================================
// FRONTEND CONTROLLERS
// =====================================
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CampaignController;
use App\Http\Controllers\Frontend\DonationController;

// =====================================
// ADMIN CONTROLLERS
// =====================================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CampaignController as AdminCampaignController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;


// =====================================
// FRONTEND MAIN
// =====================================

// HOME PAGE
Route::get('/', [HomeController::class, 'index'])->name('home');

// STATIC PAGES
Route::view('/tentang', 'frontend.about')->name('about');
Route::view('/kontak', 'frontend.contact')->name('contact');

// SEARCH API
Route::get('/api/search', [HomeController::class, 'search'])->name('search');


// =====================================
// CAMPAIGN FRONTEND
// =====================================

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaign/{slug}', [CampaignController::class, 'show'])->name('campaigns.show');


// =====================================
// DONATION FLOW
// =====================================

Route::get('/donasi/{id}', [DonationController::class, 'form'])->name('donation.form');
Route::post('/donasi/{id}', [DonationController::class, 'process'])->name('donation.process');

Route::get('/donasi/{id}/dummy-pay', [DonationController::class, 'dummyPay'])->name('donation.dummyPay');
// Route::post('/donasi/{invoice}/finish', [DonationController::class, 'finish'])->name('donation.finish');
Route::post('/donasi/{invoice}/finish', [DonationController::class, 'finish'])
    ->name('donation.finish');

Route::get('/donasi/status/{invoice}', [DonationController::class, 'status'])->name('donation.status');


// =====================================
// ADMIN AREA (LOGIN REQUIRED)
// =====================================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // DASHBOARD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // CAMPAIGNS CRUD
    Route::get('/campaigns', [AdminCampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/campaigns/create', [AdminCampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns', [AdminCampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/campaigns/{id}/edit', [AdminCampaignController::class, 'edit'])->name('campaigns.edit');
    Route::put('/campaigns/{id}', [AdminCampaignController::class, 'update'])->name('campaigns.update');
    Route::delete('/campaigns/{id}', [AdminCampaignController::class, 'destroy'])->name('campaigns.destroy');

    // DONATIONS LIST & DETAIL
    Route::get('/donations', [AdminDonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/{id}', [AdminDonationController::class, 'show'])->name('donations.show');
    Route::post('/donations/{id}/status', [AdminDonationController::class, 'updateStatus'])->name('donations.updateStatus');
});


// =====================================
// AUTH ROUTES (BREEZE)
// =====================================

// WAJIB!!! Agar login/register/reset berfungsi.
require __DIR__.'/auth.php';
