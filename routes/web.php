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
Route::get('district-national-census', 'DistrictNationalCensusController@index')->name('district-national-census.index');
Route::post('district-national-census', 'DistrictNationalCensusController@store')->name('district-national-census.store');
Route::delete('district-national-census/{districtNationalCensus}', 'DistrictNationalCensusController@destroy')->name('district-national-census.destroy');
Route::get('district-national-census/{districtNationalCensus}/edit', 'DistrictNationalCensusController@edit')->name('district-national-census.edit');
Route::put('district-national-census/{districtNationalCensus}', 'DistrictNationalCensusController@update')->name('district-national-census.update');

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




// unit -2
// 
Route::get('geographical-population', 'GeographicalAreaPopulationController@index')->name('geographical-population.index');
Route::post('geographical-population', 'GeographicalAreaPopulationController@store')->name('geographical-population.store');
Route::delete('geographical-population/{geographicalPopulation}', 'GeographicalAreaPopulationController@destroy')->name('geographical-population.destroy');
Route::get('geographical-population/{geographicalPopulation}/edit', 'GeographicalAreaPopulationController@edit')->name('geographical-population.edit');
Route::put('geographical-population/{geographicalPopulation}', 'GeographicalAreaPopulationController@update')->name('geographical-population.update');


// 
Route::get('national-population', 'NationalPopulationController@index')->name('national-population.index');
Route::post('national-population', 'NationalPopulationController@store')->name('national-population.store');
Route::delete('national-population/{nationalPopulation}', 'NationalPopulationController@destroy')->name('national-population.destroy');
Route::get('national-population/{nationalPopulation}/edit', 'NationalPopulationController@edit')->name('national-population.edit');
Route::put('national-population/{nationalPopulation}', 'NationalPopulationController@update')->name('national-population.update');


// 
Route::get('national-population-census', 'NationalPopulationCensusController@index')->name('national-population-census.index');
Route::post('national-population-census', 'NationalPopulationCensusController@store')->name('national-population-census.store');
Route::delete('national-population-census/{nationalPopulationCensus}', 'NationalPopulationCensusController@destroy')->name('national-population-census.destroy');
Route::get('national-population-census/{nationalPopulationCensus}/edit', 'NationalPopulationCensusController@edit')->name('national-population-census.edit');
Route::put('national-population-census/{nationalPopulationCensus}', 'NationalPopulationCensusController@update')->name('national-population-census.update');

// 
Route::get('district-wise-population', 'DistrictWisePopulationController@index')->name('district-wise-population.index');
Route::post('district-wise-population', 'DistrictWisePopulationController@store')->name('district-wise-population.store');
Route::delete('district-wise-population/{districtWisePopulation}', 'DistrictWisePopulationController@destroy')->name('district-wise-population.destroy');
Route::get('district-wise-population/{districtWisePopulation}/edit', 'DistrictWisePopulationController@edit')->name('district-wise-population.edit');
Route::put('district-wise-population/{districtWisePopulation}', 'DistrictWisePopulationController@update')->name('district-wise-population.update');

// 
Route::get('district-population', 'DistrictPopulationController@index')->name('district-population.index');
Route::post('district-population', 'DistrictPopulationController@store')->name('district-population.store');
Route::delete('district-population/{districtPopulation}', 'DistrictPopulationController@destroy')->name('district-population.destroy');
Route::get('district-population/{districtPopulation}/edit', 'DistrictPopulationController@edit')->name('district-population.edit');
Route::put('district-population/{districtPopulation}', 'DistrictPopulationController@update')->name('district-population.update');

// 
Route::get('religion-population', 'ReligionPopulationController@index')->name('religion-population.index');
Route::post('religion-population', 'ReligionPopulationController@store')->name('religion-population.store');
Route::delete('religion-population/{religionPopulation}', 'ReligionPopulationController@destroy')->name('religion-population.destroy');
Route::get('religion-population/{religionPopulation}/edit', 'ReligionPopulationController@edit')->name('religion-population.edit');
Route::put('religion-population/{religionPopulation}', 'ReligionPopulationController@update')->name('religion-population.update');

