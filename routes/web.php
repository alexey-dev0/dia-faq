<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::resource('question', QuestionController::class)->only(['index', 'show'])->middleware('auth');
Route::resource('article', ArticleController::class)->only(['index'])->middleware('auth');

Route::view('/author', 'pages.author')->name('author');

require __DIR__.'/auth.php';
