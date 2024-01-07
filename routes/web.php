<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for email verification code
Route::get('/verification', [App\Http\Controllers\Auth\RegisterController::class, 'verifyPage']);
Route::post('/verification', [App\Http\Controllers\Auth\RegisterController::class, 'verifyNow'])->name('verifyuser');







Route::controller(\App\Http\Controllers\Frontend\FrontendController::class)->group(function() {
    Route::get('/', 'Index')->name('front.page');

});




//Routes for Authenticated HandyMen

Route::prefix('handyman-app')->middleware(['auth'])->group(function (){

    Route::controller(\App\Http\Controllers\Handyman\DashboardController::class)->group(function (){

        Route::get('dashboard', 'index')->name('handyman.dashboard');
        Route::get('profile', 'viewProfile');

        //Route to edit job posted by handyman
        Route::get('edit-jobposting/{id}', 'FetchJobPosting');

        //Route to update jobpost for handyman
        Route::post('update-jobpost/{id}', 'updateJobPost');

        //Route to mark job post as filled
        Route::get('activate-fill/{id}', 'makeJobPostFilled');

        //Route to mark job post as Unfilled
        Route::get('deactivate-fill/{id}', 'makeJobPostUnFilled');

        Route::delete('/delete-job-post/{id}', 'destroyJobPost');

        


        
    });


    Route::controller(\App\Http\Controllers\Handyman\JobController::class)->group(function() {

        Route::get('post-job', 'postJob');

        Route::post('store-jobpost', 'storeJobPosting')->name('job.posting');

        Route::post('/api/fetch-jobtype', 'fetchJobType');



        

    });


    Route::controller(\App\Http\Controllers\Handyman\SettingsController::class)->group(function (){

        Route::get('profile', 'createPage');

    });



});





