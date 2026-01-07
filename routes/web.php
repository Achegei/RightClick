<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/
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
use App\Http\Controllers\Admin\AdminBusinessIdeaController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserGeneratedBusinessIdeaController;
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
use App\Http\Controllers\Frontend\UserBusinessIdeaController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\RoadmapController;
use App\Http\Controllers\Frontend\LessonController as FrontendLessonController;
use App\Http\Controllers\Frontend\BlogCTAController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LandingPageController;
/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/learn/{page}', [LandingPageController::class, 'show'])->name('landing.show');


// Programs
Route::prefix('programs')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/{slug}', [ProgramController::class, 'show'])->name('programs.show');
});

// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::post('/blogs/{blog}/cta', [BlogCTAController::class, 'store'])->name('blogs.cta');

// Lessons
Route::get('/lessons/{lesson:slug}', [FrontendLessonController::class, 'show'])->name('lessons.show');

// Business Ideas (Public)
Route::get('/business-ideas', [FrontendBusinessIdeaController::class, 'index'])->name('business_ideas.index');
Route::get('/business-ideas/{businessIdea:slug}', [FrontendBusinessIdeaController::class, 'show'])->name('business_ideas.show');

//User-Generated Business Ideas
// routes/web.php

Route::get('/user-business-ideas/{businessIdea}', [UserBusinessIdeaController::class, 'show'])->name('frontend.user-business-ideas.show');


/*
|--------------------------------------------------------------------------
| 2. USER-GENERATED BUSINESS IDEAS (AUTHENTICATED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('user-business-ideas')->name('frontend.user-business-ideas.')->group(function () {
    Route::get('/', [UserBusinessIdeaController::class, 'index'])->name('index');
    Route::get('/create', [UserBusinessIdeaController::class, 'create'])->name('create');
    Route::post('/', [UserBusinessIdeaController::class, 'store'])->name('store');
});

// Public single view for a user-generated idea
Route::get('/user-business-ideas/{businessIdea:slug}', [UserBusinessIdeaController::class, 'show'])
    ->name('frontend.user-business-ideas.show');

/*
|--------------------------------------------------------------------------
| 3. FREE ROADMAP
|--------------------------------------------------------------------------
*/
Route::get('/free-roadmap', [FreeRoadmapController::class, 'index'])->name('free-roadmap');
Route::post('/free-roadmap/subscribe', [FreeRoadmapController::class, 'subscribeNewsletter'])->name('free-roadmap.subscribe');
Route::middleware('auth')->post('/free-roadmap/complete', [FreeRoadmapController::class, 'markCompleted'])->name('free-roadmap.complete');

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

// IntaSend webhook (no auth, no CSRF)
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

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Roadmaps
    Route::get('/roadmap/pro', [RoadmapController::class, 'pro'])->name('roadmap.pro');
    Route::get('/roadmap/premium', [RoadmapController::class, 'premium'])->name('roadmap.premium');
});

/*
|--------------------------------------------------------------------------
| 7. ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest Admin (Login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // Authenticated Admin
    Route::middleware(['auth:admin', 'admin'])->group(function () {

        // Dashboard & Logout
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

        /*
        |-------------------------------------------------------------
        | User-Generated Business Ideas (Admin)
        |-------------------------------------------------------------
        */
        Route::prefix('user-generated-business-ideas')->name('user-generated-business-ideas.')->group(function () {
            Route::get('/', [UserGeneratedBusinessIdeaController::class, 'index'])->name('index');
            Route::get('{idea}/edit', [UserGeneratedBusinessIdeaController::class, 'edit'])->name('edit');
            Route::put('{idea}', [UserGeneratedBusinessIdeaController::class, 'update'])->name('update');
            Route::post('{idea}/approve', [UserGeneratedBusinessIdeaController::class, 'approve'])->name('approve');
            Route::post('{idea}/reject', [UserGeneratedBusinessIdeaController::class, 'reject'])->name('reject');
            Route::post('{idea}/publish', [UserGeneratedBusinessIdeaController::class, 'publish'])->name('publish');
            Route::delete('{idea}', [UserGeneratedBusinessIdeaController::class, 'destroy'])->name('destroy');
        });


        /*
        |-------------------------------------------------------------
        | Admin Resources
        |-------------------------------------------------------------
        */
        Route::resources([
            'programs'       => AdminProgramController::class,
            'courses'        => AdminCourseController::class,
            'users'          => AdminUserController::class,
            'videos'         => VideoController::class,
            'blogs'          => AdminBlogController::class,
            'lessons'        => LessonController::class,
            //'resources'    => ResourceController::class,
            'testimonials'   => AdminTestimonialController::class,
            'business-ideas' => AdminBusinessIdeaController::class,
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