// 
Route::get('province-population', 'ProvincePopulationController@index')->name('province-population.index');
Route::post('province-population', 'ProvincePopulationController@store')->name('province-population.store');
Route::delete('province-population/{provincePopulation}', 'ProvincePopulationController@destroy')->name('province-population.destroy');
Route::get('province-population/{provincePopulation}/edit', 'ProvincePopulationController@edit')->name('province-population.edit');
Route::put('province-population/{provincePopulation}', 'ProvincePopulationController@update')->name('province-population.update');

// 
Route::get('cast-population', 'CastPopulationController@index')->name('cast-population.index');
Route::post('cast-population', 'CastPopulationController@store')->name('cast-population.store');
Route::delete('cast-population/{castPopulation}', 'CastPopulationController@destroy')->name('cast-population.destroy');
Route::get('cast-population/{castPopulation}/edit', 'CastPopulationController@edit')->name('cast-population.edit');
Route::put('cast-population/{castPopulation}', 'CastPopulationController@update')->name('cast-population.update');



// 
Route::get('language-population', 'LanguagePopulationController@index')->name('language-population.index');
Route::post('language-population', 'LanguagePopulationController@store')->name('language-population.store');
Route::delete('language-population/{languagePopulation}', 'LanguagePopulationController@destroy')->name('language-population.destroy');
Route::get('language-population/{languagePopulation}/edit', 'LanguagePopulationController@edit')->name('language-population.edit');
Route::put('language-population/{languagePopulation}', 'LanguagePopulationController@update')->name('language-population.update');


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
Route::get('goverment-school-student', 'GovermentSchoolStudentController@index')->name('goverment-school-student.index');
Route::post('goverment-school-student', 'GovermentSchoolStudentController@store')->name('goverment-school-student.store');
Route::delete('goverment-school-student/{govermentSchoolStudent}', 'GovermentSchoolStudentController@destroy')->name('goverment-school-student.destroy');
Route::get('goverment-school-student/{govermentSchoolStudent}/edit', 'GovermentSchoolStudentController@edit')->name('goverment-school-student.edit');
Route::put('goverment-school-student/{govermentSchoolStudent}', 'GovermentSchoolStudentController@update')->name('goverment-school-student.update');


// 
Route::get('balbikash', 'BalbikasController@index')->name('balbikash.index');
Route::post('balbikash', 'BalbikasController@store')->name('balbikash.store');
Route::delete('balbikash/{balbikas}', 'BalbikasController@destroy')->name('balbikash.destroy');
Route::get('balbikash/{balbikas}/edit', 'BalbikasController@edit')->name('balbikash.edit');
Route::put('balbikash/{balbikas}', 'BalbikasController@update')->name('balbikash.update');

// 
Route::get('district-student', 'DistrictStudentController@index')->name('district-student.index');
Route::post('district-student', 'DistrictStudentController@store')->name('district-student.store');
Route::delete('districtl-student/{districtStudent}', 'DistrictStudentController@destroy')->name('district-student.destroy');
Route::get('district-student/{districtStudent}/edit', 'DistrictStudentController@edit')->name('district-student.edit');
Route::put('district-student/{districtStudent}', 'DistrictStudentController@update')->name('district-student.update');


// 
Route::get('dalit-student', 'DalitStudentController@index')->name('dalit-student.index');
Route::post('dalit-student', 'DalitStudentController@store')->name('dalit-student.store');
Route::delete('dalitl-student/{dalitStudent}', 'DalitStudentController@destroy')->name('dalit-student.destroy');
Route::get('dalit-student/{dalitStudent}/edit', 'DalitStudentController@edit')->name('dalit-student.edit');
Route::put('dalit-student/{dalitStudent}', 'DalitStudentController@update')->name('dalit-student.update');