//Routes for Authenticated Customers










Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){


    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function () {

        Route::get('dashboard', 'index');
    });

    Route::controller(\App\Http\Controllers\Admin\HandyMenListController::class)->group(function(){

        Route::get('users-account', 'index');
        Route::get('edit-user/{id}', 'editProfile')->name('profile.view');
        Route::delete('delete-user/{userId}', 'deleteHandyMan');
        Route::post('/updateProfile/{profileId}', 'UpdateHandymanProfile');
        Route::get('/block-user/{id}', 'BlockUser');
        Route::get('/unblock-user/{id}', 'UnBlockUser');
        Route::get('/viewDetails/{detailsId}', 'viewFullDetails');

    });


    Route::controller(\App\Http\Controllers\Admin\JobController::class)->group(function(){

        //Routes for job categories
        Route::get('category', 'createCategory')->name('cat.create');
        Route::post('/add-category', 'storeCat');
        Route::put('/edit-cat/{id}', 'editCat');
        Route::delete('/delete-cat/{id}', 'destroyCat');

        //Routes for Job Types
        Route::get('types', 'createTypes')->name('types.create');
        Route::post('create-job', 'storeTypes');
        Route::get('edit-type/{id}', 'FetchProduct');
        Route::post('update-type/{typeId}', 'updateType');
        Route::delete('/delete-type/{id}', 'destroyType');


        //Route for Job posts
        Route::get('/job-posts', 'allJobPosts')->name('jobs.posted');

        //Routes for jobs contacted by customers
        Route::get('/job-contacted', 'allJobsContacted');
        Route::get('/fetch-description/{id}', 'fetchDetails');

        //Job Accepted, Processing and completed by handyman
        Route::get('job-apc', 'jobProcessing'); 

        //Jobs rejected by handman
        Route::get('job-rejected', 'jobRejected');

    });


    Route::controller(\App\Http\Controllers\Admin\MessageHandymanController::class)->group(function (){

        Route::get('/message-handyman', 'MessageFunction')->name('message.handyman');
        Route::post('/sendmessage', 'createMessage');
        Route::get('/messagehandyman/{handymanId}', 'sendMessage');
        Route::post('/sendSelectedMessage/{handymanId}', 'MessageSelected');

        //View all message sent to handymen
        Route::get('/handyman-messages', 'viewAllSentHandymanMessages');
        Route::get('/fetch-sent/{sentId}', 'fetchSentMessage');

        

        //Routes for contact in frontend page
        Route::get('/contact-messages', 'MessageContacted')->name('contact.message');
        Route::get('/fetch-message/{id}', 'fetchMessage');
        Route::get('/reply_contact_messsage/{replyId}', 'replyMessageContacted');
        Route::put('/replymessage/{replyId}', 'sendReply');


    });


    Route::controller(\App\Http\Controllers\Admin\RatingsController::class)->group(function (){

        Route::get('/ratings', 'handymanRatings');

    });

    Route::controller(\App\Http\Controllers\Admin\CurrencyController::class)->group(function (){

        Route::get('currency', 'Currency');
        Route::get('/activate-currency/{currencyId}', 'ChanegCurrency');
    });


    Route::controller(\App\Http\Controllers\Admin\SettingsController::class)->group(function (){
        Route::get('/site-settings', 'SiteSetting');
        Route::post('/create-settings', 'create');
        Route::get('/accout-settings', 'AccountSetting');
        Route::put('/update-admin', 'UpdateAccount');


    });


    Route::controller(\App\Http\Controllers\Admin\PaymentOptionController::class)->group(function () {
        Route::get('/payment-options', 'PaymentOptionPage');
        Route::post('/create-payment', 'StorePaymentOption');
        Route::get('/fetch-payment/{id}', 'FetchPaymentOption');
        Route::post('/update-payment/{id}', 'UpdatePaymentOption');
        //Route::get('/deactivate/{id}', 'deactivatePaymentOption');
        Route::get('/activate/{id}', 'activatePaymentOption');

    });


    //will work on these routes later on.... for now i did only logo-favicon

    Route::controller(\App\Http\Controllers\Admin\WebController::class)->group(function () {
        Route::get('/slider-setting', 'homeSlider');
        Route::post('/create-slider', 'storeSlider');
        Route::get('/logo-favicon', 'LogoFavicon');
        Route::post('/logo-favicon', 'logoFav');

        //HomePage Feature Section Set up
        Route::get('/home-features', 'HomeFeatures');
        Route::post('/store-feature', 'StoreFeature');
        Route::get('/fetch-home-feature/{id}', 'FetchFeature');
        Route::post('/update-home-feature/{id}', 'UpdateFeature');

        //HomePage Service Section Set up
        Route::get('/home-service', 'HomeService');
        Route::post('/store-service', 'StoreService');
        Route::get('/fetch-home-service/{id}', 'FetchService');
        Route::post('/update-home-service/{id}', 'UpdateService');

        //HomePage Banner Section Set up
        Route::get('/home-banner', 'HomeBanner');
        Route::post('/create-banner', 'storeBanner');


        //About Us page setting
        Route::get('/about-us', 'AboutUs');
        Route::post('/store-about', 'storeAbout');

        //Why Us page setting
        Route::get('/why-us', 'WhyUs');
        Route::post('/store-why-us', 'storeWhyUs');

        //Pricing page setting
        Route::get('/pricing', 'Plan');
        Route::post('/store-plan', 'storePlan');
        Route::get('/fetch-plan/{id}', 'FetchPricing');
        Route::post('/update-pricing/{id}', 'UpdatePricing');

        //Help/faq page setting
        Route::get('/help-faq', 'faq');
        Route::post('/create-faq', 'storeFaq');
        Route::get('/fetch-faq/{id}', 'FetchFaq');
        Route::post('/update-faq/{id}', 'UpdateFaq');
        Route::delete('/delete-faq/{id}', 'DestroyFaq');


        //Terms and services page setting
        Route::get('/terms_services', 'TermsServices');
        Route::post('/store-terms', 'StoreServices');

        //Terms and services page setting
        Route::get('/privacy', 'PrivacyPolicy');
        Route::post('/store-privacy', 'StorePrivacy');

         //Refund Policy page setting
         Route::get('/refund_policy', 'RefundPolicy');
         Route::post('/store-refund', 'StoreRefund');


        //License page setting
        Route::get('/license', 'License');
        Route::post('/store-license', 'StoreLicense');
        Route::get('/fetch-license/{id}', 'FetchLicense');
        Route::post('/update-license/{id}', 'UpdateLicense');

        //Social media setting
        Route::get('/social-media', 'SocialMedia');
        Route::get('/fetch-social/{id}', 'Fetchsocial');
        Route::post('/update-social/{id}', 'Updatesocial');

        //Scam page setting
        Route::get('/scams', 'ScamsPage');
        Route::post('/store-scam', 'StoreScams');

    });


});





