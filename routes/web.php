<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');
//login
Route::match(['get', 'post'], '/login', [FrontendController::class, 'login'])->name('login');
//logout
Route::get('/logout', [FrontendController::class, 'logout'])->name('logout');
//portfolio-details
Route::get('/portfolio-details/{id}', [FrontendController::class, 'portfolioDetails'])->name('details');
//feedback
Route::get('/contact', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/contact/store', [FeedbackController::class, 'store'])->name('feedback.store');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //notifications
    Route::get('/notification', [DashboardController::class, 'notifications'])->name('notification');
    Route::get('/Feedbackmarkasread', function () {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\FeedbackNotification')->markAsRead();
        return redirect()->route('feedback.index');
    })->name('Feedbackmarkasread');
    Route::get('/Usermarkasread', function () {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUserNotification')->markAsRead();
        return redirect()->route('user.index');
    })->name('Usermarkasread');
    //user
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    //roles
    Route::resource('role', RoleController::class);
    //about
    Route::get('/about', [AboutController::class, 'create'])->name('about');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    //homepage
    Route::get('/home', [HomePageController::class, 'create'])->name('home.create');
    Route::post('/home/store', [HomePageController::class, 'store'])->name('home.store');
    Route::get('/home/edit/{id}', [HomePageController::class, 'edit'])->name('home.edit');
    Route::put('/home/update/{id}', [HomePageController::class, 'update'])->name('home.update');
    //Skills
    Route::resource('skill', SkillController::class);
    //Interests
    Route::resource('interest', InterestController::class);
    //testimonial
    Route::resource('testimonial', TestimonialController::class);
    //summary
    Route::get('/summary', [SummaryController::class, 'create'])->name('summary.create');
    Route::post('/summary/store', [SummaryController::class, 'store'])->name('summary.store');
    Route::get('/summary/edit/{id}', [SummaryController::class, 'edit'])->name('summary.edit');
    Route::put('/summary/update/{id}', [SummaryController::class, 'update'])->name('summary.update');
    //education
    Route::resource('education', EducationController::class);
    //experiences
    Route::resource('experience', ExperienceController::class);
    //trainings
    Route::resource('training', TrainingController::class);
    //services
    Route::resource('service', ServiceController::class);
    //social accounts
    Route::resource('socialaccount', SocialAccountController::class);
    //portfolio
    Route::resource('portfolio', PortfolioController::class);
    //change password
    Route::get('/password', [DashboardController::class, 'changepassword'])->name('password.index');
    Route::put('/change-Password', [DashboardController::class, 'password_update'])->name('password.update');
});