// 
Route::get('janjati-student', 'JanjatiStudentController@index')->name('janjati-student.index');
Route::post('janjati-student', 'JanjatiStudentController@store')->name('janjati-student.store');
Route::delete('janjatil-student/{janjatiStudent}', 'JanjatiStudentController@destroy')->name('janjati-student.destroy');
Route::get('janjati-student/{janjatiStudent}/edit', 'JanjatiStudentController@edit')->name('janjati-student.edit');
Route::put('janjati-student/{janjatiStudent}', 'JanjatiStudentController@update')->name('janjati-student.update');

// 
Route::get('goverment-teacher', 'GovermentTeacherController@index')->name('goverment-teacher.index');
Route::post('goverment-teacher', 'GovermentTeacherController@store')->name('goverment-teacher.store');
Route::delete('goverment-teacher/{govermentTeacher}', 'GovermentTeacherController@destroy')->name('goverment-teacher.destroy');
Route::get('goverment-teacher/{govermentTeacher}/edit', 'GovermentTeacherController@edit')->name('goverment-teacher.edit');
Route::put('goverment-teacher/{govermentTeacher}', 'GovermentTeacherController@update')->name('goverment-teacher.update');

// 
Route::get('teacher-ratio', 'TeacherRatioController@index')->name('teacher-ratio.index');
Route::post('teacher-ratio', 'TeacherRatioController@store')->name('teacher-ratio.store');
Route::delete('teacher-ratio/{teacherRatio}', 'TeacherRatioController@destroy')->name('teacher-ratio.destroy');
Route::get('teacher-ratio/{teacherRatio}/edit', 'TeacherRatioController@edit')->name('teacher-ratio.edit');
Route::put('teacher-ratio/{teacherRatio}', 'TeacherRatioController@update')->name('teacher-ratio.update');


// 
Route::get('hospital', 'HospitalController@index')->name('hospital.index');
Route::post('hospital', 'HospitalController@store')->name('hospital.store');
Route::delete('hospital/{hospital}', 'HospitalController@destroy')->name('hospital.destroy');
Route::get('hospital/{hospital}/edit', 'HospitalController@edit')->name('hospital.edit');
Route::put('hospital/{hospital}', 'HospitalController@update')->name('hospital.update');


// GovermentHospitalController
Route::get('goverment-hospital', 'GovermentHospitalController@index')->name('goverment-hospital.index');
Route::post('goverment-hospital', 'GovermentHospitalController@store')->name('goverment-hospital.store');
Route::delete('goverment-hospital/{govermentHospital}', 'GovermentHospitalController@destroy')->name('goverment-hospital.destroy');
Route::get('goverment-hospital/{govermentHospital}/edit', 'GovermentHospitalController@edit')->name('goverment-hospital.edit');
Route::put('goverment-hospital/{govermentHospital}', 'GovermentHospitalController@update')->name('goverment-hospital.update');


// 

Route::get('private-hospital', 'PrivateHospitalController@index')->name('private-hospital.index');
Route::post('private-hospital', 'PrivateHospitalController@store')->name('private-hospital.store');
Route::delete('private-hospital/{privateHospital}', 'PrivateHospitalController@destroy')->name('private-hospital.destroy');
Route::get('private-hospital/{privateHospital}/edit', 'PrivateHospitalController@edit')->name('private-hospital.edit');
Route::put('private-hospital/{privateHospital}', 'PrivateHospitalController@update')->name('private-hospital.update');


// AyourbedController
Route::get('ayourbed-hospital', 'AyourbedController@index')->name('ayourbed-hospital.index');
Route::post('ayourbed-hospital', 'AyourbedController@store')->name('ayourbed-hospital.store');
Route::delete('ayourbed-hospital/{ayourbed}', 'AyourbedController@destroy')->name('ayourbed-hospital.destroy');
Route::get('ayourbed-hospital/{ayourbed}/edit', 'AyourbedController@edit')->name('ayourbed-hospital.edit');
Route::put('ayourbed-hospital/{ayourbed}', 'AyourbedController@update')->name('ayourbed-hospital.update');

