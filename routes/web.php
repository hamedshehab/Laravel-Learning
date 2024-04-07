<?php

use App\Http\Controllers\PostController;
use Faker\Guesser\Name;
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

//? ------------------------- Static Routes -------------------------



Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class,'index'])->name('posts.index');

route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

route::post('/posts', [PostController::class, 'store'])->name('posts.store');

//Route::get('/test', [TestController::class,'firstAction']);
//Route::get('/greet', [TestController::class,'greet']);


//? ------------------------- Dynamic Routes ------------------------- 
//* dynamic routes should be in the end to avoid opening a dynamic url instead of the intended static url

Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');

route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');

route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');

//1- define a new route so the user can access it through browser
//2- define controller that reders a view
//3- define view
//4- remove and static HTML data from the view