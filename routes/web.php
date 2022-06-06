<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Route::get('/registration', 'FrontendController@index')->name('organization.new');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('language/{locale}', 'LanguageController@setLocale')->name('locale');

Route::resources([
    'user' => 'UserController',
    'province' => 'ProvinceController',
    'district' => 'DistrictController',
    'municipality' => 'MunicipalityController',
    'ward' => 'WardController',
]);

// Route::get('/data/{key}', 'TableController@index');
// Route::post('/data/{key}', 'TableController@store');
Route::get('data/{slug}/create', 'ResourceTemplateController@create');
Route::post('data/{slug}', 'ResourceTemplateController@store');

Route::get('resources', 'ResourceController@index')->name('resources.index');
Route::get('resources/create', 'ResourceController@create')->name('resources.create');
Route::post('resources', 'ResourceController@store')->name('resources.store');
Route::get('resources/{slug}/edit', 'ResourceController@edit')->name('resources.edit');

Route::post('resources/{slug}/fields', 'ResourceController@saveFields')->name('resources.fields.store');


Route::get('fiscal-year/{fiscalYear?}', 'FiscalYearController@index')->name('fiscal-year.index');
Route::post('fiscal-year', 'FiscalYearController@store')->name('fiscal-year.store');
Route::put('fiscal-year/{fiscalYear}', 'FiscalYearController@update')->name('fiscal-year.update');
Route::delete('fiscal-year/{fiscalYear}', 'FiscalYearController@destroy')->name('fiscal-year.destroy');

// Route::delete('document', 'DocumentController@destroy')->name('ajax.document.destroy');

Route::get('change-password/{user}', 'UserPasswordController@form')->name('password.change.form');
Route::put('change-password/{user}', 'UserPasswordController@change')->name('password.change');

// Route::get('mysettings', 'UserSettingsController@index')->name('user.settings.index');
// Route::post('mysettings', 'UserSettingsController@sync')->name('user.settings.sync');

Route::get('settings', 'SettingsController@index')->name('settings.index');
Route::post('settings', 'SettingsController@sync')->name('settings.sync');

Route::get('configuration-checklist', 'ConfigurationChecklistController@index')->name('configuration-checklist.index');

Route::group(
    [
        'middleware' => ['auth', 'role:super-admin']
    ],
    function () {
        Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
    }
);

// Route::resource('area', AreaofMunicipalityController::class);
Route::get('area','AreaofMunicipalityController@index')->name('area.index');
Route::get('area/create','AreaofMunicipalityController@create')->name('area.create');
Route::post('area','AreaofMunicipalityController@store')->name('area.store');
Route::get('area/{municipalityArea}/edit','AreaofMunicipalityController@edit')->name('area.edit');
Route::put('area/{municipalityArea}','AreaofMunicipalityController@update')->name('area.update');
Route::delete('area/{municipalityArea}','AreaofMunicipalityController@destroy')->name('area.destroy');

Route::resource('local-population', LocalPopulationController::class);
Route::resource('population', PopulationController::class);
Route::resource('age-population', AgePopulationController::class);
Route::resource('disability', DisabilityController::class);
Route::resource('disability-detail', DisabilityDetailController::class);
// Route::resource('bank-detail', BankDetailController::class);
Route::resource('bank-detail', BankDetailController::class);
Route::resource('bank', BankController::class);
Route::resource('local-bank', LocalBankController::class);

Route::any('/{all}', function () {
    return view('app');
})->where(['all' => '.*']);


