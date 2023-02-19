<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'index'])
    ->name('register.index');
Route::post('register', [RegisterController::class, 'register'])
    ->name('register');

Route::group(['prefix' => 'content', 'as' => 'content.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('', [ContentController::class, 'index'])
            ->name('index');
        Route::get('generate-link', [LinkController::class, 'generateLink'])
            ->name('generate.link');
        Route::get('deactivate-link', [LinkController::class, 'deactivateLink'])
            ->name('deactivate.link');
        Route::get('pay', [PayController::class, 'pay'])
            ->name('pay');
        Route::get('history', [ContentController::class, 'history'])
            ->name('history');
    });
});

Route::get('generated-link', [LinkController::class, 'linkControl']);

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('', [UsersController::class, 'index'])
            ->name('index');
        Route::get('show/{user}', [UsersController::class, 'show'])
            ->name('show');
        Route::post('store', [UsersController::class, 'store'])
            ->name('store');
        Route::get('create', [UsersController::class, 'create'])
            ->name('create');
        Route::get('edit/{user}', [UsersController::class, 'edit'])
            ->name('edit');
        Route::patch('update/{user}', [UsersController::class, 'update'])
            ->name('update');
        Route::delete('destroy/{user}', [UsersController::class, 'destroy'])
            ->name('destroy');
    });
});


