<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PlanApiController;
use App\Http\Controllers\QuestionDetailController;
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
    ->whereHas('detail')
    ->when(! is_null($id), fn ($query, $id) => $query->where('id', $id))
    ->when(is_null($id), fn ($query) => $query->inRandomOrder())
    ->first();

    return response()->json($questions);
})->name('questions.take');

Route::apiResource('/question/detail', QuestionDetailController::class);

Route::post('/plan/user/{user}', [PlanApiController::class, 'user'])->name('plan.user');
Route::apiResource('/plan', PlanApiController::class)->names('plan');
Route::apiResource('/test', UserController::class)->names('test');
