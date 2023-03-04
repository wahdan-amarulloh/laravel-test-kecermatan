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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/questions/{id?}', function (int $id = null) {
    $questions = \App\Models\Question::with('detail')
    ->when(! is_null($id), fn ($query, $id) => $query->where('id', $id))
    ->when(is_null($id), fn ($query) => $query->inRandomOrder())
    ->first();

    return response()->json($questions);
});
