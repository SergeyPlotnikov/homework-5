<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/currencies', function () {
    $responseData = [];
    foreach (app('getCurrencies')->handle() as $item) {
        array_push($responseData, \App\Services\CurrencyPresenter::present($item));
    }
    return response()->json($responseData);
});

Route::middleware('api')->get('/currencies/unstable', function () {
    $mostChangedCurrency = app('getMostChangedCurrency')->handle();
    return response()->json(\App\Services\CurrencyPresenter::present($mostChangedCurrency));
});