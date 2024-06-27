<?php

use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\auth\CustomAuthController;
use App\Http\Controllers\client\ClientPostController;
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
});

Route::prefix('/admin-posts')->group(function(){
    Route::get('/index',[PostController::class,'index'])->name('admin.post.index');
    Route::get('/create',[PostController::class,'create'])->name('admin.post.create');
    Route::post('/store',[PostController::class,'store'])->name('admin.post.store');
    Route::get('/edit/{post}',[PostController::class,'edit'])->name('admin.post.edit');
    Route::post('/update/{post}',[PostController::class,'update'])->name('admin.post.update');
    Route::get('/destroy',[PostController::class,'destroy'])->name('admin.post.destroy');
});

Route::prefix('/posts')->group(function(){
    Route::get('/index',[ClientPostController::class,'index'])->name('post.index');
    Route::get('/show-post/{post}',[ClientPostController::class,'showPost'])->name('post.show');
    Route::get('/recently-posts',[ClientPostController::class,'recentlyPosts'])->name('post.recently');
});

Route::get('/register',[CustomAuthController::class,'register'])->name('register');
Route::post('/store',[CustomAuthController::class,'store'])->name('store');
Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::post('/authenticate',[CustomAuthController::class,'authenticate'])->name('authenticate');
Route::get('/logout',[CustomAuthController::class,'logout'])->name('logout');
Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->name('dashboard');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
