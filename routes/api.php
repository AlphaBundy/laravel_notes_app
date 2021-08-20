<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/foo', function(Request $request) {
    $ip = $request->ip();
    $token = $request->bearerToken();

    $name = $request->input('name');

    return new Response([
        'ip' => $ip,
        'token' => $token,
        'name' => $name
    ], 201);
});

Route::get('/bar', function(Request $request) {
    $a = $_GET['a'] ?? null;
    $b = $request->query('b');

    return new Response([
        'a' => $a,
        'b' => $b
    ]);
});