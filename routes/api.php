<?php

use App\Http\Controllers\SoftSkill;
use App\Http\Controllers\HardSkill;
use App\Http\Controllers\Contact;
use App\Http\Controllers\NewLetter;
use App\Http\Controllers\Project;
use App\Http\Controllers\Technology;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('soft_skills', SoftSkill::class);
Route::apiResource('hard_skills', HardSkill::class);
Route::apiResource('contacts', Contact::class);
Route::apiResource('new_letters',NewLetter::class);
Route::apiResource('projects',Project::class);
Route::apiResource('technologies', Technology::class);