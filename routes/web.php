<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\RecyclingParticipantController;
use App\Http\Controllers\User\ProfileController as UserProfileController;



Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login-confirm');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgot.password');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgot-password-post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset-password-post');


Route::get('register', [RegistrationController::class, 'registrationForm'])->name('registration');
Route::post('register', [RegistrationController::class, 'customRegistration'])->name('custom-registration');
Route::get('verificationEmailUseToken/{token}', [RegistrationController::class, 'verifyEmail'])->name('vefity-email');

//Frontend All Routes
Route::get('/', function () {
    return view('frontend.content');
});

Route::get('how',[FrontendController::class,'how'])->name("how");
Route::get('categories',[FrontendController::class,'category'])->name("category");
Route::get('recycle/event/{slug}',[FrontendController::class,'recycleEvent'])->name("recycle-event");
Route::get('/events/{id}', [FrontendController::class, 'show'])->name('events.show');
Route::delete('/events/{id}', [FrontendController::class, 'destroy'])->name('events.destroy');

Route::get('about',[FrontendController::class,'about'])->name("about");
Route::get('scroreboard',[FrontendController::class,'scroreboard'])->name("scoreboard");
Route::get('map',[FrontendController::class,'recyclingCenter'])->name("recyclingcenter");

// Route::get('/', function () {
//     return redirect('user');
// })->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    //User Routes
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'dashboard'])->name('user');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user-dashboard');
        Route::get('/profile/view', [UserProfileController::class, 'viewProfile'])->name('user-profile-view');
        Route::get('/profile/edit', [UserProfileController::class, 'editProfile'])->name('user-profile-edit');
        Route::post('/profile/store', [UserProfileController::class, 'updateProfile'])->name('user-profile-update');
        Route::get('/change-password', [UserProfileController::class, 'changePasswordForm'])->name('user-password-form');
        Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('user.password.update');
        Route::resource('categories', CategoryController::class);
        Route::resource('recycling-participants', RecyclingParticipantController::class);
    });
});
