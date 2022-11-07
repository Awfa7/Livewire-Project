<?php

use App\Http\Livewire\Calculator;
use App\Http\Livewire\CascadingDropdown;
use App\Http\Livewire\CommentTicket;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\ProductSearch;
use App\Http\Livewire\Register;
use App\Http\Livewire\TodoList;
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

Route::get('/', Home::class)->name('home');

Route::group(['middleware'=>'auth'], function () {
    Route::get('/comment-ticket', CommentTicket::class)->name('comment-ticket');
    Route::get('/counter', Counter::class)->name('counter');
    Route::get('/calculator', Calculator::class)->name('calculator');
    Route::get('/todoList', TodoList::class)->name('todoList');
    Route::get('/cascading-dropdown', CascadingDropdown::class)->name('cascading-dropdown');
    Route::get('/products', ProductSearch::class)->name('products');
});

Route::group(['middleware'=>'guest'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
});