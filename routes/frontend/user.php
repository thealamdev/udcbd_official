<?php

use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UnionInfoController;
use Tabuna\Breadcrumbs\Trail;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */

Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('is_user')
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Dashboard'), route('frontend.user.dashboard'));
        });

    Route::get('account', [AccountController::class, 'index'])
        ->name('account')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('My Account'), route('frontend.user.account'));
        });

    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('all-sanad', [DashboardController::class, 'tech_web_all_sanad'])->name('all.sanad');
    Route::get('/sanad/details/{sanad}', [DashboardController::class, 'tech_web_shonod_details'])->name('sanad.details');

    Route::get('sanad-application', [DashboardController::class, 'tech_web_sanad_application'])->name('sanad.application');
    Route::get('course-application', [DashboardController::class, 'tech_web_course_application'])->name('course.application');
    Route::get('cv/information', [CVController::class, 'techweb_cv_information'])->name('cv.information');
    Route::post('cv/information/store', [CVController::class, 'techweb_cv_information_store'])->name('cv.information.store');
    Route::post('cv/information/update', [CVController::class, 'techweb_cv_information_update'])->name('cv.information.update');

    Route::get('cv/profile', [CVController::class, 'techweb_cv_profile'])->name('cv.profile');
    Route::get('cv/profile/edit/{id}', [CVController::class, 'techweb_cv_profile_edit'])->name('cv.profile.edit');

    Route::get('cv/profile/delete-edu/{id}', [CVController::class, 'techweb_cv_profile_edu_delete'])->name('cv.profile.edu.delete');
    Route::get('cv/profile/delete-job/{id}', [CVController::class, 'techweb_cv_profile_job_delete'])->name('cv.profile.job.delete');
    Route::get('cv/profile/delete-project/{id}', [CVController::class, 'techweb_cv_profile_project_delete'])->name('cv.profile.project.delete');
    Route::get('cv/profile/delete-ref/{id}', [CVController::class, 'techweb_cv_profile_ref_delete'])->name('cv.profile.ref.delete');


    Route::get('sanad-certificate/{id}', [DashboardController::class, 'tech_web_sanad_certificate'])->name('sanad.certificate');

    Route::post('application-for-sanad', [ApplicationController::class, 'application_for_sanad'])->name('application.sanad');

    Route::post('application-certificate-info', [ApplicationController::class, 'application_certificate_info'])->name('application.certificate.info');


    Route::get('union/info', [UnionInfoController::class, 'techweb_union_index'])->name('union.info');
    Route::post('union/info/store', [UnionInfoController::class, 'techweb_union_store'])->name('union.info.store');

    /**
     * routes for agents activities
     */
    Route::prefix('agents')->name('agent.')->group(function () {
        Route::controller(AgentController::class)->group(function () {
            Route::get('register-link-generate', 'linkGenerate')->name('linkGenerate');
            Route::get('client', 'agnetClient')->name('agnetClient');
            Route::post('money-withdraw', 'withdraw')->name('withdraw');

        });
    });
});
