<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\NilaiPerusahaanController;
use App\Http\Controllers\InspeksiController;

/*
|--------------------------------------------------------------------------
| Frontend / Public Routes
|--------------------------------------------------------------------------
*/
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'homepage')->name('homepage');
    Route::get('/layanan', 'layanan')->name('homepage.layanan');
    Route::get('/layanan/{id}', 'layananDetail')->name('homepage.layanan.detail');
    Route::get('/galeri', 'galeri')->name('homepage.galeri');
    Route::get('/tentang', 'tentang')->name('homepage.tentang');
    Route::get('/organisasi', 'strukturOrganisasi')->name('homepage.struktur-organisasi');
    Route::get('/testimoni', 'testimoni')->name('homepage.testimoni');
    Route::post('/testimoni/kirim', 'storeTestimonial')->name('homepage.testimoni.store');
    Route::get('/berita', 'news')->name('homepage.news');
    Route::get('/berita/{id}', 'newsDetail')->name('homepage.news.detail');
    Route::get('/faq', 'faq')->name('homepage.faq');
    Route::get('/kontak', 'kontak')->name('homepage.kontak');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/loginproses', 'loginproses')->name('loginproses');
    Route::get('/logout', 'logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Dashboard / Admin Routes (Auth Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'checkrole'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/user/{user}/update-password', [UserController::class, 'updatePasswordForm'])
        ->name('user.updatePasswordForm');
    Route::patch('/user/{user}/update-password', [UserController::class, 'updatePassword'])
        ->name('user.updatePassword');

    Route::resource('user', UserController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('profil', ProfilController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('news', NewsController::class);
    Route::resource('admin-faq', FaqController::class)
        ->parameters(['admin-faq' => 'faq'])
        ->names('faq');
    Route::resource('about', AboutController::class);
    Route::resource('milestone', MilestoneController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('feature', FeatureController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('admin-layanan', LayananController::class)
        ->parameters(['admin-layanan' => 'layanan'])
        ->names('layanan');
    Route::resource('struktur-organisasi', StrukturOrganisasiController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('visimisi', VisiMisiController::class);
    Route::resource('nilaiperusahaan', NilaiPerusahaanController::class);
    Route::resource('inspeksi', InspeksiController::class);
});
