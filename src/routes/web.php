<?php

use App\Events\MessageNotification;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
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
    'as' => 'forms.',
    'prefix' => 'forms',
    'middleware' => ['auth', 'ban']
], function () {
    Route::get('/', [FormController::class, 'index'])->name('index');
    Route::post('/', [FormController::class, 'store'])->name('store')->middleware('form:store');
    Route::get('/{form}/edit', [FormController::class, 'edit'])->name('edit')->middleware('form:edit');
    Route::put('/{form}', [FormController::class, 'update'])->name('update')->middleware('form:update');
    Route::delete('/{form}', [FormController::class, 'destroy'])->name('destroy')->middleware('form:destroy');
});

// ITEMS ROUTES GROUP

Route::group([
    'as' => 'items.',
    'prefix' => 'items',
    'middleware' => ['auth', 'ban']
], function () {
    Route::get('/', [ItemController::class, 'index'])->name('index');
    Route::get('/create', [ItemController::class, 'create'])->name('create');
    Route::post('/', [ItemController::class, 'store'])->name('store');
    Route::get('/{item}', [ItemController::class, 'show'])->name('show')->withoutMiddleware(['auth', 'ban']);
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

Route::group([
    'as' => 'chats.',
    'prefix' => 'chats',
    'middleware' => 'auth'
], function () {
    Route::get('/', [ChatController::class, 'index'])->name('index');
    Route::get('/create', [ChatController::class, 'create'])->name('create');
    Route::post('/', [ChatController::class, 'store'])->name('store');
    Route::get('/{chat}', [ChatController::class, 'show'])->name('show')->middleware('chat');
    Route::get('/{chat}/edit', [ChatController::class, 'edit'])->name('edit');
    //Route::put('/{chat}', [ChatController::class, 'update'])->name('update');
    Route::delete('/{chat}', [ChatController::class, 'destroy'])->name('destroy')->middleware('chat');
    Route::post('/', [ChatController::class, 'check'])->name('check');
    Route::put('/{chat}', [ChatController::class, 'message'])->name('message')->middleware('chat');
});

Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');

Route::get('/admin', [AdminProfileController::class, 'index'])->name('admin');
Route::put('/admin/ban/{user}', [AdminProfileController::class, 'userBan'])->name('admin.userBan');
Route::put('/admin/vip/{user}', [AdminProfileController::class, 'userVip'])->name('admin.userVip');
Route::get('/ban', [HomeController::class, 'ban'])->name('ban');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//broadcasting event
Route::get('/event', function (){
    event(new MessageNotification('This test broadcast message'));
});
Route::get('/listen', function (){
    return view('listen');
});
