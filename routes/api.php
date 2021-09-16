<?php

use App\Http\Controllers\API\NoteController;
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


Route::get('/notes', [NoteController::class,'index']);
Route::post('/add-note', [NoteController::class,'store']);
Route::get('/edit-note/{id}', [NoteController::class,'edit']);
Route::put('/update-note/{id}',[NoteController::class,'update']);
Route::delete('/delete-note/{id}',[NoteController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
