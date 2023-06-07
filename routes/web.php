<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/blog/', [App\Http\Controllers\Blogs::class, 'index'])->name('blog');

Route::get('/blog/write', function () {
    return view('blog.create');
})->name('write')->middleware('auth');

Route::post('/blog/write/create', [App\Http\Controllers\BlogCreate::class, 'create'])->name('createBlog')->middleware('auth');

Route::get('/blog/{title}', [App\Http\Controllers\Blogs::class, 'readblog']);

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('admin/blog/', [App\Http\Controllers\AdminController::class, 'blogFilter'])->name('blogFilter');
Route::get('admin/deleteblog', [App\Http\Controllers\AdminController::class, 'deleteblog'])->name('deleteblog');
Route::get('admin/blog/{title}', [App\Http\Controllers\AdminController::class, 'blog'])->name('adminBlog');
Route::get('admin/author/', [App\Http\Controllers\AdminController::class, 'author'])->name('adminAuthor');