<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminMajorController;
use App\Http\Controllers\Admin\AdminFacilityController;
use App\Http\Controllers\Admin\AdminCultureController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminAchievementController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminAlumniController;
use App\Http\Controllers\Admin\AdminHomeFeatureController;

/*
|--------------------------------------------------------------------------
| Web Routes - Public Frontend (SMK Wikrama 1 Garut)
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/kompetensi-keahlian', [FrontendController::class, 'majors'])->name('majors');
Route::get('/kompetensi-keahlian/{slug}', [FrontendController::class, 'majorDetail'])->name('major.detail');
Route::get('/sumber-daya', [FrontendController::class, 'resources'])->name('resources');
Route::get('/budaya', [FrontendController::class, 'culture'])->name('culture');
Route::get('/berita', [FrontendController::class, 'news'])->name('news');
Route::get('/berita/{slug}', [FrontendController::class, 'newsDetail'])->name('news.detail');
Route::get('/tentang-kami', [FrontendController::class, 'about'])->name('about');
Route::post('/kontak/kirim-pesan', [FrontendController::class, 'sendMessage'])->name('contact.send');

// SPMB / PPDB Routes (Converted from spmb.html)
Route::get('/spmb', [FrontendController::class, 'spmb'])->name('spmb');
Route::get('/ppdb', [FrontendController::class, 'spmb'])->name('ppdb');
Route::post('/spmb/submitMessage', [FrontendController::class, 'submitSpmbMessage'])->name('spmb.submit');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Admin Protected CMS Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);

        // 2 Master Hub Pages: Edit Web Utama SMK & Edit Landing SPMB
        Route::get('/web-smk', [AdminDashboardController::class, 'webSmk'])->name('web_smk');
        Route::get('/spmb-manager', [AdminDashboardController::class, 'spmbManager'])->name('spmb_manager');

        // Home Features (8 Kartu Karakter & Budaya + Tagline/Tombol Beranda)
        Route::get('/home-features', [AdminHomeFeatureController::class, 'index'])->name('home-features.index');
        Route::post('/home-features/headers', [AdminHomeFeatureController::class, 'updateHeaders'])->name('home-features.headers');
        Route::get('/home-features/{card}/edit', [AdminHomeFeatureController::class, 'edit'])->name('home-features.edit');
        Route::put('/home-features/{card}', [AdminHomeFeatureController::class, 'update'])->name('home-features.update');
        Route::patch('/home-features/{card}/toggle', [AdminHomeFeatureController::class, 'toggle'])->name('home-features.toggle');

        // Sliders / Banners Manager (Home & SPMB)
        Route::resource('sliders', AdminSliderController::class);

        // Prestasi (Achievements)
        Route::resource('achievements', AdminAchievementController::class);

        // Galeri & Foto Media
        Route::resource('gallery', AdminGalleryController::class);

        // Testimoni Landing Page SPMB
        Route::resource('testimonials', AdminTestimonialController::class);

        // Data Alumni (Web Utama - Sumber Daya)
        Route::patch('alumni/{alumni}/toggle', [AdminAlumniController::class, 'toggleStatus'])->name('alumni.toggle');
        Route::resource('alumni', AdminAlumniController::class)->parameters(['alumni' => 'alumni']);

        // Dewan Guru & Tenaga Pendidik
        Route::patch('teachers/{teacher}/toggle', [AdminTeacherController::class, 'toggleStatus'])->name('teachers.toggle');
        Route::resource('teachers', AdminTeacherController::class);

        // School Profile, Visi Misi, Motto, Afirmasi, Attitude
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
        Route::post('/profile', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/vision-mission', [AdminProfileController::class, 'updateVisionMission'])->name('profile.vision_mission');

        // Majors
        Route::patch('majors/{major}/toggle', [AdminMajorController::class, 'toggleStatus'])->name('majors.toggle');
        Route::resource('majors', AdminMajorController::class);

        // Facilities
        Route::resource('facilities', AdminFacilityController::class);

        // Cultures
        Route::resource('cultures', AdminCultureController::class);

        // Education Report Stats
        Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
        Route::match(['post', 'put'], '/reports/{report?}', [AdminReportController::class, 'update'])->name('reports.update');

        // Partners & Certifications
        Route::resource('partners', AdminPartnerController::class);

        // News & Articles
        Route::resource('news', AdminNewsController::class);

        // Contact Messages & SPMB Registrations
        Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
    });
});
