<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\UserInterfaceController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\Company_rest;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\FrontPage;
use App\Http\Controllers\FounderApi;
use App\Http\Controllers\PageLayoutController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\siteGeneral;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TestOutput;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;

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

// Main Page Route
Route::get('{any}', [FrontendController::class, 'home'])->where('any', '/|founder|board-of-directors|company-profile|jamuna-tv|the-daily-jugantor|hoorain-htf|hoor|hooram|growth-story|jamuna-denims-garments-ltd|jeansco|quality-process|future-expansion|mission-vision|');


/* Route Dashboards */
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('analytics', [DashboardController::class, 'dashboardAnalytics'])->name('dashboard-analytics');
    Route::get('ecommerce', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce');

});

Route::group(['prefix' => 'codebumble'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('auth-login-api');
    Route::post('/forgot-password', [AuthController::class, 'forgot_password_api'])->name('auth-forget-password-api');

    Route::group(['middleware' => 'auth:sanctum'], function(){
        Route::post('site-settings-general-api', [siteGeneral::class, 'site_settings_general_api'])->name('site-settings-general-api');
        Route::post('add-section', [Company_rest::class, 'add_section'])->name('add-section-api');
        Route::post('add-company', [Company_rest::class, 'add_company'])->name('add-company-api');
        Route::get('all-company-api', [Company_rest::class, 'view_all_company_api'])->name('all-company-api');
        Route::post('edit-company-api/{id}', [Company_rest::class, 'edit_company'])->name('edit-company-api');
        Route::post('test-output', [TestOutput::class, 'test_post'])->name('test-post');
        Route::get('test-output-get', [TestOutput::class, 'test_get'])->name('test-get');

        Route::post('user-suspend/{username}', [AuthController::class, 'user_suspend'])->name('user_suspend');
        Route::post('add_user', [AuthController::class, 'register'])->name('add-user-api');

        Route::post('user-active-by-auth/{username}', [AuthController::class, 'user_active_by_auth'])->name('user_active_by_auth');

        Route::post('user-report-api/{username}', [AuthController::class, 'user_report_api'])->name('user-report-api');
    });
});
/* Route Dashboards */
Route::group(['prefix' => 'frontpage-api', ], function () {
    Route::get('slider', [FrontPage::class, 'slider_view']);
    Route::get('chairpersson-speech', [FrontPage::class, 'chairpersson_speech']);
    Route::get('all-company-view', [FrontPage::class, 'all_company_view']);
    Route::get('footer-component', [FrontPage::class, 'footer_component']);
    Route::get('directors-list', [FrontPage::class, 'directors_list']);
    Route::get('shortBrief', [FrontPage::class, 'shortBrief']);

});

Route::group(['prefix' => 'founder-api', ], function () {
    Route::get('founder-speech', [FounderApi::class, 'founder_speech_breadcrumb']);


});

Route::group(['prefix' => 'admin', ], function () {

    Route::group(['middleware' => 'auth:sanctum'], function(){
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
        Route::get('register', [AuthenticationController::class, 'register'])->name('auth-register');
        Route::get('add-company', [Company_rest::class, 'auth_view_add_company'])->name('add-company');
        Route::get('all-company', [Company_rest::class, 'auth_view_all_company'])->name('all-company');
        Route::get('edit-company/{id}', [Company_rest::class, 'auth_view_edit_company'])->name('edit-company');
        Route::get('site-settings/general', [siteGeneral::class, 'general_page_view'])->name('site-settings-general');
        Route::get('site-settings/founder-page', [siteGeneral::class, 'founder_page_view'])->name('founder-page-view');

        Route::get('add-section', [Company_rest::class, 'auth_view_add_section'])->name('add-section');
        Route::get('all-section', [Company_rest::class, 'auth_view_all_section'])->name('all-section');
        Route::get('delete-section/{name}', [Company_rest::class, 'delete_section'])->name('delete-section');
        Route::get('profile-account', [AppsController::class, 'user_view_account'])->name('profile-account');
        Route::get('visitor/{username}', [AppsController::class, 'profile_visitor'])->name('profile_visitor');
        // API SET
        Route::get('profile-account-under-user', [AuthController::class, 'under_ref'])->name('profile-account-under-user');
        Route::get('all-user-list-api', [AuthController::class, 'all_user_list_api'])->name('all-user-list-api');
        Route::get('all-user-list', [AppsController::class, 'user_list'])->name('all-user-list');
        Route::post('profile-account-edit', [AuthController::class, 'user_edit'])->name('profile-account-edit');
        Route::get('delete-company/{id}', [Company_rest::class, 'delete_company'])->name('delete-company');
        Route::get('profile-security', [AppsController::class, 'user_view_security'])->name('profile-security');
        Route::post('auth_reset_password', [AuthController::class, 'auth_reset_password'])->name('auth_reset_password');

        Route::post('profile_image', [AuthController::class, 'profile_image_upload'])->name('profile_image');


        Route::get('profile-visitor-under-user/{username}', [AuthController::class, 'profile_visitor_under_ref'])->name('profile_visitor_under_ref');
    });
    Route::get('profile-billing', [AppsController::class, 'user_view_billing'])->name('profile-billing');
    Route::get('profile-notification', [AppsController::class, 'user_view_notifications'])->name('profile-notification');
    Route::get('profile-connections', [AppsController::class, 'user_view_connections'])->name('app-user-view-connections');

});