// MortalityController
Route::get('mortality', 'MortalityController@index')->name('mortality.index');
Route::post('mortality', 'MortalityController@store')->name('mortality.store');
Route::delete('mortality/{mortality}', 'MortalityController@destroy')->name('mortality.destroy');
Route::get('mortality/{mortality}/edit', 'MortalityController@edit')->name('mortality.edit');
Route::put('mortality/{mortality}', 'MortalityController@update')->name('mortality.update');

// DiseasController
Route::get('diseas', 'DiseasController@index')->name('diseas.index');
Route::post('diseas', 'DiseasController@store')->name('diseas.store');
Route::delete('diseas/{diseas}', 'DiseasController@destroy')->name('diseas.destroy');
Route::get('diseas/{diseas}/edit', 'DiseasController@edit')->name('diseas.edit');
Route::put('diseas/{diseas}', 'DiseasController@update')->name('diseas.update');

// HealthInsuranceController
Route::get('helth-insurance', 'HealthInsuranceController@index')->name('helth-insurance.index');
Route::post('helth-insurance', 'HealthInsuranceController@store')->name('helth-insurance.store');
Route::delete('helth-insurance/{healthInsurance}', 'HealthInsuranceController@destroy')->name('helth-insurance.destroy');
Route::get('helth-insurance/{healthInsurance}/edit', 'HealthInsuranceController@edit')->name('helth-insurance.edit');
Route::put('helth-insurance/{healthInsurance}', 'HealthInsuranceController@update')->name('helth-insurance.update');

// HelthFlowController
Route::get('helth-flow', 'HelthFlowController@index')->name('helth-flow.index');
Route::post('helth-flow', 'HelthFlowController@store')->name('helth-flow.store');
Route::delete('helth-flow/{helthFlow}', 'HelthFlowController@destroy')->name('helth-flow.destroy');
Route::get('helth-flow/{helthFlow}/edit', 'HelthFlowController@edit')->name('helth-flow.edit');
Route::put('helth-flow/{helthFlow}', 'HelthFlowController@update')->name('helth-flow.update');

// 
Route::get('college', 'CollegeController@index')->name('college.index');
Route::post('college', 'CollegeController@store')->name('college.store');
Route::delete('college/{college}', 'CollegeController@destroy')->name('college.destroy');
Route::get('college/{college}/edit', 'CollegeController@edit')->name('college.edit');
Route::put('college/{college}', 'CollegeController@update')->name('college.update');

// NutritionController
Route::get('nutrition', 'NutritionController@index')->name('nutrition.index');
Route::post('nutrition', 'NutritionController@store')->name('nutrition.store');
Route::delete('nutrition/{nutrition}', 'NutritionController@destroy')->name('nutrition.destroy');
Route::get('nutrition/{nutrition}/edit', 'NutritionController@edit')->name('nutrition.edit');
Route::put('nutrition/{nutrition}', 'NutritionController@update')->name('nutrition.update');

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

// 
Route::get('elecricity-generate', 'ElectricityGenerateController@index')->name('elecricity-generate.index');
Route::post('elecricity-generate', 'ElectricityGenerateController@store')->name('elecricity-generate.store');
Route::delete('elecricity-generate/{electricityGenerate}', 'ElectricityGenerateController@destroy')->name('elecricity-generate.destroy');
Route::get('elecricity-generate/{electricityGenerate}/edit', 'ElectricityGenerateController@edit')->name('elecricity-generate.edit');
Route::put('elecricity-generate/{electricityGenerate}', 'ElectricityGenerateController@update')->name('elecricity-generate.update');

