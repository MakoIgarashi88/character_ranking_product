<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RankingController;
use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\API\CharacterCommentController;
use App\Http\Controllers\API\ParameterController;


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

Route::get('/ranking/list', [RankingController::class, 'list']);
Route::get('/character/list', [CharacterController::class, 'searchList']);
Route::post('/character/search', [CharacterController::class, 'search']);
Route::apiResource('ranking', RankingController::class);
Route::apiResource('character', CharacterController::class);
Route::apiResource('comment', CharacterCommentController::class);
Route::apiResource('parameter', ParameterController::class);
// // top
// Route::get('ranking', 'API\RankingController@index');

// // ranking
// Route::post('ranking/store', 'API\RankingController@store');
// Route::get('ranking/list', 'API\RankingController@list');
// Route::get('ranking/show/{ranking_id}', 'API\RankingController@show');

// // character
// Route::get('character/show/{character_id}', 'API\CharacterController@show');
// Route::post('character/store', 'API\CharacterController@store');
// Route::put('character/update/{character_id}', 'API\CharacterController@update');

// // characterComment
// Route::get('comment', 'API\CharacterCommentController@index');
// Route::post('commtne/store', 'API\CharacterCommentController@store');