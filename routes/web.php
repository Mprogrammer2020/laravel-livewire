<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\PaymentGateWayController;
use App\Http\Controllers\PostController as PostCon;
use App\Http\Controllers\User\AffiliatedCenterController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\EducationController;
use App\Http\Controllers\User\PlantJourneyController;
use App\Http\Controllers\User\PlantSaleController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\SupportController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\Welcome\BuildStrainController;
use App\Http\Controllers\Welcome\IndexController;
use App\Http\Controllers\Welcome\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\DesiredEffects\DesiredEffectsCreateEdit;
use App\Http\Livewire\Admin\DesiredEffects\DesiredEffectsList;
use App\Http\Livewire\Admin\Education\EducationCourseCreateEdit;
use App\Http\Livewire\Admin\Education\EducationCourseList;
use App\Http\Livewire\Admin\Education\EducationVideoCreateEdit;
use App\Http\Livewire\Admin\Education\EducationVideoList;
use App\Http\Livewire\Admin\MetaData\MetaDataCreateEdit;
use App\Http\Livewire\Admin\MetaData\MetaDataList;
use App\Http\Livewire\Admin\OrderDetail;
use App\Http\Livewire\Admin\Plants\PlantCreateEdit;
use App\Http\Livewire\Admin\Plants\PlantList;
use App\Http\Livewire\Admin\Profile;
use App\Http\Livewire\Admin\StrainBase\StrainBaseCreateEdit;
use App\Http\Livewire\Admin\StrainBase\StrainBaseList;
use App\Http\Livewire\Admin\StrainOptions\StrainOptionsCreateEdit;
use App\Http\Livewire\Admin\StrainOptions\StrainOptionsList;
use App\Http\Livewire\Admin\SupportTicket\SupportTicketList;
use App\Http\Livewire\Admin\Users\UserCreateEdit;
use App\Http\Livewire\Admin\Users\UserList;
use App\Http\Livewire\Admin\AffiliateCommission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'getIndex'])->name('welcome.index');
Route::get('/apply', [IndexController::class, 'getApply'])->name('welcome.apply');
Route::get('/webinar', [IndexController::class, 'getwebinar'])->name('welcome.webinar');
Route::view('legal/privacy', 'welcome.privacy-policy')->name('welcome.privacy-policy');
Route::view('legal/terms-and-conditions', 'welcome.terms-of-use')->name('welcome.terms-of-use');
Route::get('build-strain', [BuildStrainController::class, 'getBuildStrain'])->name('strain.build');
Route::get('build-strain/strain-bases-effects', [BuildStrainController::class, 'getStrainBasesAndEffects'])->name('strain.bases.effects');
Route::post('build-strain/strain-options-by-effects', [BuildStrainController::class, 'getStrainOptionsByEffects'])->name('strain.options');
Route::post('build-strain/save-lead', [BuildStrainController::class, 'saveLead'])->name('lead.save');

// Route::get('mail', function () {
//     //$message = (new \App\Notifications\StudentRegistration(App\User::find(2)))->toMail('abhik214@gmail.com');
//     $markdown = new \Illuminate\Mail\Markdown(view(), config('mail.markdown'));
//     return $markdown->render('mail.credit-card-payment.received');  //, ['user' => App\User::find(14)]
// });

Route::get('/admin', function () {
    return view('auth.login');
// return redirect('admin/login');
})->name('admin.signin');

Route::get('/user', function () {
    return redirect()->route('user.login');
})->middleware('guest');

