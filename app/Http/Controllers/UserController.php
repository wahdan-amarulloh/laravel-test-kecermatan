<?php

namespace App\Http\Controllers;

use App\Models\Group;
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
        $groups = Group::whereHas('subscriptions.user', fn ($builder) => $builder->select('id')->where('id', auth()->id()))->get();

        return view('test.member')
        ->with('groups', $groups);
    }

    public function trial()
    {
        return view('test.trial');
    }
}
