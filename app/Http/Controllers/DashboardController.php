<?php

namespace App\Http\Controllers;

use App\Models\UserQuestion;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $users = \App\Models\User::query()->count();
        // $histories = \App\Models\User::with('questions')->where('id', auth()->id())->get();

        $histories = UserQuestion::leftJoin('question_details', 'user_question.detail_id', '=', 'question_details.id')
            ->select('user_question.*', DB::raw('(CASE WHEN user_question.answer = question_details.answer THEN 1 ELSE 0 END) as points'))
            ->where('user_id', auth()->id())
            ->get();

        return view('dashboard')
        ->with('users', $users)
        ->with('histories', $histories->groupBy('test_id'));
    }
}
