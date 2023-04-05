<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\TagController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\UserThreadController;
use App\Http\Controllers\Pages\ReplyController;
use App\Http\Controllers\Pages\FollowController;
use App\Http\Controllers\Pages\ThreadController;
use App\Http\Controllers\Pages\ProfileController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Dashboard\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require 'admin.php';

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ThreadController::class, 'index'])->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'threads', 'as' => 'threads.'], function () {

    //Threads
    /* Name: Threads
     * Url : /threads
     * Route : threads.
     */
    Route::get('/', [ThreadController::class, 'index'])->name('index');
    Route::get('/create', [ThreadController::class, 'create'])->name('create');
    Route::post('/', [ThreadController::class, 'store'])->name('store');
    Route::get('/{thread:slug}/edit', [ThreadController::class, 'edit'])->name('edit');
    Route::post('/{thread:slug}', [ThreadController::class, 'update'])->name('update');
    Route::get('/{category:slug}/{thread:slug}', [ThreadController::class, 'show'])->name('show');
    Route::get('/search', [ThreadController::class, 'search'])->name('search');
    Route::get('/category', [CategoryController::class, 'index'])->name('categories');
    Route::get('/no-replies', [ThreadController::class, 'noReply'])->name('no-replies');
    Route::get('/no-likes', [ThreadController::class, 'noLike'])->name('no-likes');
    Route::delete('/{thread:slug}', [ThreadController::class, 'destroy'])->name('delete');
    
    Route::get('/{category:slug}/{thread:slug}/subscribe', [ThreadController::class, 'subscribe'])->name('subscribe');
    Route::get('/{category:slug}/{thread:slug}/unsubscribe', [ThreadController::class, 'unsubscribe'])->name('unsubscribe');



    Route::group(['as' => 'tags.'], function () {
        Route::get('/{tag:slug}', [TagController::class, 'index'])->name('index');
    });
    // Route::group(['as' => 'categories.'], function () {
    //     Route::get('/{category:slug}', [ThreadController::class, 'index'])->name('index');
    // });
});


Route::group(['prefix' => 'replies', 'as' => 'replies.'], function () {
    //Replies
    /* Name: Replies
     * Url : /replies
     * Route : replies.
     */
    Route::post('/', [ReplyController::class, 'store'])->name('store');
    Route::get('/{reply}/edit', [ReplyController::class, 'edit'])->name('edit');
    Route::put('/{reply}', [ReplyController::class, 'update'])->name('update');
    Route::delete('/{reply}', [ReplyController::class, 'destroy'])->name('delete');
    Route::get('reply/{id}/{type}', [ReplyController::class, 'redirect'])->name('replyAble');
});


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    /* Name: Notifications
     * Url: /dashboard/notifications*
     * Route: dashboard.notifications*
     */
    Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
    });
    /* Name: Notifications
     * Url: /dashboard/threads*
     * Route: dashboard.threads*
     */
    Route::group(['prefix' => 'threads', 'as' => 'threads.'], function () {
        Route::get('/', [UserThreadController::class, 'index'])->name('index');
    });
});

// Profile
Route::get('user/{user:username}', [ProfileController::class, 'show'])->name('profile');

// Follows
Route::post('user/{user:username}/follow', [FollowController::class, 'store'])->name('follow');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/dashboard/categories/index', [PageController::class, 'categoriesIndex'])->name('categories.index');
// Route::get('/dashboard/categories/create', [PageController::class, 'categoriesCreate'])->name('categories.create');

// Route::get('/dashboard/threads/index', [PageController::class, 'threadsIndex'])->name('threads.index');
// Route::get('/dashboard/threads/create', [PageController::class, 'threadsCreate'])->name('threads.create');
