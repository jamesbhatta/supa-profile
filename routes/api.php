<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('info-cards', 'InfoCardController@listingApi');

Route::get('land-uses', 'LandUsesController@listingLandUses');

Route::get('local-level-population', 'LocalPopulationController@listingLocalPopulation');
Route::get('current-ministry', 'CurrentMinistryController@listingCurrentMinistry');
Route::get('province-head', 'PrivinceHeadController@listingProvinceHead');
Route::get('state-assembly-member', 'StateAssemblyMembersController@listingStateAssemblyMember');
Route::get('economic-indicator', 'EconomicIndicatorController@listingEconomicIndicator');
Route::get('revenue-sharing', 'RevenueSharingController@listingRevenueSharing');
Route::get('revenue', 'RevenueController@listingRevenue');
Route::get('budget-resource', 'BudgetResourceStatusController@listingBudgetResource');
Route::get('total-budget', 'TotalBudgetController@listingTotalBudget');
Route::get('employeement-status', 'EmployeementStatusController@listingEmployeementStatus');
Route::get('total-student', 'TotalStudentController@listingTotalStudent');

// unit-2 
Route::get('geographical-area-population', 'GeographicalAreaPopulationController@listingGeographicalAreaPopulation');
Route::get('national-population', 'NationalPopulationController@listingNationalPopulation');
Route::get('district-wise-population', 'DistrictWisePopulationController@listing');
Route::get('district-population', 'DistrictPopulationController@listing');
Route::get('religion-population', 'ReligionPopulationController@listing');
Route::get('province-population', 'ProvincePopulationController@listing');
Route::get('cast-population', 'CastPopulationController@listing');
Route::get('language-population', 'LanguagePopulationController@listing');
Route::get('local-population', 'LocalPopulationController@listing');
Route::get('population', 'PopulationController@listing');

// SahakariController
Route::get('sahakari', 'SahakariController@listing');


// Unit 4
Route::get('goverment-school-student', 'GovermentSchoolStudentController@listing');
Route::get('balbikash', 'BalbikasController@listing');
Route::get('dalit-student','DalitStudentController@listing');
Route::get('janjati-student','JanjatiStudentController@listing');
Route::get('goverment-teacher','GovermentTeacherController@listing');
Route::get('teacher-ratio','TeacherRatioController@listing');
Route::get('college','CollegeController@listing');
Route::get('hospital','HospitalController@listing');
Route::get('goverment-hospital','GovermentHospitalController@listing');
Route::get('private-hospital','PrivateHospitalController@listing');
Route::get('ayourbed-hospital','AyourbedController@listing');
Route::get('mortality','MortalityController@listing');
Route::get('diseas','DiseasController@listing');
Route::get('health-insurance','HealthInsuranceController@listing');
Route::get('health-flow','HelthFlowController@listing');
Route::get('nutrition','NutritionController@listing');
Route::get('national-population-census','NationalPopulationCensusController@listing');
Route::get('sample-school','SampleSchoolController@listing');


// unit 5
Route::get('proud-project', 'ProudProjectController@listingProudProject');
Route::get('road-network', 'RoadNetworkController@listingRoadNetwork');
Route::get('province-road-type', 'ProvinceRoadTypeController@listingProvinceRoadType');
Route::get('airport', 'AirportController@listingAirport');
Route::get('electricity-access', 'ElectricityAccessController@listingElectricityAccess');
Route::get('electricity-generate', 'ElectricityGenerateController@listingElectricityGenerate');
Route::get('telecomunication', 'TelecomunicationController@listingTelecomunication');
Route::get('news-paper', 'NewsPaperController@listingNewsPaper');
Route::get('radio', 'RadioController@listingRadio');

// Unit -6
Route::get('province-business', 'ProvinceBusinesslController@listingProvinceBusinessl');
Route::get('supa-business', 'SupaBusinessController@listingSupaBusiness');

// unit 8
Route::get('ownership', 'OwnershipController@listingOwnership');
Route::get('agriculture-produce', 'AgricultureProduceController@listofAgricultureProduce');
Route::get('irrigation', 'IrrigationController@listingIrrigation');
Route::get('agricultural-production', 'AgriculturalProductionController@listingAgriculturalProduction');
Route::get('winter-crops', 'WinterCropController@listingWinterCrop');
Route::get('rainy-crops', 'RainyCropsController@listingRainyCrops');
Route::get('dalhan', 'DalhanController@listingDalhan');
Route::get('telhan', 'TelhanController@listingTelhan');
Route::get('vegitable', 'VegitableController@listingVegitable');
Route::get('consumable-food', 'ConsumableFoodController@listingConsumableFood');
Route::get('require-food', 'RequireFoodController@listingRequireFood');
Route::get('milk-production', 'MilkProductionController@listingMilkProduction');
Route::get('meat-production', 'MeatProductionController@listingMeatProduction');
Route::get('egg-production', 'EggProductionController@listingEggProduction');
Route::get('wool-production', 'WoolController@listingWool');
Route::get('animal', 'AnimalController@listingAnimal');
Route::get('food-safety', 'FoodSaftyController@listingFoodSafty');


