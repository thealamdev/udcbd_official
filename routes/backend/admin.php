<?php

use App\Domains\Contacts\Http\Controllers\ContactController;
use App\Domains\Page\Http\Controllers\PageController;
use App\Domains\Products\Http\Controllers\BrandController;
use App\Domains\Products\Http\Controllers\ProductController;
use App\Domains\Products\Http\Controllers\ShippingController;
use App\Domains\Products\Http\Controllers\StatusController;
use App\Domains\Products\Http\Controllers\WarehouseController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgentSettingController;
// use App\Http\Controllers\PresidentController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\TransactionController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Backend\Content\SettingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\UserInfoController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('super-admin/dashboard', [DashboardController::class, 'SuperAdminindex'])->name('super.dashboard');
Route::get('search', [DashboardController::class, 'search'])->name('order.search');

Route::get('cv-setting', [CVController::class, 'techweb_cv_template'])->name('cv.template');
Route::post('cv-setting/store', [CVController::class, 'techweb_cv_template_store'])->name('cv.template.store');

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::resources([
        'brand' => BrandController::class,
        'warehouse' => WarehouseController::class,
        'inhouse' => ProductController::class,
        'status' => StatusController::class,
        // 'updatestatus' => UpdateStatusController::class,
        'shipping' => ShippingController::class,
        'product' => ProductController::class,
    ]);
});

Route::resource('page', PageController::class);

Route::group(['prefix' => 'messaging', 'as' => 'messaging.'], function () {
    Route::resources([
        'contact' => ContactController::class,
    ]);
});

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('price', [SettingController::class, 'price'])->name('price');
    Route::get('notice', [SettingController::class, 'notice'])->name('notice');
    Route::post('notice/store', [SettingController::class, 'noticestore'])->name('notice.store');
    Route::post('noticecolor/store', [SettingController::class, 'noticecolorstore'])->name('noticecolor.store');
    Route::post('notice/update', [SettingController::class, 'noticeupdate'])->name('notice.update');
    Route::get('notice/edit/{id}', [SettingController::class, 'noticeedit']);

    Route::get('service', [SettingController::class, 'service'])->name('service');
    Route::post('service/store', [SettingController::class, 'servicestore'])->name('service.store');
    Route::post('service/update', [SettingController::class, 'serviceupdate'])->name('service.update');
    Route::get('service/edit/{id}', [SettingController::class, 'serviceedit']);

    Route::get('project', [SettingController::class, 'project'])->name('project');
    Route::post('project/store', [SettingController::class, 'projectstore'])->name('project.store');
    Route::post('project/update', [SettingController::class, 'projectupdate'])->name('project.update');
    Route::get('project/edit/{id}', [SettingController::class, 'projectedit']);

    Route::get('blog', [SettingController::class, 'blog'])->name('blog');
    Route::post('blog/store', [SettingController::class, 'blogstore'])->name('blog.store');
    Route::post('blog/update', [SettingController::class, 'blogupdate'])->name('blog.update');
    Route::get('blog/edit/{id}', [SettingController::class, 'blogedit']);

    Route::get('slider', [SettingController::class, 'slider'])->name('slider');
    Route::post('slider/store', [SettingController::class, 'sliderstore'])->name('slider.store');
    Route::post('slider/update', [SettingController::class, 'sliderupdate'])->name('slider.update');
    Route::get('slider/edit/{id}', [SettingController::class, 'slideredit']);

    Route::get('activity', [SettingController::class, 'activity'])->name('activity');
    Route::post('activity/store', [SettingController::class, 'activitystore'])->name('activity.store');
    Route::post('activity/update', [SettingController::class, 'activityupdate'])->name('activity.update');
    Route::get('activity/edit/{id}', [SettingController::class, 'activityedit']);

    Route::get('info', [SettingController::class, 'info'])->name('info');
    Route::post('info/store', [SettingController::class, 'infostore'])->name('info.store');
    Route::post('info/update', [SettingController::class, 'infoupdate'])->name('info.update');
    Route::get('info/edit/{id}', [SettingController::class, 'infoedit']);

    /**
     * Certificate Price part:
     */
    Route::get('certificate', [SettingController::class, 'CertificatePrice'])->name('certificatePrice');
    Route::post('certificate', [SettingController::class, 'CertificatePriceStore'])->name('certificatePriceStore');

    Route::get('recharge-balance/{id}', [RechargeController::class, 'RechargeBalance'])->name('rechargeBalance');
    Route::post('recharge-balance', [RechargeController::class, 'RechargeBalanceStore'])->name('rechargeBalanceStore');

    Route::post('airShippingStore', [SettingController::class, 'airShippingStore'])->name('airShippingStore');
    Route::post('logo-store', [SettingController::class, 'logoStore'])->name('logoStore');
    Route::post('social-store', [SettingController::class, 'socialStore'])->name('socialStore');
    Route::get('general', [SettingController::class, 'general'])->name('general');
    Route::get('cache-control', [SettingController::class, 'cacheControl'])->name('cache.control');
    Route::post('cache-control-store', [SettingController::class, 'cacheClear'])->name('cache.control.store');
    Route::post('short-message', [SettingController::class, 'shortMessageStore'])->name('short.message.store');
    Route::post('banner-message', [SettingController::class, 'bannerstore'])->name('banner.store');
    Route::post('bottombanner-message', [SettingController::class, 'bottombanner'])->name('bottombanner.store');
    Route::post('about-message', [SettingController::class, 'aboutstore'])->name('about.store');
    Route::post('highlight', [SettingController::class, 'highlightstore'])->name('highlight.store');
    Route::post('work-message', [SettingController::class, 'workstore'])->name('work.store');
    Route::post('api_store', [SettingController::class, 'apiStore'])->name('api.store');
    Route::get('top-notice', [SettingController::class, 'topNoticeCreate'])->name('topNotice.create');
    Route::post('top-notice', [SettingController::class, 'topNoticeStore'])->name('topNotice.store');
    Route::post('homebg', [SettingController::class, 'homebg'])->name('homebg.store');
    Route::post('volunteerSetting', [SettingController::class, 'volunteerSetting'])->name('volunteerSetting.store');
});