// 
Route::get('telecomunication', 'TelecomunicationController@index')->name('telecomunication.index');
Route::post('telecomunication', 'TelecomunicationController@store')->name('telecomunication.store');
Route::delete('telecomunication/{telecomunication}', 'TelecomunicationController@destroy')->name('telecomunication.destroy');
Route::get('telecomunication/{telecomunication}/edit', 'TelecomunicationController@edit')->name('telecomunication.edit');
Route::put('telecomunication/{telecomunication}', 'TelecomunicationController@update')->name('telecomunication.update');

// 
Route::get('news-paper', 'NewsPaperController@index')->name('news-paper.index');
Route::post('news-paper', 'NewsPaperController@store')->name('news-paper.store');
Route::delete('news-paper/{newsPaper}', 'NewsPaperController@destroy')->name('news-paper.destroy');
Route::get('news-paper/{newsPaper}/edit', 'NewsPaperController@edit')->name('news-paper.edit');
Route::put('news-paper/{newsPaper}', 'NewsPaperController@update')->name('news-paper.update');

// 
Route::get('radio', 'RadioController@index')->name('radio.index');
Route::post('radio', 'RadioController@store')->name('radio.store');
Route::delete('radio/{radio}', 'RadioController@destroy')->name('radio.destroy');
Route::get('radio/{radio}/edit', 'RadioController@edit')->name('radio.edit');
Route::put('radio/{radio}', 'RadioController@update')->name('radio.update');


// Unit 6
// 
Route::get('province-business', 'ProvinceBusinesslController@index')->name('province-business.index');
Route::post('province-business', 'ProvinceBusinesslController@store')->name('province-business.store');
Route::delete('province-business/{provinceBusiness}', 'ProvinceBusinesslController@destroy')->name('province-business.destroy');
Route::get('province-business/{provinceBusiness}/edit', 'ProvinceBusinesslController@edit')->name('province-business.edit');
Route::put('province-business/{provinceBusiness}', 'ProvinceBusinesslController@update')->name('province-business.update');

// 
Route::get('supa-business', 'SupaBusinessController@index')->name('supa-business.index');
Route::post('supa-business', 'SupaBusinessController@store')->name('supa-business.store');
Route::delete('supa-business/{supaBusiness}', 'SupaBusinessController@destroy')->name('supa-business.destroy');
Route::get('supa-business/{supaBusiness}/edit', 'SupaBusinessController@edit')->name('supa-business.edit');
Route::put('supa-business/{supaBusiness}', 'SupaBusinessController@update')->name('supa-business.update');


// Unit 7

// 
Route::get('ownership', 'OwnershipController@index')->name('ownership.index');
Route::post('ownership', 'OwnershipController@store')->name('ownership.store');
Route::delete('ownership/{ownership}', 'OwnershipController@destroy')->name('ownership.destroy');
Route::get('ownership/{ownership}/edit', 'OwnershipController@edit')->name('ownership.edit');
Route::put('ownership/{ownership}', 'OwnershipController@update')->name('ownership.update');

// 
Route::get('land-uses', 'LandUsesController@index')->name('land-uses.index');
Route::post('land-uses', 'LandUsesController@store')->name('land-uses.store');
Route::delete('land-uses/{landUses}', 'LandUsesController@destroy')->name('land-uses.destroy');
Route::get('land-uses/{landUses}/edit', 'LandUsesController@edit')->name('land-uses.edit');
Route::put('land-uses/{landUses}', 'LandUsesController@update')->name('land-uses.update');

// 
Route::get('agriculture-produce', 'AgricultureProduceController@index')->name('agriculture-produce.index');
Route::post('agriculture-produce', 'AgricultureProduceController@store')->name('agriculture-produce.store');
Route::delete('agriculture-produce/{agricultureProduce}', 'AgricultureProduceController@destroy')->name('agriculture-produce.destroy');
Route::get('agriculture-produce/{agricultureProduce}/edit', 'AgricultureProduceController@edit')->name('agriculture-produce.edit');
Route::put('agriculture-produce/{agricultureProduce}', 'AgricultureProduceController@update')->name('agriculture-produce.update');

