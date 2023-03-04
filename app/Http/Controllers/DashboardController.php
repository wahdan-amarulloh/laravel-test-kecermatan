<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $users = \App\Models\User::query()->count();
        $histories = \App\Models\User::with('questions')->where('id', auth()->id())->get();
        debug(
            Menu::query()->with('childs')
        ->parent()
        ->when(! auth()->user()->is_admin, function ($q) {
            return $q->where('is_admin', '0');
        })->toSql()
        );

        return view('dashboard')
        ->with('users', $users)
        ->with('histories', $histories);
    }
}