Route::get('club', [ClubController::class, 'club'])->name('club');
Route::post('club/store', [ClubController::class, 'clubstore'])->name('club.store');
Route::post('club/update', [ClubController::class, 'clubupdate'])->name('club.update');
Route::get('club/edit/{id}', [ClubController::class, 'clubedit'])->name('club.edit');

// About
Route::get('about/settings', [AboutController::class, 'tech_web_about'])->name('about.settings');
Route::get('about/settings/{id}', [AboutController::class, 'tech_web_about_edit'])->name('about.settings.edit');
Route::post('about/update', [AboutController::class, 'tech_web_about_update'])->name('about.settings.update');
Route::resource('about', AboutController::class);
// About end

Route::get('training-applications', [CompetitionController::class, 'tech_web_view_training_applications'])->name('training.applications');
Route::get('course-applicant-details/{id}', [CompetitionController::class, 'tech_web_view_training_applicant_details'])->name('training.applicant.details');
Route::post('course-application/status', [CompetitionController::class, 'tech_web_training_application_status'])->name('training.application.status');
// Route::post('course-application/certificate', [CompetitionController::class, 'tech_web_training_application_certificate'])->name('training.application.certificate');

Route::get('applications', [UserInfoController::class, 'tech_web_applications'])->name('applications');
Route::get('application/details/{id}', [UserInfoController::class, 'tech_web_application_detail'])->name('application.detail');
Route::get('application/delete/{id}', [UserInfoController::class, 'tech_web_application_delete'])->name('application.delete');
Route::post('application/status', [UserInfoController::class, 'tech_web_application_status'])->name('application.status');
Route::post('application/sanad', [UserInfoController::class, 'tech_web_application_sanad'])->name('application.sanad');

