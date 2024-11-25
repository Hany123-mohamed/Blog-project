<?php

use App\Http\Controllers\PostController;
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

Route::get( '/', function(){
    return view(view:'welcome');
});
Route::get('/Posts', [PostController::class,'index'])->name(name: 'posts.index');

Route::get('/Posts/create',[PostController::class,'create'])->name(name:'posts.create');

Route::post('/Posts',[PostController::class,'store'])->name(name:'posts.store');

Route::get('/Posts/{post}', [PostController::class,'show'])->name(name:'posts.show' );

Route::get('/Posts/{post}/edit', [PostController::class,'edit'])->name(name:'posts.edit');

Route::put('/Posts/{post}',[PostController::class,'update'])->name(name:'posts.update');

Route::delete('/Posts/{post}',[PostController::class,'destroy'])->name(name:'posts.destroy');
//
