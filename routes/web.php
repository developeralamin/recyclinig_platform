<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\WebSiteController;
use App\Http\Controllers\User\StripePaymentController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\User\ArticlePublisherController;
use App\Http\Controllers\Website\PrivacyPolicyController;
use App\Http\Controllers\Website\TermsConditionController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\WebsiteController as AdminWebsiteController;
use App\Http\Controllers\Website\PackageController as WebsitePackageController;



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
    return redirect('user');
})->name('home');
// Route::get('/', [HomePageController::class, 'homePage'])->name('home');
// Route::get('/about', [AboutController::class, 'about'])->name('about');
// Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
// Route::get('/privacy-and-policy', [PrivacyPolicyController::class, 'privacyPolicy'])->name('privacy-policy');
// Route::get('/terms-and-conditions', [TermsConditionController::class, 'termsCondition'])->name('terms-condition');
// Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact-store');
// Route::get('/pricing', [WebsitePackageController::class, 'pricing'])->name('pricing');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    //Admin Routes
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users-list');
        Route::get('/users/{id}', [AdminController::class, 'userDetails'])->name('users-details');
        Route::get('/users/credtis/{id}', [AdminController::class, 'UserCredtis'])->name('users-credits');
        Route::post('/users/credtis/{id}', [AdminController::class, 'addUserCredtis'])->name('add-users-credits');
        Route::post('/update/users/{id}', [AdminController::class, 'updateUser'])->name('update-users');
        Route::get('/update/users/status/{id}', [AdminController::class, 'updateUserStatus'])->name('update-users-status');
        Route::get('/delete/users/{id}', [AdminController::class, 'deleteUser'])->name('delete-users');
        Route::get('/contact', [AdminController::class, 'allContact'])->name('all-contact');

        Route::get('/change-password', [AdminProfileController::class, 'changePasswordForm'])->name('changed-password-form');
        Route::post('/change-password', [AdminProfileController::class, 'changePassword'])->name('password.update');

        Route::resource('/page', PageController::class);
        Route::resource('/package', AdminPackageController::class)->except('show');
        Route::resource('/site-info', SiteInfoController::class)->except(['create', 'store', 'show', 'destroy']);
        Route::get('/payment', [PaymentController::class, 'index'])->name('payment');

        Route::get('/website', [AdminWebsiteController::class, 'website'])->name('website');
        Route::delete('/website/{id}', [AdminWebsiteController::class, 'deleteWebsite'])->name('website-delete');
    });

    //User Routes
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'dashboard'])->name('user');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user-dashboard');

        Route::get('/profile/view', [UserProfileController::class, 'viewProfile'])->name('user-profile-view');
        Route::get('/profile/edit', [UserProfileController::class, 'editProfile'])->name('user-profile-edit');
        Route::post('/profile/store', [UserProfileController::class, 'updateProfile'])->name('user-profile-update');
        Route::get('/change-password', [UserProfileController::class, 'changePasswordForm'])->name('user-password-form');
        Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('user.password.update');

        Route::resource('/article', ArticleController::class)->except(['edit', 'update']);
        Route::get('/article/publish/{id}', [ArticlePublisherController::class, 'publish'])->name('publish-article');

        Route::resource('/website', WebSiteController::class);

        Route::get('/recharge', [StripePaymentController::class, 'packageList'])->name('package-list');
        Route::get('/payment/{package_id}', [StripePaymentController::class, 'paymentForm'])->name('payment-form');
        Route::post('/payment/{package_id}', [StripePaymentController::class, 'createCharge'])->name('stripe-create-charge');
        Route::get('/payments', [StripePaymentController::class, 'paymentList'])->name('stripe-payment-list');
    });
});
