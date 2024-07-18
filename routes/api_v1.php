<?php

use App\Http\Controllers\Api\V1\RealState\PropertyController;
use App\Http\Resources\V1\Location\LocationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Client\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['localization']], function () {
    Route::get('/status', function(){
        return response()->json(__('locale.status_good'), 200);
    });

    /**
     * Auth
     */
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('user', 'AuthController@swaggerStartPoint');
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');
        Route::post('activate', 'AuthController@activateUser');
        Route::post('deactivate', 'AuthController@deActivateUser');
        Route::post('forget-password', 'AuthController@forgetPassword');
        Route::get('reset-password-email', 'AuthController@resetPasswordEmail');
        Route::post('reset-password', 'AuthController@resetPassword');
        Route::post('change-password', 'AuthController@changePassword');
        Route::put('user', 'AuthController@update');
        Route::delete('user/delete', 'AuthController@delete');
        Route::get('profile', 'AuthController@getProfile');
        Route::post('logout', 'AuthController@logout');
        Route::get('list-user-statuses', 'AuthController@listUserStatuses');
    });

    Route::apiResource('listing', PropertyController::class);
    Route::get('property-types', [PropertyController::class,'listPropertyTypes']);

    Route::group(['prefix' => 'location', 'namespace' => 'Location'], function () {
        Route::get('countries', 'LocationController@listCountries');
        Route::get('states', 'LocationController@listStates');
        Route::get('cities', 'LocationController@listCities');
    });
});
