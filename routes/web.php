<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Route::get('/registration', 'FrontendController@index')->name('organization.new');
Route::post('/check-organization-name', 'FrontendController@checkOrganizationName')->name('check-organization-name');
Route::get('/', 'HomeController@index')->name('home');
Route::get('language/{locale}', 'LanguageController@setLocale')->name('locale');

Route::resources([
    'user' => 'UserController',
    'province' => 'ProvinceController',
    'district' => 'DistrictController',
    'municipality' => 'MunicipalityController',
    'ward' => 'WardController',
    'organization-type' => 'OrganizationTypeController'
]);

Route::get('unrenewed', 'OrganizationController@unrenewedList')->name('organization.unrenewed.index');

Route::get('fiscal-year/{fiscalYear?}', 'FiscalYearController@index')->name('fiscal-year.index');
Route::post('fiscal-year', 'FiscalYearController@store')->name('fiscal-year.store');
Route::put('fiscal-year/{fiscalYear}', 'FiscalYearController@update')->name('fiscal-year.update');
Route::delete('fiscal-year/{fiscalYear}', 'FiscalYearController@destroy')->name('fiscal-year.destroy');

Route::patch('organization/{id}/restore', 'OrganizationController@restore')->name('organization.restore');
Route::resource('organization', 'OrganizationController');
Route::delete('document', 'DocumentController@destroy')->name('ajax.document.destroy');

Route::get('organization/verify/{organization}', 'OrganizationActionController@verifyForm')->name('organization.verify.form');
Route::put('organization/verify/{organization}', 'OrganizationActionController@verify')->name('organization.verify');
Route::get('organization/register/{organization}', 'OrganizationActionController@registerForm')->name('organization.register.form');
Route::put('organization/register/{organization}', 'OrganizationActionController@register')->name('organization.register');
Route::get('organization/renew/{organization}', 'OrganizationActionController@renewForm')->name('organization.renew.form');
Route::put('organization/renew/{organization}', 'OrganizationActionController@renew')->name('organization.renew');
Route::get('organization/close/{organization}', 'OrganizationActionController@closeForm')->name('organization.close.form');
Route::put('organization/close/{organization}', 'OrganizationActionController@close')->name('organization.close');
Route::get('organization/rename/{organization}', 'OrganizationActionController@renameForm')->name('organization.rename.form');
Route::put('organization/rename/{organization}', 'OrganizationActionController@rename')->name('organization.rename');

Route::patch('rename-organization-type', 'OrganizationTypeController@renameExisting')->name('rename-organization-type');

Route::get('organizations/{organization}/subsidiary/create', 'SubsidiaryController@create')->name('subsidiary.create');
Route::post('organizations/{organization}/subsidiary', 'SubsidiaryController@store')->name('subsidiary.store');
Route::get('subsidiaries/{subsidiary}/edit', 'SubsidiaryController@edit')->name('subsidiary.edit');
Route::put('subsidiaries/{subsidiary}', 'SubsidiaryController@update')->name('subsidiary.update');
Route::delete('subsidiaries/{subsidiary}', 'SubsidiaryController@destroy')->name('subsidiary.destroy');

// Naamsari
Route::get('naamsari/{organization}', 'NaamsariController@index')->name('naamsari.index');
Route::post('naamsari/{organization}', 'NaamsariController@store')->name('naamsari.store');

// Karobar Paribartan
Route::get('karobar-paribartan/{organization}', 'KarobarParibartanController@index')->name('karobar-paribartan.index');
Route::post('karobar-paribartan/{organization}', 'KarobarParibartanController@store')->name('karobar-paribartan.store');

Route::get('report', 'OrganizationReportController@index')->name('organization.report.index');

Route::resource('online-application', 'OnlineApplicationController');
Route::get('change-password/{user}', 'UserPasswordController@form')->name('password.change.form');
Route::put('change-password/{user}', 'UserPasswordController@change')->name('password.change');

Route::get('mysettings', 'UserSettingsController@index')->name('user.settings.index');
Route::post('mysettings', 'UserSettingsController@sync')->name('user.settings.sync');

Route::get('print/{tokenNumber}/token', 'PrintController@token')->name('print.token');
Route::get('print/{organization}/personal-sifaris', 'PrintController@personalSifaris')->name('print.personal-sifaris');
Route::get('print/{organization}/ward-sifaris', 'PrintController@wardSifaris')->name('print.ward-sifaris');
Route::get('print/{organization}/pramanpatra-front', 'PrintController@pramanpatraFront')->name('print.pramanpatra-front');
Route::get('print/{organization}/pramanpatra-back', 'PrintController@pramanpatraBack')->name('print.pramanpatra-back');
Route::get('print/{organization}/gharelu-sifaris', 'PrintController@ghareluSifaris')->name('print.gharelu-sifaris');
Route::get('print/{organization}/kardata-sifaris', 'PrintController@kardataSifaris')->name('print.kardata-sifaris');
Route::get('print/{organization}/banijya-sifaris', 'PrintController@banijyaSifaris')->name('print.banijya-sifaris');
Route::get('print/{organization}/karobar-paribartan', 'PrintController@karobarParibartan')->name('print.karobar-paribartan');
// banda sifaris letters
Route::get('print/{organization}/banda-sifaris-gharelu', 'PrintController@bandaSifarisGharelu')->name('print.banda-sifaris-gharelu');
Route::get('print/{organization}/banda-sifaris-kardata', 'PrintController@bandaSifarisKardata')->name('print.banda-sifaris-kardata');
Route::get('print/{organization}/banda-sifaris-banijya', 'PrintController@bandaSifarisBanijya')->name('print.banda-sifaris-banijya');

Route::get('token/{tokenNumber}', 'TokenController@index')->name('token.index');
Route::get('token', 'TokenController@search')->name('token.search');

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

Route::get('old-organizations', 'OldOrganizationController@create')->name('old-organizations.create');
