<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\BkashPaymentController;

Route::get('/generate-qrcode', [QRCodeController::class, 'generateQRCode']);


// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__ . '/backend/');
});


Route::get('about', [AboutController::class, 'tech_web_about_index'])->name('about.index');

Route::get('about/committee', [AboutController::class, 'tech_web_about_committee_index'])->name('about.committee.index');
Route::get('about/president', [AboutController::class, 'tech_web_about_president_index'])->name('about.president.index');
Route::get('about/secretariat', [AboutController::class, 'tech_web_about_secretariat_index'])->name('about.secretariat.index');

Route::get('about/committees/{id}', [AboutController::class, 'tech_web_about_executive_board_index'])->name('about.executive_board.index');
// Route::get('about/honorable-members', [AboutController::class, 'tech_web_about_honorable_members_index'])->name('about.honorable_members.index');
// Route::get('about/ambassador', [AboutController::class, 'tech_web_about_ambassador_index'])->name('about.ambassador.index');


Route::get('history', [HistoryController::class, 'tech_web_history_index'])->name('history.index');
Route::get('traditional-wushu', [HistoryController::class, 'tech_web_traditional_history_index'])->name('traditional.history.index');
Route::get('taolu-wushu', [HistoryController::class, 'tech_web_taolu_history_index'])->name('taolu.history.index');
Route::get('sanda-wushu', [HistoryController::class, 'tech_web_sanda_history_index'])->name('sanda.history.index');


Route::get('competition', [CompetitionController::class, 'tech_web_competition_index'])->name('competition.index');
Route::get('competition/details/{id}', [CompetitionController::class, 'tech_web_competition_details'])->name('competition.details');
Route::get('competition/type/{id}', [CompetitionController::class, 'tech_web_competition_by_type'])->name('competition.type.index');

Route::get('course-type/details/{id}', [CompetitionController::class, 'tech_web_course_type_details'])->name('course_type.details');
// Route::get('competition/type', [CompetitionController::class, 'tech_web_competition_by_search'])->name('competition.type.search');

Route::get('result', [CompetitionController::class, 'tech_web_result_by_year'])->name('result.year.index');



Route::get('team/{type}', [TeamController::class, 'tech_web_team_player'])->name('team.player');
Route::get('/membership/{type}', [ClubController::class, 'clubindex'])->name('membership.player');


Route::get('qrcode', function () {
    return view('qr_code');
});

Route::get('balance-topup', [TeamController::class, 'topUp'])->name('balance-topup');

Route::group(['middleware' => ['web']], function () {
    // Payment Routes for bKash
    Route::get('/bkash/payment', [App\Http\Controllers\BkashTokenizePaymentController::class, 'index']);
    Route::post('/bkash/create-payment', [App\Http\Controllers\BkashTokenizePaymentController::class, 'createPayment'])->name('bkash-create-payment');
    Route::get('/bkash/callback', [App\Http\Controllers\BkashTokenizePaymentController::class, 'callBack'])->name('bkash-callBack');

    //search payment
    Route::get('/bkash/search/{trxID}', [App\Http\Controllers\BkashTokenizePaymentController::class, 'searchTnx'])->name('bkash-serach');

    //refund payment routes
    Route::get('/bkash/refund', [App\Http\Controllers\BkashTokenizePaymentController::class, 'refund'])->name('bkash-refund');
    Route::get('/bkash/refund/status', [App\Http\Controllers\BkashTokenizePaymentController::class, 'refundStatus'])->name('bkash-refund-status');
});
