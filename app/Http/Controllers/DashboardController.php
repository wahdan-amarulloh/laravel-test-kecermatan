<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $users = \App\Models\User::query()->count();
        $isAdmin = auth()->user()->is_admin;
        if ($isAdmin) {
            logger('Admin');
        }

        return view('dashboard')
        ->with('users', $users);
    }
}