Route::get('irrigation', 'IrrigationController@index')->name('irrigation.index');
Route::post('irrigation', 'IrrigationController@store')->name('irrigation.store');
Route::delete('irrigation/{irrigation}', 'IrrigationController@destroy')->name('irrigation.destroy');
Route::get('irrigation/{irrigation}/edit', 'IrrigationController@edit')->name('irrigation.edit');
Route::put('irrigation/{irrigation}', 'IrrigationController@update')->name('irrigation.update');

Route::get('agricultural-production', 'AgriculturalProductionController@index')->name('agricultural-production.index');
Route::post('agricultural-production', 'AgriculturalProductionController@store')->name('agricultural-production.store');
Route::delete('agricultural-production/{agriculturalProduction}', 'AgriculturalProductionController@destroy')->name('agricultural-production.destroy');
Route::get('agricultural-production/{agriculturalProduction}/edit', 'AgriculturalProductionController@edit')->name('agricultural-production.edit');
Route::put('agricultural-production/{agriculturalProduction}', 'AgriculturalProductionController@update')->name('agricultural-production.update');


Route::get('winter-crop', 'WinterCropController@index')->name('winter-crop.index');
Route::post('winter-crop', 'WinterCropController@store')->name('winter-crop.store');
Route::delete('winter-crop/{bali}', 'WinterCropController@destroy')->name('winter-crop.destroy');
Route::get('winter-crop/{bali}/edit', 'WinterCropController@edit')->name('winter-crop.edit');
Route::put('winter-crop/{bali}', 'WinterCropController@update')->name('winter-crop.update');

Route::get('rainy-crop', 'RainyCropsController@index')->name('rainy-crop.index');
Route::post('rainy-crop', 'RainyCropsController@store')->name('rainy-crop.store');
Route::delete('rainy-crop/{bali}', 'RainyCropsController@destroy')->name('rainy-crop.destroy');
Route::get('rainy-crop/{bali}/edit', 'RainyCropsController@edit')->name('rainy-crop.edit');
Route::put('rainy-crop/{bali}', 'RainyCropsController@update')->name('rainy-crop.update');

Route::get('dalhan', 'DalhanController@index')->name('dalhan.index');
Route::post('dalhan', 'DalhanController@store')->name('dalhan.store');
Route::delete('dalhan/{bali}', 'DalhanController@destroy')->name('dalhan.destroy');
Route::get('dalhan/{bali}/edit', 'DalhanController@edit')->name('dalhan.edit');
Route::put('dalhan/{bali}', 'DalhanController@update')->name('dalhan.update');

Route::get('telhan', 'TelhanController@index')->name('telhan.index');
Route::post('telhan', 'TelhanController@store')->name('telhan.store');
Route::delete('telhan/{bali}', 'TelhanController@destroy')->name('telhan.destroy');
Route::get('telhan/{bali}/edit', 'TelhanController@edit')->name('telhan.edit');
Route::put('telhan/{bali}', 'TelhanController@update')->name('telhan.update');



Route::get('vegitable', 'VegitableController@index')->name('vegitable.index');
Route::post('vegitable', 'VegitableController@store')->name('vegitable.store');
Route::delete('vegitable/{bali}', 'VegitableController@destroy')->name('vegitable.destroy');
Route::get('vegitable/{bali}/edit', 'VegitableController@edit')->name('vegitable.edit');
Route::put('vegitable/{bali}', 'VegitableController@update')->name('vegitable.update');