/* Route Apps */
Route::group(['prefix' => 'app'], function () {
    Route::get('email', [AppsController::class, 'emailApp'])->name('app-email');
    Route::get('chat', [AppsController::class, 'chatApp'])->name('app-chat');
    Route::get('todo', [AppsController::class, 'todoApp'])->name('app-todo');
    Route::get('calendar', [AppsController::class, 'calendarApp'])->name('app-calendar');
    Route::get('kanban', [AppsController::class, 'kanbanApp'])->name('app-kanban');
    Route::get('invoice/list', [AppsController::class, 'invoice_list'])->name('app-invoice-list');
    Route::get('invoice/preview', [AppsController::class, 'invoice_preview'])->name('app-invoice-preview');
    Route::get('invoice/edit', [AppsController::class, 'invoice_edit'])->name('app-invoice-edit');
    Route::get('invoice/add', [AppsController::class, 'invoice_add'])->name('app-invoice-add');
    Route::get('invoice/print', [AppsController::class, 'invoice_print'])->name('app-invoice-print');
    Route::get('ecommerce/shop', [AppsController::class, 'ecommerce_shop'])->name('app-ecommerce-shop');
    Route::get('ecommerce/details', [AppsController::class, 'ecommerce_details'])->name('app-ecommerce-details');
    Route::get('ecommerce/wishlist', [AppsController::class, 'ecommerce_wishlist'])->name('app-ecommerce-wishlist');
    Route::get('ecommerce/checkout', [AppsController::class, 'ecommerce_checkout'])->name('app-ecommerce-checkout');
    Route::get('file-manager', [AppsController::class, 'file_manager'])->name('app-file-manager');
    Route::get('access-roles', [AppsController::class, 'access_roles'])->name('app-access-roles');
    Route::get('access-permission', [AppsController::class, 'access_permission'])->name('app-access-permission');
    Route::get('user/view/account', [AppsController::class, 'user_view_account'])->name('app-user-view-account');
    Route::get('user/view/security', [AppsController::class, 'user_view_security'])->name('app-user-view-security');
    Route::get('user/view/billing', [AppsController::class, 'user_view_billing'])->name('app-user-view-billing');
    Route::get('user/view/notifications', [AppsController::class, 'user_view_notifications'])->name('app-user-view-notifications');
    Route::get('user/view/connections', [AppsController::class, 'user_view_connections'])->name('app-user-view-connections');
});
/* Route Apps */

/* Route UI */
Route::group(['prefix' => 'ui'], function () {
    Route::get('typography', [UserInterfaceController::class, 'typography'])->name('ui-typography');
});
/* Route UI */

/* Route Icons */
Route::group(['prefix' => 'icons'], function () {
    Route::get('feather', [UserInterfaceController::class, 'icons_feather'])->name('icons-feather');
});
/* Route Icons */

/* Route Cards */
Route::group(['prefix' => 'card'], function () {
    Route::get('basic', [CardsController::class, 'card_basic'])->name('card-basic');
    Route::get('advance', [CardsController::class, 'card_advance'])->name('card-advance');
    Route::get('statistics', [CardsController::class, 'card_statistics'])->name('card-statistics');
    Route::get('analytics', [CardsController::class, 'card_analytics'])->name('card-analytics');
    Route::get('actions', [CardsController::class, 'card_actions'])->name('card-actions');
});
/* Route Cards */

