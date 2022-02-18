<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\SearchPageController;
use App\Http\Controllers\SelectedItemController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/', [MainPageController::class, 'index'])->name('main');

Route::get('/selected_items/{item}', [SelectedItemController::class, 'index'])->name('selected_items.index');
Route::delete('/selected_items/{item}', [SelectedItemController::class, 'destroy'])->name('selected_items.destroy');

Route::group([
    'as' => 'items.',
    'prefix' => 'items',
    'middleware' => 'auth'
], function () {
    Route::get('/', [ItemController::class, 'index'])->name('index');
    Route::get('/create', [ItemController::class, 'create'])->name('create');
    Route::post('/', [ItemController::class, 'store'])->name('store');
    Route::get('/{item}', [ItemController::class, 'show'])->name('show');
    Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('edit');
    Route::put('/{item}', [ItemController::class, 'update'])->name('update');
    Route::delete('/{item}', [ItemController::class, 'destroy'])->name('destroy');
});

Route::group([
    'as' => 'search.',
    'prefix' => 'search',
], function () {
    Route::get('/', [SearchPageController::class, 'index'])->name('index');
    Route::post('/', [SearchPageController::class, 'update'])->name('update');
});

Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
