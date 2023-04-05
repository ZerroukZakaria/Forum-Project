<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thread;

class AdminThreadController extends Controller
{
    public function index() {
        return view('admin.threads.index', [
            'threads' => Thread::all()
        ]);
    }

    public function destroy(Thread $thread) {

        $thread->delete();

        return redirect()->route('admin.threads.index')->with('success', 'Thread Deleted');
    }
}
