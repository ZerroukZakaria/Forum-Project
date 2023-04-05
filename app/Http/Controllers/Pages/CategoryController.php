<?php

namespace App\Http\Controllers\Pages;

use App\Models\Thread;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        // $categories= Category::all();
        $categoryThreads = [];
        $threads = Thread::all();

        

        foreach ($threads as $thread) {
                if($category === $thread->category());
                    dd($thread);
                    array_push($categoryThreads, $thread);
                    
            
            }
        

        return view('pages.categories.index', [
            'threads' => $categoryThreads,
        ]);
    }
}
