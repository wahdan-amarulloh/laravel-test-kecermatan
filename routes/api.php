<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PlanApiController;
use App\Http\Controllers\QuestionDetailController;
use App\Http\Requests\AnswerRequest;
use App\Models\Question;
use App\Models\Subscription;
use App\Models\User;
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

// Route::post('/plan', function (Request $request) {
//     $rules = [
//         'name' => 'required|string|max:255',
//         'status' => 'required|max:2',
//         'attempt' => 'required|integer|min:1',
//     ];

//     // Validate the request data
//     $validator = Validator::make($request->all(), $rules);

//     // If the validation fails, return the error response
//     if ($validator->fails()) {
//         return response()->json([
//             'message' => 'The given data was invalid.',
//             'errors' => $validator->errors(),
//         ], 422);
//     }
//     $subscription = Subscription::create([
//         'name' => $request->name,
//         'attempt' => $request->attempt,
//     ]);

//     return response()->json(
//         [
//             'plan' => $subscription->name,
//             'message' => 'success',
//         ]
//     );
// })->name('plan.store');

Route::get('/questions/{id?}', function (int $id = null) {
    $questions = \App\Models\Question::with('detail')
    ->whereHas('detail')
    ->when(! is_null($id), fn ($query, $id) => $query->where('id', $id))
    ->when(is_null($id), fn ($query) => $query->inRandomOrder())
    ->first();

    return response()->json($questions);
})->name('questions.take');

Route::post('/answer', function (AnswerRequest $request) {
    $request->validated();

    $question = Question::find($request->question_id);
    // $user = User::with('plan')->find($request->user_id);
    $user = User::with('plan')->where('id', $request->user_id)->first();
    $testToday = (new \App\Models\User())->todatTest($request->user_id) ;
    $time = time();

    logger([count($testToday), $user->subscription_id]);

    if ($user->plan->attempt - count($testToday) <= 0) {
        return response()->json([
            'error' => 'Error',
            'message' => 'Anda sudah tidak punya kuota test untuk hari ini !',
        ]);
    }

    foreach ($request->detail_id as $detail) {
        $user->questions()->attach($question->id, [
            'answer' => $detail['answer'],
            'detail_id' => $detail['id'],
            'test_id' => $time,
            ]);
    }


    return response()->json(
        [
            'request' => $request->all(),
            'question' => $question,
            'detail' => $question->detail_id,
            'user' => $user,
            'testToday' => count($testToday),
            'message' => 'success',
        ]
    );
})->name('test.store');

Route::apiResource('/question/detail', QuestionDetailController::class);

Route::post('/plan/user/{user}', [PlanApiController::class,'user'])->name('plan.user');
Route::apiResource('/plan', PlanApiController::class)->names('plan');
Route::get('/user/test/{testId}', [UserController::class,'test'])->name('user.test');