/* Route Components */
Route::group(['prefix' => 'component'], function () {
    Route::get('accordion', [ComponentsController::class, 'accordion'])->name('component-accordion');
    Route::get('alert', [ComponentsController::class, 'alert'])->name('component-alert');
    Route::get('avatar', [ComponentsController::class, 'avatar'])->name('component-avatar');
    Route::get('badges', [ComponentsController::class, 'badges'])->name('component-badges');
    Route::get('breadcrumbs', [ComponentsController::class, 'breadcrumbs'])->name('component-breadcrumbs');
    Route::get('buttons', [ComponentsController::class, 'buttons'])->name('component-buttons');
    Route::get('carousel', [ComponentsController::class, 'carousel'])->name('component-carousel');
    Route::get('collapse', [ComponentsController::class, 'collapse'])->name('component-collapse');
    Route::get('divider', [ComponentsController::class, 'divider'])->name('component-divider');
    Route::get('dropdowns', [ComponentsController::class, 'dropdowns'])->name('component-dropdowns');
    Route::get('list-group', [ComponentsController::class, 'list_group'])->name('component-list-group');
    Route::get('modals', [ComponentsController::class, 'modals'])->name('component-modals');
    Route::get('pagination', [ComponentsController::class, 'pagination'])->name('component-pagination');
    Route::get('navs', [ComponentsController::class, 'navs'])->name('component-navs');
    Route::get('offcanvas', [ComponentsController::class, 'offcanvas'])->name('component-offcanvas');
    Route::get('tabs', [ComponentsController::class, 'tabs'])->name('component-tabs');
    Route::get('timeline', [ComponentsController::class, 'timeline'])->name('component-timeline');
    Route::get('pills', [ComponentsController::class, 'pills'])->name('component-pills');
    Route::get('tooltips', [ComponentsController::class, 'tooltips'])->name('component-tooltips');
    Route::get('popovers', [ComponentsController::class, 'popovers'])->name('component-popovers');
    Route::get('pill-badges', [ComponentsController::class, 'pill_badges'])->name('component-pill-badges');
    Route::get('progress', [ComponentsController::class, 'progress'])->name('component-progress');
    Route::get('spinner', [ComponentsController::class, 'spinner'])->name('component-spinner');
    Route::get('toast', [ComponentsController::class, 'toast'])->name('component-bs-toast');
});
/* Route Components */

/* Route Extensions */
Route::group(['prefix' => 'ext-component'], function () {
    Route::get('sweet-alerts', [ExtensionController::class, 'sweet_alert'])->name('ext-component-sweet-alerts');
    Route::get('block-ui', [ExtensionController::class, 'block_ui'])->name('ext-component-block-ui');
    Route::get('toastr', [ExtensionController::class, 'toastr'])->name('ext-component-toastr');
    Route::get('sliders', [ExtensionController::class, 'sliders'])->name('ext-component-sliders');
    Route::get('drag-drop', [ExtensionController::class, 'drag_drop'])->name('ext-component-drag-drop');
    Route::get('tour', [ExtensionController::class, 'tour'])->name('ext-component-tour');
    Route::get('clipboard', [ExtensionController::class, 'clipboard'])->name('ext-component-clipboard');
    Route::get('plyr', [ExtensionController::class, 'plyr'])->name('ext-component-plyr');
    Route::get('context-menu', [ExtensionController::class, 'context_menu'])->name('ext-component-context-menu');
    Route::get('swiper', [ExtensionController::class, 'swiper'])->name('ext-component-swiper');
    Route::get('tree', [ExtensionController::class, 'tree'])->name('ext-component-tree');
    Route::get('ratings', [ExtensionController::class, 'ratings'])->name('ext-component-ratings');
    Route::get('locale', [ExtensionController::class, 'locale'])->name('ext-component-locale');
});
/* Route Extensions */

/* Route Page Layouts */
Route::group(['prefix' => 'page-layouts'], function () {
    Route::get('collapsed-menu', [PageLayoutController::class, 'layout_collapsed_menu'])->name('layout-collapsed-menu');
    Route::get('full', [PageLayoutController::class, 'layout_full'])->name('layout-full');
    Route::get('without-menu', [PageLayoutController::class, 'layout_without_menu'])->name('layout-without-menu');
    Route::get('empty', [PageLayoutController::class, 'layout_empty'])->name('layout-empty');
    Route::get('blank', [PageLayoutController::class, 'layout_blank'])->name('layout-blank');
});
/* Route Page Layouts */

/* Route Forms */
Route::group(['prefix' => 'form'], function () {
    Route::get('input', [FormsController::class, 'input'])->name('form-input');
    Route::get('input-groups', [FormsController::class, 'input_groups'])->name('form-input-groups');
    Route::get('input-mask', [FormsController::class, 'input_mask'])->name('form-input-mask');
    Route::get('textarea', [FormsController::class, 'textarea'])->name('form-textarea');
    Route::get('checkbox', [FormsController::class, 'checkbox'])->name('form-checkbox');
    Route::get('radio', [FormsController::class, 'radio'])->name('form-radio');
    Route::get('custom-options', [FormsController::class, 'custom_options'])->name('form-custom-options');
    Route::get('switch', [FormsController::class, 'switch'])->name('form-switch');
    Route::get('select', [FormsController::class, 'select'])->name('form-select');
    Route::get('number-input', [FormsController::class, 'number_input'])->name('form-number-input');
    Route::get('file-uploader', [FormsController::class, 'file_uploader'])->name('form-file-uploader');
    Route::get('quill-editor', [FormsController::class, 'quill_editor'])->name('form-quill-editor');
    Route::get('date-time-picker', [FormsController::class, 'date_time_picker'])->name('form-date-time-picker');
    Route::get('layout', [FormsController::class, 'layouts'])->name('form-layout');
    Route::get('wizard', [FormsController::class, 'wizard'])->name('form-wizard');
    Route::get('validation', [FormsController::class, 'validation'])->name('form-validation');
    Route::get('repeater', [FormsController::class, 'form_repeater'])->name('form-repeater');
});
/* Route Forms */