Route::get('apply-applications', [UserInfoController::class, 'tech_web_apply_applications'])->name('apply.applications');
Route::get('/shonod/details/{id}', [UserInfoController::class, 'shonod_details'])->name('shonod.details');

// Route::get('/shonod/certificate', [UserInfoController::class, 'shonod_certificate'])->name('shonod.certificate');

Route::get('/district-get/ajax/{id}', [UserInfoController::class, 'district'])->name('userinfo.district');
Route::get('/upzilla-get/ajax/{id}', [UserInfoController::class, 'upzilla'])->name('userinfo.upzilla');
Route::get('/union-get/ajax/{id}', [UserInfoController::class, 'union'])->name('userinfo.union');

Route::get('course', [CompetitionController::class, 'tech_web_competition'])->name('competition.settings');
Route::post('course', [CompetitionController::class, 'tech_web_competition_store'])->name('competition.store');
Route::get('course/edit/{id}', [CompetitionController::class, 'tech_web_competition_edit'])->name('competition.edit');
Route::post('course/update', [CompetitionController::class, 'tech_web_competition_update'])->name('competition.update');

Route::get('course-type', [CompetitionController::class, 'tech_web_course_type'])->name('course_type.settings');
Route::post('course-type', [CompetitionController::class, 'tech_web_course_type_store'])->name('course_type.store');
Route::get('course-type/edit/{id}', [CompetitionController::class, 'tech_web_course_type_edit'])->name('course_type.edit');
Route::post('course-type/update', [CompetitionController::class, 'tech_web_course_type_update'])->name('course_type.update');

Route::get('/sanad/details/{sanad}', [ApplicationController::class, 'tech_web_shonod_details'])->name('sanad.details');
Route::get('union/info', [ApplicationController::class, 'techweb_union_index'])->name('union.info');

Route::get('printed-certificate-history', [ApplicationController::class, 'techweb_certificate_history'])->name('certificate.history');

// Route::get('important', [ApplicationController::class, 'techweb_union_index'])->name('union.info');

Route::get('important-links', [SettingController::class, 'techweb_important_links'])->name('important.links');
Route::get('important-links/delete/{id}', [SettingController::class, 'techweb_important_links_delete'])->name('important.links.delete');
Route::get('important-links/edit/{id}', [SettingController::class, 'techweb_important_links_edit'])->name('important.links.edit');
Route::post('important-links/store', [SettingController::class, 'techweb_important_links_store'])->name('important.links.store');
Route::post('important-links/update', [SettingController::class, 'techweb_important_links_update'])->name('important.links.update');

Route::get('important-forms', [SettingController::class, 'techweb_important_forms'])->name('important.forms');
Route::get('important-forms/delete/{id}', [SettingController::class, 'techweb_important_forms_delete'])->name('important.forms.delete');
Route::get('important-forms/edit/{id}', [SettingController::class, 'techweb_important_forms_edit'])->name('important.forms.edit');
Route::post('important-forms/store', [SettingController::class, 'techweb_important_forms_store'])->name('important.forms.store');
Route::post('important-forms/update', [SettingController::class, 'techweb_important_forms_update'])->name('important.forms.update');


/**
 * Withdraw request & withdraw execute & agent display & agent status update.
 */
Route::controller(AgentController::class)->prefix('agents')->name('agent.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::put('update/{agent}', 'update')->name('update');
    Route::get('withdraw-request', 'withDrawRequest')->name('withdrawRequest');
    Route::post('/withdraw-request/{id}', 'withDrawRequestExecute')->name('withDrawRequestExecute');
    Route::get('withdraw-prove/{id}', 'withdrawProve')->name('withdrawProve');
    Route::post('withdraw-prove', 'withdrawProveStore')->name('withdrawProveStore');
});

Route::controller(AgentSettingController::class)->prefix('agent-settings')->name('agentSetting.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
});

Route::controller(TransactionController::class)->prefix('transactions')->name('transaction.')->group(function () {
    Route::get('/', 'index')->name('index');
});
