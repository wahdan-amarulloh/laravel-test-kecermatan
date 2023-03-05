<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $users = \App\Models\User::query()->count();
        $histories = \App\Models\User::with('questions')->where('id', auth()->id())->get();

        $question = \App\Models\Question::find(1);
        $user = \App\Models\User::find(1);
        $answer = 'B';

        $user->questions()->attach($question->id, ['answer' => 'A','detail_id' => '1']);

        return view('dashboard')
        ->with('users', $users)
        ->with('histories', $histories);
    }
}