/* Route Tables */
Route::group(['prefix' => 'table'], function () {
    Route::get('', [TableController::class, 'table'])->name('table');
    Route::get('datatable/basic', [TableController::class, 'datatable_basic'])->name('datatable-basic');
    Route::get('datatable/advance', [TableController::class, 'datatable_advance'])->name('datatable-advance');
});
/* Route Tables */

/* Route Pages */
Route::group(['prefix' => 'page'], function () {
    Route::get('account-settings-account', [PagesController::class, 'account_settings_account'])->name('page-account-settings-account');
    Route::get('account-settings-security', [PagesController::class, 'account_settings_security'])->name('page-account-settings-security');
    Route::get('account-settings-billing', [PagesController::class, 'account_settings_billing'])->name('page-account-settings-billing');
    Route::get('account-settings-notifications', [PagesController::class, 'account_settings_notifications'])->name('page-account-settings-notifications');
    Route::get('account-settings-connections', [PagesController::class, 'account_settings_connections'])->name('page-account-settings-connections');
    Route::get('profile', [PagesController::class, 'profile'])->name('page-profile');
    Route::get('faq', [PagesController::class, 'faq'])->name('page-faq');
    Route::get('knowledge-base', [PagesController::class, 'knowledge_base'])->name('page-knowledge-base');
    Route::get('knowledge-base/category', [PagesController::class, 'kb_category'])->name('page-knowledge-base');
    Route::get('knowledge-base/category/question', [PagesController::class, 'kb_question'])->name('page-knowledge-base');
    Route::get('pricing', [PagesController::class, 'pricing'])->name('page-pricing');
    Route::get('api-key', [PagesController::class, 'api_key'])->name('page-api-key');
    Route::get('blog/list', [PagesController::class, 'blog_list'])->name('page-blog-list');
    Route::get('blog/detail', [PagesController::class, 'blog_detail'])->name('page-blog-detail');
    Route::get('blog/edit', [PagesController::class, 'blog_edit'])->name('page-blog-edit');

    // Miscellaneous Pages With Page Prefix
    Route::get('coming-soon', [MiscellaneousController::class, 'coming_soon'])->name('misc-coming-soon');
    Route::get('not-authorized', [MiscellaneousController::class, 'not_authorized'])->name('misc-not-authorized');
    Route::get('maintenance', [MiscellaneousController::class, 'maintenance'])->name('misc-maintenance');
    Route::get('license', [PagesController::class, 'license'])->name('page-license');
});

/* Modal Examples */
Route::get('/modal-examples', [PagesController::class, 'modal_examples'])->name('modal-examples');

/* Route Pages */
Route::get('/error', [MiscellaneousController::class, 'error'])->name('error');



/* Route Authentication Pages */
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthenticationController::class, 'login'])->name('auth-login');



    Route::get('forgot-password', [AuthenticationController::class, 'forgot_password'])->name('auth-forgot-password');
    Route::get('reset-password/{token}', [AuthenticationController::class, 'reset_password'])->name('reset-password');
    Route::post('reset-password-api/{token}', [AuthController::class, 'reset_password_api'])->name('reset-password-api');
    Route::get('verify-email/{email}', [AuthenticationController::class, 'verify_email'])->name('auth-verify-email');
    Route::get('two-steps', [AuthenticationController::class, 'two_steps'])->name('auth-two-steps');
    Route::get('lock-screen', [AuthenticationController::class, 'lock_screen'])->name('auth-lock_screen');
});
/* Route Authentication Pages */

/* Route Charts */
Route::group(['prefix' => 'chart'], function () {
    Route::get('apex', [ChartsController::class, 'apex'])->name('chart-apex');
    Route::get('chartjs', [ChartsController::class, 'chartjs'])->name('chart-chartjs');
    Route::get('echarts', [ChartsController::class, 'echarts'])->name('chart-echarts');
});
/* Route Charts */

// map leaflet
Route::get('/maps/leaflet', [ChartsController::class, 'maps_leaflet'])->name('map-leaflet');

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
