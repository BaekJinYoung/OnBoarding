<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckBoardOwnership;

Route::get('/', function () {
    return view('welcome');
});

// 게시판
Route::get('/boards', [BoardController::class, 'index'])->name('boards.index');

Route::get('/boards/create', [BoardController::class, 'create'])->name('boards.create');

Route::post('/boards/store', [BoardController::class, 'store'])->name('boards.store');

// Route::get('boards/{board}',[BoardController::class, 'show'])->name("boards.show");
// Route::get('boards/{board}', [BoardController::class, 'show'])->name("boards.show")->middleware('can:view,board');
Route::get('boards/{board}')->name("boards.show")->middleware(CheckBoardOwnership::class);

Route::patch('boards/{board}', [BoardController::class, 'update'])->name('boards.update');

// 회원가입

Route::get('/register/registerService', [RegisterController::class, 'registerService'])->name('registerService');

Route::post('/register/register', [RegisterController::class, 'register'])->name('register');;

// 로그인
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/test', [TestController::class, 'test'])->name('test');

// 삭제
Route::delete('/boards/{board}', [BoardController::class, 'delete'])->name('boards.delete');
