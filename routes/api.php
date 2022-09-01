<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\EventController;

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=> 'V1', 'namespace' => 'App\Http\Controllers\Api\V1'],function(){
    Route::apiResource('/events',EventController::class);
    /*Route::get('events',function(Request $request) {
        return response()->json(['data'=> [
            [
                "id" => 1,
                "title" => "sdfsffsd",
                "description" => "ssdfsfsdfsf"
            ]
        ]
        ]);
    });
    */
    Route::get('/test', function (Request $request) {
        return response()->json(['foo' => 'baz']);
    });
});
