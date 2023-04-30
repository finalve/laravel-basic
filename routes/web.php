<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\BrannersController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileUploadController;


use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/edit', [ChangePasswordController::class, 'edit'])->name('pwd.edit');
// Route::get('/profile',[profileController::class,'index'])->name('profile');
Route::resource('branner', BrannersController::class);
Route::resource('profile', ProfileUploadController::class);
Route::resource('posts',PostsController::class);
Route::resource('comment', CommentController::class);
Route::resource('friend', FriendsController::class)->parameters([
    'friend' => 'friends'
]);

Route::put('/edit', [ChangePasswordController::class,'update'])->name('pwd.update');
