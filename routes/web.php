<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::resource('school', SchoolController::class);
Route::resource('feeder-hostel', FeederHostelController::class);
Route::resource('kamlari-hostel', KamlariHostelController::class);
Route::resource('goverment-student', GovermentStudentController::class);

Route::get('info-card', 'InfoCardController@create')->name('info-card.create');
Route::post('info-card', 'InfoCardController@store')->name('info-card.store');
Route::delete('info-card/{infocard}', 'InfoCardController@destroy')->name('info-card.destroy');
Route::get('info-card/{infocard}/edit', 'InfoCardController@edit')->name('info-card.edit');
Route::put('info-card/{infocard}', 'InfoCardController@update')->name('info-card.update');

// Route::get('info-card/create','InfoCardController@create')->name('info-card.create');
// 
// ministry
Route::get('current-ministry', 'CurrentMinistryController@index')->name('current-ministry.index');
Route::post('current-ministry', 'CurrentMinistryController@store')->name('current-ministry.store');
Route::delete('current-ministry/{currentMinistry}', 'CurrentMinistryController@destroy')->name('current-ministry.destroy');
Route::get('current-ministry/{currentMinistry}/edit', 'CurrentMinistryController@edit')->name('current-ministry.edit');
Route::put('current-ministry/{currentMinistry}', 'CurrentMinistryController@update')->name('current-ministry.update');

//
Route::get('province-head', 'PrivinceHeadController@index')->name('province-head.index');
Route::post('province-head', 'PrivinceHeadController@store')->name('province-head.store');
Route::delete('province-head/{provinceHead}', 'PrivinceHeadController@destroy')->name('province-head.destroy');
Route::get('province-head/{provinceHead}/edit', 'PrivinceHeadController@edit')->name('province-head.edit');
Route::put('province-head/{provinceHead}', 'PrivinceHeadController@update')->name('province-head.update');

// 
Route::get('assembly-member', 'StateAssemblyMembersController@index')->name('assembly-member.index');
Route::post('assembly-member', 'StateAssemblyMembersController@store')->name('assembly-member.store');
Route::delete('assembly-member/{assemblyMember}', 'StateAssemblyMembersController@destroy')->name('assembly-member.destroy');
Route::get('assembly-member/{assemblyMember}/edit', 'StateAssemblyMembersController@edit')->name('assembly-member.edit');
Route::put('assembly-member/{assemblyMember}', 'StateAssemblyMembersController@update')->name('assembly-member.update');


// 
Route::get('geographical-population', 'GeographicalAreaPopulationController@index')->name('geographical-population.index');
Route::post('geographical-population', 'GeographicalAreaPopulationController@store')->name('geographical-population.store');
Route::delete('geographical-population/{geographicalPopulation}', 'GeographicalAreaPopulationController@destroy')->name('geographical-population.destroy');
Route::get('geographical-population/{geographicalPopulation}/edit', 'GeographicalAreaPopulationController@edit')->name('geographical-population.edit');
Route::put('geographical-population/{geographicalPopulation}', 'GeographicalAreaPopulationController@update')->name('geographical-population.update');



// ==============unit 3=========
// 
Route::get('economic-indicator', 'EconomicIndicatorController@index')->name('economic-indicator.index');
Route::post('economic-indicator', 'EconomicIndicatorController@store')->name('economic-indicator.store');
Route::delete('economic-indicator/{economicIndicator}', 'EconomicIndicatorController@destroy')->name('economic-indicator.destroy');
Route::get('economic-indicator/{economicIndicator}/edit', 'EconomicIndicatorController@edit')->name('economic-indicator.edit');
Route::put('economic-indicator/{economicIndicator}', 'EconomicIndicatorController@update')->name('economic-indicator.update');

// 
Route::get('revenue', 'RevenueController@index')->name('revenue.index');
Route::post('revenue', 'RevenueController@store')->name('revenue.store');
Route::delete('revenue/{revenue}', 'RevenueController@destroy')->name('revenue.destroy');
Route::get('revenue/{revenue}/edit', 'RevenueController@edit')->name('revenue.edit');
Route::put('revenue/{revenue}', 'RevenueController@update')->name('revenue.update');

// 
Route::get('budget-resource', 'BudgetResourceStatusController@index')->name('budget-resource.index');
Route::post('budget-resource', 'BudgetResourceStatusController@store')->name('budget-resource.store');
Route::delete('budget-resource/{budgetResource}', 'BudgetResourceStatusController@destroy')->name('budget-resource.destroy');
Route::get('budget-resource/{budgetResource}/edit', 'BudgetResourceStatusController@edit')->name('budget-resource.edit');
Route::put('budget-resource/{budgetResource}', 'BudgetResourceStatusController@update')->name('budget-resource.update');

// 
Route::get('employeement-status', 'EmployeementStatusController@index')->name('employeement-status.index');
Route::post('employeement-status', 'EmployeementStatusController@store')->name('employeement-status.store');
Route::delete('employeement-status/{employeementStatus}', 'EmployeementStatusController@destroy')->name('employeement-status.destroy');
Route::get('employeement-status/{employeementStatus}/edit', 'EmployeementStatusController@edit')->name('employeement-status.edit');
Route::put('employeement-status/{employeementStatus}', 'EmployeementStatusController@update')->name('employeement-status.update');

// 
Route::get('cooperative', 'CooperativeController@index')->name('cooperative.index');
Route::post('cooperative', 'CooperativeController@store')->name('cooperative.store');
Route::delete('cooperative/{cooperative}', 'CooperativeController@destroy')->name('cooperative.destroy');
Route::get('cooperative/{cooperative}/edit', 'CooperativeController@edit')->name('cooperative.edit');
Route::put('cooperative/{cooperative}', 'CooperativeController@update')->name('cooperative.update');


