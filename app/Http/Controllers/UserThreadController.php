<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserThreadController extends Controller
{
    public function index()
    {
        $threads = Auth::user()->threads();
        return view('dashboard.threads.index', [
            'threads' => $threads
        ]);
    }
}
