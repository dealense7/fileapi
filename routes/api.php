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

// CRUD API of Files for Insite Example

//Store a single (POST) /api/file

//Get all (GET) /api/files

//Get a single (GET) /api/file/{id}

//Update a single (PUT) /api/file/{id}

//Delete (DELETE) /api/file/{id}

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
