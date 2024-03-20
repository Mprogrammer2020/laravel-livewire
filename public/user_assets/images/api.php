<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Auth;
use App\Http\Middleware\LogoutWhenSuspended;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


   Route::any('login', [UserController::class, 'login']);
   Route::post('signup', [UserController::class, 'signup']);
   Route::post('forgot-password', [UserController::class, 'forgotpassword']);

   Route::group(['middleware' => ['auth:api', LogoutWhenSuspended::class]], function(){
        Route::get('logout', [UserController::class, 'logout']);
        Route::get('my_profile', [UserController::class, 'my_profile']);
        Route::post('contact_us',[UserController::class, 'contact_us']);
        Route::post('create_profile', [UserController::class, 'createprofile']);
        Route::post('update_profile', [UserController::class, 'updateprofile']);
        Route::post('forgot_password', [UserController::class, 'forgotpassword']);

        Route::get('all-categories',[UserController::class, 'allCategories']);
        Route::post('add-category',[UserController::class, 'addCategory']);
        Route::post('add-new-review',[UserController::class, 'addNewReview']);
        Route::get('get-review-watermark',[UserController::class,'getReview']);
        Route::post('create-review', [UserController::class, 'createReview']);
        Route::post('add-review-status',[UserController::class, 'addReviewStatus']);
        Route::post('add-review-comment',[UserController::class, 'addReviewComment']);
        Route::get('review-comments', [UserController::class, 'reviewComments']);
        Route::any('all-reviews',[UserController::class,'allReviews']);
        Route::get('view-review',[UserController::class,'viewReview']);
        Route::get('search-hashtags',[UserController::class,'searchHashtags']);
        Route::delete('delete-review',[UserController::class, 'deleteReview']);
        Route::Post('markas-inappropriate',[UserController::class, 'markAsInAppropriate']);
        Route::post('add-review-rating',[UserController::class, 'addReviewRating']);
        Route::post('social_create_profile', [UserController::class, 'socialCreateProfile']);
        //sprint 3
        Route::get('top-categories',[UserController::class, 'topCategories']);
        Route::get('category-reviews', [UserController::class, 'categoryReviews']);
        Route::post('add-event', [UserController::class, 'addEvent']);
        Route::get('all-events', [UserController::class, 'allEvents']);
        Route::get('view-event', [UserController::class, 'viewEvent']);
        Route::post('acknowledge-invite', [UserController::class, 'acknowledgeInvite']);
        Route::post('upload-video', [UserController::class, 'uploadVideo']);
        Route::post('send-message', [UserController::class, 'sendMessage']);
        Route::post('follow-user', [UserController::class, 'followUser']);
        Route::get('followers', [UserController::class, 'followers']);
        Route::post('user-report', [UserController::class, 'userReport']);
        Route::post('block-user', [UserController::class, 'blockUser']);
        Route::post('setting', [UserController::class, 'setting']);
        // Route::post('invite-users', [UserController::class, 'inviteUsers']);
        Route::post('change-password', [UserController::class, 'changePassword']);
        Route::post('all-category-reviews', [UserController::class, 'allCategoryReviews']);
        Route::get('followering', [UserController::class, 'followering']);
        Route::delete('delete-event', [UserController::class, 'deleteEvent']);
        Route::post('edit-event', [UserController::class, 'editEvent']);
        Route::post('edit-review', [UserController::class, 'editReview']);
        Route::get('blocked-users', [UserController::class, 'blockedUser']);
        Route::post('send', [UserController::class, 'send']);
        Route::post('add-video-view-count', [UserController::class, 'addvideoViewCount']);
        Route::get('get-video-view/{video_id}', [UserController::class, 'getvideocount']);
        Route::get('tag-users', [UserController::class, 'tagUsers']);
        Route::get('notification-listing', [UserController::class, 'notificationListing']);
        Route::post('search', [UserController::class, 'search']);
   });
