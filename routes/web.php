<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Front\PostController;
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

Route::get('/sitemap.xml', [FrontController::class, 'sitemap']);

Route::get('/', function () {
    return view('template/index');
});

Route::group([
    'as' => 'front.post.',
    'prefix' => 'post',
], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{slug_title}', [PostController::class, 'show'])->name('show');
});

Route::prefix('template')->group(function () {

    Route::get('/', function () {
        return view('template/index');
    });
    Route::get('/index', function () {
        return view('template/index');
    });
    Route::get('/dashboard-alternate', function () {
        return view('template/dashboard-alternate');
    });
    /*App*/
    Route::get('/app-emailbox', function () {
        return view('template/app-emailbox');
    });
    Route::get('/app-emailread', function () {
        return view('template/app-emailread');
    });
    Route::get('/app-chat-box', function () {
        return view('template/app-chat-box');
    });
    Route::get('/app-file-manager', function () {
        return view('template/app-file-manager');
    });
    Route::get('/app-contact-list', function () {
        return view('template/app-contact-list');
    });
    Route::get('/app-to-do', function () {
        return view('template/app-to-do');
    });
    Route::get('/app-invoice', function () {
        return view('template/app-invoice');
    });
    Route::get('/app-fullcalender', function () {
        return view('template/app-fullcalender');
    });
    /*Charts*/
    Route::get('/charts-apex-chart', function () {
        return view('template/charts-apex-chart');
    });
    Route::get('/charts-chartjs', function () {
        return view('template/charts-chartjs');
    });
    Route::get('/charts-highcharts', function () {
        return view('template/charts-highcharts');
    });
    /*ecommerce*/
    Route::get('/ecommerce-products', function () {
        return view('template/ecommerce-products');
    });
    Route::get('/ecommerce-products-details', function () {
        return view('template/ecommerce-products-details');
    });
    Route::get('/ecommerce-add-new-products', function () {
        return view('template/ecommerce-add-new-products');
    });
    Route::get('/ecommerce-orders', function () {
        return view('template/ecommerce-orders');
    });

    /*Components*/
    Route::get('/widgets', function () {
        return view('template/widgets');
    });
    Route::get('/component-alerts', function () {
        return view('template/component-alerts');
    });
    Route::get('/component-accordions', function () {
        return view('template/component-accordions');
    });
    Route::get('/component-badges', function () {
        return view('template/component-badges');
    });
    Route::get('/component-buttons', function () {
        return view('template/component-buttons');
    });
    Route::get('/component-cards', function () {
        return view('template/component-cards');
    });
    Route::get('/component-carousels', function () {
        return view('template/component-carousels');
    });
    Route::get('/component-list-groups', function () {
        return view('template/component-list-groups');
    });
    Route::get('/component-media-object', function () {
        return view('template/component-media-object');
    });
    Route::get('/component-modals', function () {
        return view('template/component-modals');
    });
    Route::get('/component-navs-tabs', function () {
        return view('template/component-navs-tabs');
    });
    Route::get('/component-navbar', function () {
        return view('template/component-navbar');
    });
    Route::get('/component-paginations', function () {
        return view('template/component-paginations');
    });
    Route::get('/component-popovers-tooltips', function () {
        return view('template/component-popovers-tooltips');
    });
    Route::get('/component-progress-bars', function () {
        return view('template/component-progress-bars');
    });
    Route::get('/component-spinners', function () {
        return view('template/component-spinners');
    });
    Route::get('/component-notifications', function () {
        return view('template/component-notifications');
    });
    Route::get('/component-avtars-chips', function () {
        return view('template/component-avtars-chips');
    });
    /*Content*/
    Route::get('/content-grid-system', function () {
        return view('template/content-grid-system');
    });
    Route::get('/content-typography', function () {
        return view('template/content-typography');
    });
    Route::get('/content-text-utilities', function () {
        return view('template/content-text-utilities');
    });
    /*Icons*/
    Route::get('/icons-line-icons', function () {
        return view('template/icons-line-icons');
    });
    Route::get('/icons-boxicons', function () {
        return view('template/icons-boxicons');
    });
    Route::get('/icons-feather-icons', function () {
        return view('template/icons-feather-icons');
    });
    /*Authentication*/
    Route::get('/authentication-signin', function () {
        return view('template/authentication-signin');
    });
    Route::get('/authentication-signup', function () {
        return view('template/authentication-signup');
    });
    Route::get('/authentication-signin-with-header-footer', function () {
        return view('template/authentication-signin-with-header-footer');
    });
    Route::get('/authentication-signup-with-header-footer', function () {
        return view('template/authentication-signup-with-header-footer');
    });
    Route::get('/authentication-forgot-password', function () {
        return view('template/authentication-forgot-password');
    });
    Route::get('/authentication-reset-password', function () {
        return view('template/authentication-reset-password');
    });
    Route::get('/authentication-lock-screen', function () {
        return view('template/authentication-lock-screen');
    });
    /*Table*/
    Route::get('/table-basic-table', function () {
        return view('template/table-basic-table');
    });
    Route::get('/table-datatable', function () {
        return view('template/table-datatable');
    });
    /*Pages*/
    Route::get('/user-profile', function () {
        return view('template/user-profile');
    });
    Route::get('/timeline', function () {
        return view('template/timeline');
    });
    Route::get('/pricing-table', function () {
        return view('template/pricing-table');
    });
    Route::get('/errors-404-error', function () {
        return view('template/errors-404-error');
    });
    Route::get('/errors-500-error', function () {
        return view('template/errors-500-error');
    });
    Route::get('/errors-coming-soon', function () {
        return view('template/errors-coming-soon');
    });
    Route::get('/error-blank-page', function () {
        return view('template/error-blank-page');
    });
    Route::get('/faq', function () {
        return view('template/faq');
    });
    /*Forms*/
    Route::get('/form-elements', function () {
        return view('template/form-elements');
    });

    Route::get('/form-input-group', function () {
        return view('template/form-input-group');
    });
    Route::get('/form-layouts', function () {
        return view('template/form-layouts');
    });
    Route::get('/form-validations', function () {
        return view('template/form-validations');
    });
    Route::get('/form-wizard', function () {
        return view('template/form-wizard');
    });
    Route::get('/form-text-editor', function () {
        return view('template/form-text-editor');
    });
    Route::get('/form-file-upload', function () {
        return view('template/form-file-upload');
    });
    Route::get('/form-date-time-pickes', function () {
        return view('template/form-date-time-pickes');
    });
    Route::get('/form-select2', function () {
        return view('template/form-select2');
    });
    /*Maps*/
    Route::get('/map-google-maps', function () {
        return view('template/map-google-maps');
    });
    Route::get('/map-vector-maps', function () {
        return view('template/map-vector-maps');
    });
    /*Un-found*/
    Route::get('/test/content-grid-system', function () {
        return view('template/test/content-grid-system');
    });

});

require __DIR__ . '/auth.php';