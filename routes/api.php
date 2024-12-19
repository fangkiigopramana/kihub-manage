<?php

use App\Models\Project;
use App\Models\Experience;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ExperienceResource;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/projects', function () {
    return ProjectResource::collection(Project::all());
});

Route::get('/experiences', function () {
    return ExperienceResource::collection(Experience::all());
});