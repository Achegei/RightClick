<?php

use Illuminate\Support\Facades\Route;

// -------------------------------------------------
// Admin Controllers
// -------------------------------------------------
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProgramController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;

// -------------------------------------------------
// Frontend Controllers
// -------------------------------------------------
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\FreeRoadmapController as FrontendFreeRoadmapController;
use App\Http\Controllers\Frontend\TestimonialController as FrontendTestimonialController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// -------------------------------------------------
// Public Routes
// -------------------------------------------------
Route::get('/', [FrontendFreeRoadmapController::class, 'index'])->name('home');

Route::get('/checkout/{tier}', [CheckoutController::class, 'show'])->name('checkout');
Route::get('/free-roadmap', [FrontendFreeRoadmapController::class, 'index'])->name('free-roadmap');
Route::post('/free-roadmap/subscribe', [FrontendFreeRoadmapController::class, 'subscribeNewsletter'])->name('free-roadmap.subscribe');

// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

// Testimonials (Frontend submission)
Route::get('/testimonials/create', [FrontendTestimonialController::class, 'create'])->name('testimonials.create');
Route::get('/testimonials', [FrontendTestimonialController::class, 'index'])->name('testimonials.index');
Route::post('/testimonials', [FrontendTestimonialController::class, 'store'])->name('testimonials.store');

// -------------------------------------------------
// Authenticated User Routes
// -------------------------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// -------------------------------------------------
// Admin Authentication Routes
// -------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// -------------------------------------------------
// Protected Admin Routes
// -------------------------------------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // CRUD resources
    Route::resource('programs', AdminProgramController::class);
    Route::resource('courses', AdminCourseController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('blogs', AdminBlogController::class);
    Route::resource('resources', ResourceController::class);
    Route::resource('testimonials', FrontendTestimonialController::class); // Admin can manage all testimonials
    Route::resource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index', 'destroy']);

    // Additional admin actions
    Route::post('testimonials/toggle-approval/{testimonial}', [FrontendTestimonialController::class, 'toggleApproval'])
        ->name('testimonials.toggleApproval');

    // Redirect root admin to dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
});

// -------------------------------------------------
// Auth routes
// -------------------------------------------------
require __DIR__.'/auth.php';
