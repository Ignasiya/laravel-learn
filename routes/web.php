<?php

use App\Http\Controllers\EntityController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormProcessor;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\LibraryUserController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendFileController;
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestRedirectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', TestController::class)->name('test');

Route::get('/simple', [SimpleController::class, 'test'])->name('simple.test');

// Форма пользователя
Route::prefix('/user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.show');
    Route::post('/', 'store')->name('user.create');
});

// Форма книги
Route::prefix('/books')->controller(EntityController::class)->group(function () {
    Route::get('/', 'index')->name('book.show');
    Route::post('/', 'store')->name('book.create');
    Route::get('/{id}', 'destroy')->where('id', '[0-9]+')->name('book.delete');
});

// Форма загрузки файла
Route::prefix('/upload')->controller(FileUploadController::class)->group(function () {
    Route::get('/', 'index')->name('file.show');
    Route::post('/', 'upload')->name('file.upload');
});

Route::get('/library_user/{id}', [LibraryUserController::class, 'show'])->where('id', '[0-1]+');

Route::get('/my_user', [MyUserController::class, 'show'])->name('user.my_user');

Route::get('/redirect_test', TestRedirectController::class);

Route::get('/send_file', SendFileController::class);

// Форма домашняя работа №2
Route::prefix('/homework_user')->controller(FormProcessor::class)->group(function () {
    Route::get('/', 'index')->name('form_processor.show');
    Route::post('/', 'store')->name('form_processor.create');
});

Route::resource('/post', PostController::class);


// Группировка по префиксу и контроллеру
Route::prefix('/post')->controller(PostController::class)->group(function() {
   Route::get('/{post}', 'store')->name('post.create');
});

// Параметры машрута
Route::get('/users/{id}', function ($id = 'fallbackId') {
    //
})->where('id', '[0-9]+')->name('users');

Route::get('/users/{id}', function ($id) {
    //
})->whereUuid('id')->name('users');

// Поддоменная маршрутизация
Route::domain('{account}.myapp.com')->group(function () {
    Route::get('/', function ($account) {
        //
    });
    Route::get('/users/{id}', function ($account, $id) {
        //
    });
});

// Подписание маршрута
// URL::route('invitations', ['invitation' => 12345, 'answer' => 'yes']);
Route::get('invitations/{invitation}/{answer}', InvitationController::class)
    ->name('invitations')
    ->middleware('signed');
