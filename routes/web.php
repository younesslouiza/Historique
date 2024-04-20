<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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


Route::get('/',[HomeController::class,'index'] )->name('home');

Route::get('/post/{slug}',[HomeController::class,'show'])->name('post.show');

Route::get('/create/post',[HomeController::class,'create'])->name('post.create');

Route::post('/add/post',[HomeController::class,'store'])->name('post.store');

Route::get('/edit/post/{slug}',[HomeController::class,'edit'])->name('post.edit');

Route::put('/update/post/{slug}',[HomeController::class,'update'])->name('post.update');

Route::delete('/delete/post/{slug}',[HomeController::class,'delete'])->name('post.delete');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    });
});