// 
Route::get('revenue-sharing', 'RevenueSharingController@index')->name('revenue-sharing.index');
Route::post('revenue-sharing', 'RevenueSharingController@store')->name('revenue-sharing.store');
Route::delete('revenue-sharing/{revenueSharing}', 'RevenueSharingController@destroy')->name('revenue-sharing.destroy');
Route::get('revenue-sharing/{revenueSharing}/edit', 'RevenueSharingController@edit')->name('revenue-sharing.edit');
Route::put('revenue-sharing/{revenueSharing}', 'RevenueSharingController@update')->name('revenue-sharing.update');

// 
Route::get('total-budget', 'TotalBudgetController@index')->name('total-budget.index');
Route::post('total-budget', 'TotalBudgetController@store')->name('total-budget.store');
Route::delete('total-budget/{totalBudget}', 'TotalBudgetController@destroy')->name('total-budget.destroy');
Route::get('total-budget/{totalBudget}/edit', 'TotalBudgetController@edit')->name('total-budget.edit');
Route::put('total-budget/{totalBudget}', 'TotalBudgetController@update')->name('total-budget.update');


// unit 4
// 
Route::get('total-student', 'TotalStudentController@index')->name('total-student.index');
Route::post('total-student', 'TotalStudentController@store')->name('total-student.store');
Route::delete('total-student/{totalStudent}', 'TotalStudentController@destroy')->name('total-student.destroy');
Route::get('total-student/{totalStudent}/edit', 'TotalStudentController@edit')->name('total-student.edit');
Route::put('total-student/{totalStudent}', 'TotalStudentController@update')->name('total-student.update');

// 
Route::get('district-student', 'DistrictStudentController@index')->name('district-student.index');
Route::post('district-student', 'DistrictStudentController@store')->name('district-student.store');
Route::delete('districtl-student/{districtStudent}', 'DistrictStudentController@destroy')->name('district-student.destroy');
Route::get('district-student/{districtStudent}/edit', 'DistrictStudentController@edit')->name('district-student.edit');
Route::put('district-student/{districtStudent}', 'DistrictStudentController@update')->name('district-student.update');

// Unit 5
// 
Route::get('proud-project', 'ProudProjectController@index')->name('proud-project.index');
Route::post('proud-project', 'ProudProjectController@store')->name('proud-project.store');
Route::delete('proud-project/{proudProject}', 'ProudProjectController@destroy')->name('proud-project.destroy');
Route::get('proud-project/{proudProject}/edit', 'ProudProjectController@edit')->name('proud-project.edit');
Route::put('proud-project/{proudProject}', 'ProudProjectController@update')->name('proud-project.update');

// 
Route::get('road-network', 'RoadNetworkController@index')->name('road-network.index');
Route::post('road-network', 'RoadNetworkController@store')->name('road-network.store');
Route::delete('road-network/{roadNetwork}', 'RoadNetworkController@destroy')->name('road-network.destroy');
Route::get('road-network/{roadNetwork}/edit', 'RoadNetworkController@edit')->name('road-network.edit');
Route::put('road-network/{roadNetwork}', 'RoadNetworkController@update')->name('road-network.update');

// 
Route::get('airport', 'AirportController@index')->name('airport.index');
Route::post('airport', 'AirportController@store')->name('airport.store');
Route::delete('airport/{airport}', 'AirportController@destroy')->name('airport.destroy');
Route::get('airport/{airport}/edit', 'AirportController@edit')->name('airport.edit');
Route::put('airport/{airport}', 'AirportController@update')->name('airport.update');

// 
Route::get('electricity-access', 'ElectricityAccessController@index')->name('electricity-access.index');
Route::post('electricity-access', 'ElectricityAccessController@store')->name('electricity-access.store');
Route::delete('electricity-access/{electricityAccess}', 'ElectricityAccessController@destroy')->name('electricity-access.destroy');
Route::get('electricity-access/{electricityAccess}/edit', 'ElectricityAccessController@edit')->name('electricity-access.edit');
Route::put('electricity-access/{electricityAccess}', 'ElectricityAccessController@update')->name('electricity-access.update');

// 
Route::get('province-road', 'ProvinceRoadController@index')->name('province-road.index');
Route::post('province-road', 'ProvinceRoadController@store')->name('province-road.store');
Route::delete('province-road/{provinceRoad}', 'ProvinceRoadController@destroy')->name('province-road.destroy');
Route::get('province-road/{provinceRoad}/edit', 'ProvinceRoadController@edit')->name('province-road.edit');
Route::put('province-road/{provinceRoad}', 'ProvinceRoadController@update')->name('province-road.update');

// 
Route::get('province-road-type', 'ProvinceRoadTypeController@index')->name('province-road-type.index');
Route::post('province-road-type', 'ProvinceRoadTypeController@store')->name('province-road-type.store');
Route::delete('province-road-type/{provinceRoadType}', 'ProvinceRoadTypeController@destroy')->name('province-road-type.destroy');
Route::get('province-road-type/{provinceRoadType}/edit', 'ProvinceRoadTypeController@edit')->name('province-road-type.edit');
Route::put('province-road-type/{provinceRoadType}', 'ProvinceRoadTypeController@update')->name('province-road-type.update');

Route::any('/{all}', function () {
    return view('app');
})->where(['all' => '.*']);



