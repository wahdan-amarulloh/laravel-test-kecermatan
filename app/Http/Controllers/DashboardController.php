<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $users = \App\Models\User::query()->count();
        $histories = \App\Models\User::with('questions')->where('id', auth()->id())->get();

        return view('dashboard')
        ->with('users', $users)
        ->with('histories', $histories);
    }
}
