<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Question;
use App\Models\User;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnswerRequest $request)
    {
        $request->validated();

        $question = Question::find($request->question_id);
        // $user = User::with('plan')->find($request->user_id);
        $user = User::with('plan')->where('id', $request->user_id)->first();
        $testToday = (new \App\Models\User())->todatTest($request->user_id);
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
                'batch' => $detail['batch'],
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = UserQuestion::leftJoin('question_details', 'user_question.detail_id', '=', 'question_details.id')
        ->select('batch', DB::raw('SUM((CASE WHEN user_question.answer = question_details.answer THEN 1 ELSE 0 END)) as corrects'), DB::raw('SUM((CASE WHEN user_question.answer != question_details.answer THEN 1 ELSE 0 END)) as wrongs'))
        ->where('test_id', $id)
        ->groupBy('batch')
        ->get();

        debug($detail->groupBy('batch'));

        return response()->json([
            'message' => 'success',
            'detail' => $detail->groupBy('batch'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function test(Request $request, $testId)
    {
        return UserQuestion::leftJoin('question_details', 'user_question.detail_id', '=', 'question_details.id')
        ->select('user_question.*', DB::raw('(CASE WHEN user_question.answer = question_details.answer THEN 1 ELSE 0 END) as points'))
        ->where('test_id', $testId)
        ->get();
    }
}
