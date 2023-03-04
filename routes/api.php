<?php

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::post('/questions', function (Request $request) {
    $rules = [
        'name' => 'required|string|max:255',
        'status' => 'required|max:2',
        'attempt' => 'required|integer|min:1',
    ];

    // Validate the request data
    $validator = Validator::make($request->all(), $rules);

    // If the validation fails, return the error response
    if ($validator->fails()) {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $validator->errors(),
        ], 422);
    }
    $subscription = Subscription::create([
        'name' => $request->name,
        'attempt' => $request->attempt,
    ]);

    return response()->json(
        [
            'plan' => $subscription->name,
            'message' => 'success',
        ]
    );
});

Route::get('/questions/{id?}', function (int $id = null) {
    $questions = \App\Models\Question::with('detail')
    ->when(! is_null($id), fn ($query, $id) => $query->where('id', $id))
    ->when(is_null($id), fn ($query) => $query->inRandomOrder())
    ->first();

    return response()->json($questions);
});
