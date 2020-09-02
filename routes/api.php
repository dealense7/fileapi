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

//Store a single | POST | api/files 
//Get all | GET|HEAD | api/files
//Get a single | GET|HEAD | api/files/{id}
//Update a single | PUT|PATCH | api/files/{id} 
//Edit a single | GET|HEAD | api/files/{file}/edit
//Delete | DELETE | api/files/{file}
Route::apiResource('/files', 'FileController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
