<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\Frontend\TrackingController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Frontend\d2dController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */


Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('cv-templates', [CVController::class, 'index'])->name('cv.all');

Route::get('cv/template/{id}', [CVController::class, 'techweb_template'])->name('cv.template');


Route::get('/application/sanad/{id}', [HomeController::class, 'sanadViewer'])->name("sanadViewer");




Route::get('notice/details/{id}', [HomeController::class, 'noticedetails']);
Route::get('info/details/{id}', [HomeController::class, 'infodetails']);
Route::get('notice/all', [HomeController::class, 'noticeall']);
Route::get('page/{slug}', [HomeController::class, 'pageshow']);
Route::get('info/all', [HomeController::class, 'infoall']);
Route::get('/donate', [HomeController::class, 'donatenow']);
Route::get('/all/event', [HomeController::class, 'allevent']);
Route::get('/gallery', [HomeController::class, 'allgallery']);
Route::get('/gallery/{id}', [HomeController::class, 'gallerydetails']);
Route::get('/event/details/{id}', [HomeController::class, 'eventdetails']);
Route::get('/project/details/{id}', [HomeController::class, 'projectdetails']);
Route::get('/president/details/{id}', [HomeController::class, 'presidentdetails']);

Route::get('/registered-user/apply', [UserInfoController::class, 'registerd_user_apply_application'])->name('registered.user.apply');


Route::get('/user-info', [UserInfoController::class, 'user_info'])->name('user.info');
Route::get('/user-info/edit/{id}', [UserInfoController::class, 'user_info_edit'])->name('user.info.edit');

Route::get('/shonods', [HomeController::class, 'blogindex'])->name('blogs');
Route::get('/all/brand', [HomeController::class, 'allbrand']);
Route::get('/all/activities', [HomeController::class, 'allactivities']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/clubs', [ClubController::class, 'clubindex']);

Route::get('/apply-training/{id}', [HomeController::class, 'training'])->name('apply.training');

Route::post('/contact/submit', [HomeController::class, 'contactsubmit']);
Route::post('/event/submit', [HomeController::class, 'eventsubmit']);
Route::post('/volunteer/submit', [HomeController::class, 'volunteersubmit']);

Route::post('apply-computer-training', [CompetitionController::class, 'tech_web_training_application_store'])->name('training.application.store');

Route::post('/user-info/store', [UserInfoController::class, 'tech_web_info_store'])->name('user-info.store');

Route::get('/district-get/ajax/{id}', [UserInfoController::class, 'district'])->name('user-info.district');
Route::get('/upzilla-get/ajax/{id}', [UserInfoController::class, 'upzilla'])->name('user-info.upzilla');
Route::get('/union-get/ajax/{id}', [UserInfoController::class, 'union'])->name('user-info.union');


Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
Route::post('/wallet/store', [WalletController::class, 'wallet_store'])->name('wallet.store');
Route::get('/wallet/success', [WalletController::class, 'wallet_success'])->name('wallet.success');
Route::get('/wallet/cancel', [WalletController::class, 'wallet_cancel'])->name('wallet.cancel');

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

Route::get('about', [AboutController::class, 'index'])
    ->name('pages.about')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('_About'), route('frontend.pages.about'));
    });


// Route::get('contact', [ContactController::class, 'index'])
//     ->name('pages.contact')
//     ->breadcrumbs(function (Trail $trail) {
//         $trail->parent('frontend.index')
//             ->push(__('_contact'), route('frontend.pages.contact'));
//     });
// Route::post('contact', [ContactController::class, 'store']);



Route::get('tracking', [TrackingController::class, 'Tracking'])
    ->name('pages.tracking')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('_track'), route('frontend.pages.tracking'));
    });
Route::get('track', [TrackingController::class, 'Track'])
    ->name('pages.shippingInformationModal')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('_track'), route('frontend.pages.shippingInformationModal'));
    });

Route::get('d2d', [d2dController::class, 'd2d'])
    ->name('pages.d2d')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('_d2d'), route('frontend.pages.d2d'));
    });
Route::get('/info/{shipped_from}', [HomeController::class, 'index']);
