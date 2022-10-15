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

// An api example
//Route::get('/blogs', function (){
//    // we pass in a php array, and it's going to parse as json
//    // So that's how we create an api
//    return response()->json([
//        'blogs'=>[
//            ['1'=>'title of number one.'],
//            ['2'=>'title of number two.'],
//            ['3'=>'title of number three.'],
//        ]
//    ]);
//});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
