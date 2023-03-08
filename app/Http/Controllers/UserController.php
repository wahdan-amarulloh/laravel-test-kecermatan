<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->fastPaginate();

        return view('users.index')->with('users', $users);
    }

    public function test()
    {
        return view('test.member');
    }

    public function trial()
    {
        return view('test.trial');
    }
}