Route::prefix('user')->group(function () {
    Route::get('login', [LoginController::class, 'loginPage'])->name('user.login');

    Route::post('login', [LoginController::class, 'login'])->name('user.login.post');
    Route::post('login', [LoginController::class, 'login'])->name('user.login.post');

    Route::get('register/{trackingId?}', [LoginController::class, 'getRegister'])->name('user.register');
    Route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('user.forgot.password');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::get('/user/verify/email/{token}', [\App\Http\Controllers\VerificationController::class, 'verifyEmail'])->name('user.email.verify');

    Route::post('/user/send/verification-email', [\App\Http\Controllers\VerificationController::class, 'sendVerificationEmail'])->name('user.send.verificationEmail');

    Route::post('register', [LoginController::class, 'register'])->name('user.register.post');
    Route::get('crypto-payment-received', [PlantSaleController::class, 'cryptoPaymentReceived'])->name('user.cryptoPayment.received');

    Route::middleware(['role:USER'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
        Route::get('plant-sale/{plant_id?}', [PlantSaleController::class, 'index'])->name('user.plant.sale');
        Route::get('plant-buy/{id}', [PlantSaleController::class, 'planBuy'])->name('user.plant.buy');
        Route::post('create-order', [PlantSaleController::class, 'createOrder'])->name('user.create.order');
        Route::get('plant-purchase/{order_id}', [PlantSaleController::class, 'planPurchase'])->name('user.plant.purchase');
        Route::post('create-wallet', [PlantSaleController::class, 'createWallet'])->name('create.wallet');
        Route::get('order-detail', [PlantSaleController::class, 'orderDetail'])->name('order.detail');
        Route::post('get-balance', [PlantSaleController::class, 'getBalance'])->name('get.balance');

        Route::post('set-session-plant-want-to-buy', [PlantSaleController::class, 'setSessionPlantWantToBuy'])->name('user.plant.set.session');
        Route::get('affiliated-center', [AffiliatedCenterController::class, 'index'])->name('user.affiliated.center');
        Route::get('plant-journey', [PlantJourneyController::class, 'index'])->name('user.plant.journey');
        Route::get('settings', [SettingsController::class, 'index'])->name('user.settings');
        Route::get('education/courses', [EducationController::class, 'index'])->name('user.education');
        Route::get('education/course-video/{course?}', [EducationController::class, 'courseVideo'])->name('user.education.course-video');
        Route::get('support', [SupportController::class, 'index'])->name('user.support');
        Route::post('settings', [SettingsController::class, 'store'])->name('user.settings.save');
        Route::get('all-posts', [PostController::class, 'index'])->name('user.post.list');
        Route::post('postsave', [PostController::class, 'postsave'])->name('user.post.save');
        Route::get('tickets', [TicketController::class, 'index'])->name('user.support.ticket.list');
        Route::post('ticket-save', [TicketController::class, 'postsave'])->name('user.support.ticket.save');
        Route::post('post-delete/{post}', [PostController::class, 'postDelete'])->name('user.post.delete');
        Route::post('/commentsave', [CommentController::class, 'commentsave'])->name('comment.save');
        Route::get('/commentlist/{post}', [CommentController::class, 'commentlist'])->name('comment.list.by.post');
        Route::post('comment-delete/{comment}', [CommentController::class, 'commentDelete'])->name('user.comment.delete');
        Route::get('courses', [EducationController::class, 'allCourses'])->name('user.education.course.list');
        Route::get('videos-by-course/{course}', [EducationController::class, 'getVideosByCourse'])->name('user.education.video.api');
        Route::post('mark-active', [EducationController::class, 'markActiveVideo'])->name('user.education.video.markactive');
        Route::post('mark-complete', [EducationController::class, 'markCompleteVideo'])->name('user.education.video.markcomplete');
        Route::post('credit-card-payment-received', [PlantSaleController::class, 'creditCardPaymentReceived'])->name('user.credit.card.payment.received');
        Route::get('signout', [LoginController::class, 'signout'])->name('user.signout');

        Route::group(['prefix' => 'ajax'], function () {
            Route::post('/validate-hash', [AjaxController::class, 'validateTransactionHash'])->name('user.ajax.validateHash');
        });
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:SUPER-ADMIN']], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('strain-base/list', StrainBaseList::class)->name('strain.base.list');
    Route::get('strain-base/create-edit/{strain_base_id?}', StrainBaseCreateEdit::class)->name('strain.base.create.edit');
    Route::get('desire-effects/list', DesiredEffectsList::class)->name('desired.effects.list');
    Route::get('desire-effects/create-edit/{desired_effect_id?}', DesiredEffectsCreateEdit::class)->name('desired.effects.create.edit');
    Route::get('strain-options/list', StrainOptionsList::class)->name('strain.options.list');
    Route::get('strain-options/create-edit/{strain_option_id?}', StrainOptionsCreateEdit::class)->name('strain-options.create.edit');
    Route::get('plants/list', PlantList::class)->name('plant.list');
    Route::get('order/list', OrderDetail::class)->name('order.list');
    
    Route::post('/order/transfer-admin-wallet',[OrderDetail::class,'transferToMasterWallet'])->name('admin.order.transferAdminWallet');

    Route::get('plants/create-edit/{plant_id?}', PlantCreateEdit::class)->name('plant.create.edit');
    Route::get('users/list/{role}', UserList::class)->name('user.list');
    Route::get('users/create-edit/{user_id?}', UserCreateEdit::class)->name('user.create.edit');
    Route::get('admin/profile', Profile::class)->name('admin.profile');
    Route::get('cms/userdashboard', [CmsController::class, 'userDashboard'])->name('cms.userdashboard');
    Route::get('cms/homepage', [CmsController::class, 'homePage'])->name('cms.homepage');
    Route::post('cms/updateuserdashboard', [CmsController::class, 'updateUserDashboard'])->name('cms.updateuserdashboard');
    Route::post('cms/update-user-cms-dashboard', [CmsController::class, 'updateUserCMSDashboard'])->name('cms.updateCmsUserdashboard');
    Route::get('cms/affiliated-center', [CmsController::class, 'affiliated_center'])->name('cms.affiliated.center');
    Route::post('cms/affiliated-center-update/{id}', [CmsController::class, 'affiliated_center_update'])->name('cms.affiliated.center.update');
    Route::get('meta-data/list', MetaDataList::class)->name('meta.data.list');
    Route::get('meta-data/create-edit/{page_id?}', MetaDataCreateEdit::class)->name('meta.data.create.edit');
    Route::resource('posts', PostCon::class);
    Route::get('posts/view/{id}', [PostCon::class, 'post_view'])->name('posts.view');
    Route::get('support-ticket/list', SupportTicketList::class)->name('support.ticket.list');
    Route::get('education-course/list', EducationCourseList::class)->name('education.course.list');
    Route::get('education-course/create-edit/{education_course_id?}', EducationCourseCreateEdit::class)->name('education.course.create.edit');
    Route::get('education-video/list', EducationVideoList::class)->name('education.video.list');
    Route::get('education-video/create-edit/{education_video_id?}', EducationVideoCreateEdit::class)->name('education.video.create.edit');
    Route::get('signout', [AuthController::class, 'signout'])->name('admin.logout');

    Route::get('/affiliate-commissions', AffiliateCommission::class)->name('admin.affiliateCommission');
    
    Route::post('comment-delete/{comment}', [CommentController::class, 'commentDelete'])->name('admin.comment.delete');
    
    Route::get('/announcements', [App\Http\Controllers\Admin\AnnouncementController::class,'index'])->name('admin.announcements');
    Route::post('/announcement/store', [App\Http\Controllers\Admin\AnnouncementController::class,'store'])->name('admin.announcement.store');
});

Route::get('payment', [PaymentGateWayController::class, 'index'])->name('crypto.payment');

Route::any('successs', function (Request $request) {
    dd($request->all());
})->name('success.payment');

Route::any('cancel', function (Request $request) {
    dd($request->all());
})->name('cancel.payment');
