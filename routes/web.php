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

Route::post('/Comment/add', [App\Http\Controllers\CommentsController::class, 'create'])->name('AddComment')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
// Route::get('admin/blog/', [App\Http\Controllers\AdminController::class, 'blogFilter'])->name('blogFilter')->middleware('admin');
Route::get('admin/blog/author/', [App\Http\Controllers\AdminController::class, 'blogFilter'])->name('blogFilterAuthor')->middleware('admin');
Route::get('admin/deleteblog', [App\Http\Controllers\AdminController::class, 'deleteblog'])->name('deleteblog')->middleware('admin');
Route::get('admin/blog/{title}', [App\Http\Controllers\AdminController::class, 'blog'])->name('adminBlog')->middleware('admin');
Route::get('admin/author/', [App\Http\Controllers\AdminController::class, 'author'])->name('adminAuthor')->middleware('admin');
Route::get('admin/users/', [App\Http\Controllers\AdminController::class, 'users'])->name('adminUser')->middleware('admin');
Route::post('admin/user/delete', [App\Http\Controllers\AdminController::class, 'CreateUsers'])->name('adminUserDelete')->middleware('admin');