Route::get('consumable-food', 'ConsumableFoodController@index')->name('consumable-food.index');
Route::post('consumable-food', 'ConsumableFoodController@store')->name('consumable-food.store');
Route::delete('consumable-food/{consumableFood}', 'ConsumableFoodController@destroy')->name('consumable-food.destroy');
Route::get('consumable-food/{consumableFood}/edit', 'ConsumableFoodController@edit')->name('consumable-food.edit');
Route::put('consumable-food/{consumableFood}', 'ConsumableFoodController@update')->name('consumable-food.update');

Route::get('required-food', 'RequireFoodController@index')->name('required-food.index');
Route::post('required-food', 'RequireFoodController@store')->name('required-food.store');
Route::delete('required-food/{requireFood}', 'RequireFoodController@destroy')->name('required-food.destroy');
Route::get('required-food/{requireFood}/edit', 'RequireFoodController@edit')->name('required-food.edit');
Route::put('required-food/{requireFood}', 'RequireFoodController@update')->name('required-food.update');

Route::get('milk-production', 'MilkProductionController@index')->name('milk-production.index');
Route::post('milk-production', 'MilkProductionController@store')->name('milk-production.store');
Route::delete('milk-production/{milkProduction}', 'MilkProductionController@destroy')->name('milk-production.destroy');
Route::get('milk-production/{milkProduction}/edit', 'MilkProductionController@edit')->name('milk-production.edit');
Route::put('milk-production/{milkProduction}', 'MilkProductionController@update')->name('milk-production.update');

// MeatProductionController
Route::get('meat-production', 'MeatProductionController@index')->name('meat-production.index');
Route::post('meat-production', 'MeatProductionController@store')->name('meat-production.store');
Route::delete('meat-production/{meatProduction}', 'MeatProductionController@destroy')->name('meat-production.destroy');
Route::get('meat-production/{meatProduction}/edit', 'MeatProductionController@edit')->name('meat-production.edit');
Route::put('meat-production/{meatProduction}', 'MeatProductionController@update')->name('meat-production.update');

// EggProductionController
Route::get('egg-production', 'EggProductionController@index')->name('egg-production.index');
Route::post('egg-production', 'EggProductionController@store')->name('egg-production.store');
Route::delete('egg-production/{eggProduction}', 'EggProductionController@destroy')->name('egg-production.destroy');
Route::get('egg-production/{eggProduction}/edit', 'EggProductionController@edit')->name('egg-production.edit');
Route::put('egg-production/{eggProduction}', 'EggProductionController@update')->name('egg-production.update');


// WoolController
Route::get('wool-production', 'WoolController@index')->name('wool-production.index');
Route::post('wool-production', 'WoolController@store')->name('wool-production.store');
Route::delete('wool-production/{wool}', 'WoolController@destroy')->name('wool-production.destroy');
Route::get('wool-production/{wool}/edit', 'WoolController@edit')->name('wool-production.edit');
Route::put('wool-production/{wool}', 'WoolController@update')->name('wool-production.update');

// CreateAnimalsTable
Route::get('animal', 'AnimalController@index')->name('animal.index');
Route::post('animal', 'AnimalController@store')->name('animal.store');
Route::delete('animal/{animal}', 'AnimalController@destroy')->name('animal.destroy');
Route::get('animal/{animal}/edit', 'AnimalController@edit')->name('animal.edit');
Route::put('animal/{animal}', 'AnimalController@update')->name('animal.update');

// 
Route::get('food-safety', 'FoodSaftyController@index')->name('food-safety.index');
Route::post('food-safety', 'FoodSaftyController@store')->name('food-safety.store');
Route::delete('food-safety/{foodSafty}', 'FoodSaftyController@destroy')->name('food-safety.destroy');
Route::get('food-safety/{foodSafty}/edit', 'FoodSaftyController@edit')->name('food-safety.edit');
Route::put('food-safety/{foodSafty}', 'FoodSaftyController@update')->name('food-safety.update');


Route::any('/{all}', function () {
    return view('app');
})->where(['all' => '.*']);



