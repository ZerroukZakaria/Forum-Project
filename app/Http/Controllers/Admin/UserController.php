<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    public function destroy(User $user) {

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User Deleted');

    }

}