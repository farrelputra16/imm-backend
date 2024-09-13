<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SdgController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\MetricController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MetricProjectController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompanyIncomeController;
use App\Http\Controllers\CompanyOutcomeController;



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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/pages/create', 'PageController@create')->name('pages.create');
    Route::post('/pages', 'PageController@store')->name('pages.store');
    Route::get('/pages', 'PageController@index')->name('pages.index');
    Route::get('pages/{id}/edit', 'PageController@edit')->name('pages.edit');
    Route::delete('pages/{id}', 'PageController@destroy')->name('pages.destroy');
    Route::put('pages/{id}', 'PageController@update')->name('pages.update');
    Route::get('/pages/{id}/view', 'PageController@view')->name('pages.view');



    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags/store', [TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('/tags/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::get('/tags/{id}/view', [TagController::class, 'view'])->name('tags.view');



    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}/view', [UserController::class, 'view'])->name('users.view');

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::get('/companies/{id}/view', [CompanyController::class, 'view'])->name('companies.view');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{id}/view', [PostController::class, 'view'])->name('posts.view');
    Route::post('/posts/image/upload', [PostController::class, 'uploadImage'])->name('posts.uploadImage');


    Route::get('/sdgs', [SdgController::class, 'index'])->name('sdgs.index');
    Route::get('/sdgs/create', [SdgController::class, 'create'])->name('sdgs.create');
    Route::post('/sdgs/store', [SdgController::class, 'store'])->name('sdgs.store');
    Route::get('/sdgs/{id}/edit', [SdgController::class, 'edit'])->name('sdgs.edit');
    Route::put('/sdgs/{id}', [SdgController::class, 'update'])->name('sdgs.update');
    Route::delete('/sdgs/{id}', [SdgController::class, 'destroy'])->name('sdgs.destroy');
    Route::get('/sdgs/{id}/view', [SdgController::class, 'view'])->name('sdgs.view');


    Route::get('/indicators', [IndicatorController::class, 'index'])->name('indicators.index');
    Route::get('/indicators/create', [IndicatorController::class, 'create'])->name('indicators.create');
    Route::post('/indicators/store', [IndicatorController::class, 'store'])->name('indicators.store');
    Route::get('/indicators/{id}/edit', [IndicatorController::class, 'edit'])->name('indicators.edit');
    Route::put('/indicators/{id}', [IndicatorController::class, 'update'])->name('indicators.update');
    Route::delete('/indicators/{id}', [IndicatorController::class, 'destroy'])->name('indicators.destroy');
    Route::get('/indicators/{id}/view', [IndicatorController::class, 'view'])->name('indicators.view');


    Route::get('/metrics', [MetricController::class, 'index'])->name('metrics.index');
    Route::get('/metrics/create', [MetricController::class, 'create'])->name('metrics.create');
    Route::post('/metrics/store', [MetricController::class, 'store'])->name('metrics.store');
    Route::get('/metrics/{id}/edit', [MetricController::class, 'edit'])->name('metrics.edit');
    Route::put('/metrics/{id}', [MetricController::class, 'update'])->name('metrics.update');
    Route::delete('/metrics/{id}', [MetricController::class, 'destroy'])->name('metrics.destroy');
    Route::get('/metrics/{id}/view', [MetricController::class, 'view'])->name('metrics.view');


    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/projects/{id}/view', [ProjectController::class, 'view'])->name('projects.view');
    Route::post('/projects/filter-metrics', [ProjectController::class, 'filterMetrics'])->name('projects.filterMetrics');


    // Route::get('/metric-projects/select-project', [MetricProjectController::class, 'selectProject'])->name('metric-projects.select-project');
    // Route::get('/metric-projects/{id}', [MetricProjectController::class, 'index'])->name('metric-projects.index');
    // Route::get('/metric-projects/{id}/create', [MetricProjectController::class, 'create'])->name('metric-projects.create');
    // Route::post('/metric-projects/{id}', [MetricProjectController::class, 'store'])->name('metric-projects.store');
    // Route::post('/metric-projects/{id}', [MetricProjectController::class, 'destroy'])->name('metric-projects.destroy');
    // Route::get('/metric-projects/{projectId}/{metricProjectId}/edit', [MetricProjectController::class, 'edit'])->name('metric-projects.edit');
    // Route::put('/metric-projects/{projectId}/{metricProjectId}', [MetricProjectController::class, 'update'])->name('metric-projects.update');
    // Route::get('/metric-projects/{metricProject}/add-report', [MetricProjectController::class, 'addReport'])->name('metric-projects.add-report');
    // Route::post('/metric-projects/{metricProject}/store-report', [MetricProjectController::class, 'storeReport'])->name('metric-projects.storeReport');


    // Route for selecting a project
    Route::get('metric-projects/select', [MetricProjectController::class, 'selectProject'])->name('metric-projects.select-project');

    // Routes for metric projects
    Route::prefix('projects/{project}')->group(function () {
        Route::get('metric-projects/select', [MetricProjectController::class, 'selectProject'])->name('metric-projects.selectProject');
        Route::get('metric-projects', [MetricProjectController::class, 'index'])->name('metric-projects.index');
        Route::get('metric-projects/create', [MetricProjectController::class, 'create'])->name('metric-projects.create');
        Route::post('metric-projects', [MetricProjectController::class, 'store'])->name('metric-projects.store');
        Route::get('metric-projects/{metricProject}/edit', [MetricProjectController::class, 'edit'])->name('metric-projects.edit');
        Route::put('metric-projects/{metricProject}', [MetricProjectController::class, 'update'])->name('metric-projects.update');
        Route::delete('metric-projects/{metricProject}', [MetricProjectController::class, 'destroy'])->name('metric-projects.destroy');
        Route::get('metric-projects/{metricProject}/add-report', [MetricProjectController::class, 'addReport'])->name('metric-projects.addReport');
        Route::post('metric-projects/{metricProject}/store-report', [MetricProjectController::class, 'storeReport'])->name('metric-projects.storeReport');
    });


    Route::get('surveys', [SurveyController::class, 'index'])->name('surveys.index');
    Route::get('surveys/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('surveys', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('surveys/{survey}', [SurveyController::class, 'view'])->name('surveys.view');
    Route::get('surveys/{survey}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
    Route::put('surveys/{survey}', [SurveyController::class, 'update'])->name('surveys.update');
    Route::delete('surveys/{survey}', [SurveyController::class, 'destroy'])->name('surveys.destroy');
    Route::get('surveys/{survey}/submit', [SurveyController::class, 'createEntry'])->name('surveys.entry');
    Route::post('surveys/{survey}', [SurveyController::class, 'submit'])->name('surveys.submit');
    Route::get('surveys/{survey}/results', [SurveyController::class, 'results'])->name('surveys.results');

    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{id}', [EventController::class, 'view'])->name('events.view');
    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('events/{id}/view', [EventController::class, 'view'])->name('events.view');

    Route::get('/company-income/select-company', [CompanyIncomeController::class, 'selectCompany'])->name('company-income.select-company');
    Route::get('/company-income', [CompanyIncomeController::class, 'index'])->name('company-income.index');
    Route::get('/company-income/create/{company_id}', [CompanyIncomeController::class, 'create'])->name('company-income.create');
    Route::post('/company-income/store', [CompanyIncomeController::class, 'store'])->name('company-income.store');
    Route::get('/company-income/{income}/edit', [CompanyIncomeController::class, 'edit'])->name('company-income.edit');
    Route::put('/company-income/{income}', [CompanyIncomeController::class, 'update'])->name('company-income.update');
    Route::delete('/company-income/{income}', [CompanyIncomeController::class, 'destroy'])->name('company-income.destroy');
    Route::get('/company-income/{income}', [CompanyIncomeController::class, 'show'])->name('company-income.show');

    Route::get('/company-outcome/select-company', [CompanyOutcomeController::class, 'selectCompany'])->name('company-outcome.select-company');
    Route::get('/company-outcome', [CompanyOutcomeController::class, 'index'])->name('company-outcome.index');
    Route::get('/company-outcome/detail-outcome/{project_id}', [CompanyOutcomeController::class, 'detailOutcome'])->name('company-outcome.detail-outcome');

    Route::get('/company-outcome/create/{project_id}', [CompanyOutcomeController::class, 'create'])->name('company-outcome.create');
    Route::post('/company-outcome/store', [CompanyOutcomeController::class, 'store'])->name('company-outcome.store');
    Route::get('/company-outcome/{companyOutcome}', [CompanyOutcomeController::class, 'show'])->name('company-outcome.show');
    Route::get('/company-outcome/{companyOutcome}/edit', [CompanyOutcomeController::class, 'edit'])->name('company-outcome.edit');
    Route::put('/company-outcome/{companyOutcome}', [CompanyOutcomeController::class, 'update'])->name('company-outcome.update');
    Route::delete('/company-outcome/{companyOutcome}', [CompanyOutcomeController::class, 'destroy'])->name('company-outcome.destroy');


});
