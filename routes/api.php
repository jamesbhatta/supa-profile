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
