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
use App\Http\Controllers\Admin\BusinessIdeaController;
use App\Http\Controllers\Admin\SuccessStoryController;



/*
|--------------------------------------------------------------------------
| FRONTEND CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\FreeRoadmapController;
use App\Http\Controllers\Frontend\TestimonialController as FrontendTestimonialController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\ProRoadmapController;
use App\Http\Controllers\Frontend\PremiumRoadmapController;

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::view('/', 'welcome')->name('home');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::prefix('programs')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/{slug}', [ProgramController::class, 'show'])->name('program.show');
});

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
Route::prefix('checkout')->group(function () {
    Route::get('{tier}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::get('{tier}/payment', [CheckoutController::class, 'paymentForm'])->name('checkout.payment');
    Route::post('{tier}/payment', [CheckoutController::class, 'submitPayment'])->name('checkout.payment.submit');
});

Route::get('/pro-roadmap', [ProRoadmapController::class, 'index'])
    ->middleware('subscription:pro');

Route::get('/premium-roadmap', [PremiumRoadmapController::class, 'index'])
    ->middleware('subscription:premium');


/*
|--------------------------------------------------------------------------
| 6. AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/comments', [CommentController::class, 'store'])
        ->name('comments.store');
    Route::get('comments', [Admin\CommentController::class, 'index'])->name('comments.index');


    // Profile management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
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
    | Admin Authenticated
    |--------------------------------------------------
    */

    Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:access-admin-panel'])->group(function () {
    Route::resource('success-stories', Admin\SuccessStoryController::class);
});

    Route::middleware('auth:admin')->group(function () {

        // Logout
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Resources
        Route::resources([
            'programs' => AdminProgramController::class,
            'courses' => AdminCourseController::class,
            'users' => AdminUserController::class,
            'lessons' => LessonController::class,
            'videos' => VideoController::class,
            'blogs' => AdminBlogController::class,
            'resources' => ResourceController::class,
            'testimonials' => AdminTestimonialController::class,
            'business-ideas' => BusinessIdeaController::class,
            'success-stories' => SuccessStoryController::class,
        ]);

        // Newsletter subscribers
        Route::resource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index', 'destroy']);

        // Testimonial approval toggle
        Route::post('testimonials/{testimonial}/toggle-approval', [AdminTestimonialController::class, 'toggleApproval'])
            ->name('testimonials.toggleApproval');

        Route::resource('business-ideas', BusinessIdeaController::class);


        // Default admin redirect
        Route::get('/', fn () => redirect()->route('admin.dashboard'));

        Route::prefix('comments')->group(function () {
            Route::get('/', [AdminCommentController::class, 'index'])->name('comments.index');
            Route::post('{comment}/approve', [AdminCommentController::class, 'approve'])->name('comments.approve');
            Route::delete('{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
        });

    });
});

/*
|--------------------------------------------------------------------------
| 8. AUTHENTICATION ROUTES (Breeze/Fortify)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| 9. INTA SEND WEBHOOK
|--------------------------------------------------------------------------
*/
Route::post('/webhook/intasend', [CheckoutController::class, 'handleIntaSend'])
    ->middleware('web')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
