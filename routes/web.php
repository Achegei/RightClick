<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/
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
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\AdminBusinessIdeaController as AdminBusinessIdeaController;
use App\Http\Controllers\Admin\SuccessStoryController as AdminSuccessStoryController;
use App\Http\Controllers\Payments\IntaSendWebhookController;


/*
|--------------------------------------------------------------------------
| FRONTEND CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\FreeRoadmapController;
use App\Http\Controllers\Frontend\TestimonialController as FrontendTestimonialController;
use App\Http\Controllers\Frontend\BusinessIdeaController as FrontendBusinessIdeaController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\ProRoadmapController;
use App\Http\Controllers\Frontend\PremiumRoadmapController;
use App\Http\Controllers\Frontend\SuccessStoryController as FrontendSuccessStoryController;
use App\Http\Controllers\Frontend\RoadmapController;
use App\Http\Controllers\Frontend\LessonController as FrontendLessonController;
use App\Http\Controllers\Frontend\BlogCTAController;
/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::view('/', 'welcome')->name('home');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::prefix('programs')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/{slug}', [ProgramController::class, 'show'])->name('programs.show');
});

Route::post('/blogs/{blog}/cta', [BlogCTAController::class, 'store'])
    ->name('blogs.cta');
    
Route::get('/lessons/{lesson:slug}', [FrontendLessonController::class, 'show'])
    ->name('lessons.show');

Route::get('/business-ideas', [FrontendBusinessIdeaController::class, 'index'])->name('business_ideas.index');
Route::get('/business-ideas/{businessIdea:slug}', [FrontendBusinessIdeaController::class, 'show'])->name('business_ideas.show');

Route::get('/success-stories/{successStory:slug}', [FrontendSuccessStoryController::class, 'show'])->name('success_stories.show');
Route::get('success-stories', [FrontendSuccessStoryController::class, 'index'])->name('success_stories.index');



/*
|--------------------------------------------------------------------------
| 2. FREE ROADMAP
|--------------------------------------------------------------------------
*/
Route::get('/free-roadmap', [FreeRoadmapController::class, 'index'])->name('free-roadmap');
Route::post('/free-roadmap/subscribe', [FreeRoadmapController::class, 'subscribeNewsletter'])->name('free-roadmap.subscribe');
Route::middleware('auth')->post('/free-roadmap/complete', [FreeRoadmapController::class, 'markCompleted'])->name('free-roadmap.complete');

/*
|--------------------------------------------------------------------------
| 3. BLOG ROUTES (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

/*
|--------------------------------------------------------------------------
| 4. TESTIMONIALS (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/testimonials', [FrontendTestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/testimonials/create', [FrontendTestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [FrontendTestimonialController::class, 'store'])->name('testimonials.store');

/*
|--------------------------------------------------------------------------
| 5. CHECKOUT & PAYMENTS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('checkout')->group(function () {
    Route::get('{tier}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('{tier}/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
    Route::get('{tier}/complete', [CheckoutController::class, 'complete'])->name('checkout.complete');
});


// IntaSend webhook (No auth, No CSRF)
Route::post('/webhook/intasend', [IntaSendWebhookController::class, 'handleIntaSend'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
/*
|--------------------------------------------------------------------------
| 6. AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Comments
    Route::post('/comments', [AdminCommentController::class, 'store'])->name('comments.store');
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('comments.index');

    // Profile management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
    // PRO Roadmap (pro + premium users)
    Route::get('/roadmap/pro', [RoadmapController::class, 'pro'])
        ->name('roadmap.pro');

    // PREMIUM Roadmap (premium users only)
    Route::get('/roadmap/premium', [RoadmapController::class, 'premium'])
        ->name('roadmap.premium');
});

/*
|--------------------------------------------------------------------------
| 7. ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------
    | Admin Guest (Login)
    |--------------------------------------------------
    */
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    /*
    |--------------------------------------------------
    | Admin Authenticated (protected panel)
    |--------------------------------------------------
    */
    Route::middleware(['auth:admin', 'admin'])->group(function () {

        // Dashboard & Logout
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Admin resources
        Route::resources([
            'programs' => AdminProgramController::class,
            'courses' => AdminCourseController::class,
            'users' => AdminUserController::class,
            'videos' => VideoController::class,
            'blogs' => AdminBlogController::class,
            'lessons' => LessonController::class,
            //'resources' => ResourceController::class,
            'testimonials' => AdminTestimonialController::class,
            'business-ideas' => AdminBusinessIdeaController::class,
            'success-stories' => AdminSuccessStoryController::class,
            //'newsletter-subscribers' => NewsletterSubscriberController::class,
        ]);

        // Testimonial approval
        Route::post('testimonials/{testimonial}/toggle-approval', [AdminTestimonialController::class, 'toggleApproval'])
            ->name('testimonials.toggleApproval');

        // Comments management
        Route::prefix('comments')->group(function () {
            Route::get('/', [AdminCommentController::class, 'index'])->name('comments.index');
            Route::post('{comment}/approve', [AdminCommentController::class, 'approve'])->name('comments.approve');
            Route::delete('{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
        });

        // Default admin redirect
        Route::get('/', fn () => redirect()->route('admin.dashboard'));
    });
});

/*
|--------------------------------------------------------------------------
| 8. AUTHENTICATION ROUTES (Breeze/Fortify)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
