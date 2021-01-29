<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::middleware('auth')->group(function (){
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    Route::get('admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('admin/post/', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('admin/posts/', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::delete('admin/post/{post}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('admin/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('admin/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    Route::get('users/{user}/profile',[App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('users/{user}/update',[App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

});

