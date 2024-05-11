<?php

use App\Http\Controllers\CookieTestController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeHomeworkController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormProcessor;
use App\Http\Controllers\FormTestController;
use App\Http\Controllers\HeaderTestController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\JsonParseController;
use App\Http\Controllers\LibraryUserController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RequestTestController;
use App\Http\Controllers\SendFileController;
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestRedirectController;
use App\Http\Controllers\TestSecurityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
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

// Форма домашняя работа №3
Route::prefix('/test_database')->controller(EmployeeController::class)->group(function () {
    Route::get('/', 'store')->name('employee.show');
});

Route::resource('/post', PostController::class);

Route::get('/main', function () {
    return view('mainpage');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/users_list', function () {
    $users = ['Ivan', 'Petr', 'Nikolay', 'Vasiliy', 'Oleg'];

    return view('users', ['users' => $users]);
});

Route::get('/uppercase', function () {
    return view('testdirectiv');
});

// Blade домашняя работа №4
Route::get('/home', function () {
    return view('home', [
        'name' => 'Иван',
        'age' => 24,
        'position' => 'developer',
        'address' => 'Москва',
    ]);
});

Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'Москва',
        'post_code' => '101000',
        'email' => 'ivandev@example.com',
        'phone' => '+79990009999',
    ]);
});

// Урок 5 Реквесты
Route::post('/test_request', [RequestTestController::class, 'testRequest'])->name('test.request');

Route::get('/test_header', [HeaderTestController::class, 'getHeader'])->name('test.header');

Route::get('/test_cookie', [CookieTestController::class, 'testCookie'])->name('test.cookie');

Route::post('/json_parse', [JsonParseController::class, 'parseJson'])->name('test.parseJson');;

// Request домашняя работа №5
Route::prefix('/employee')->controller(EmployeeHomeworkController::class)->group(function () {
    Route::get('/', 'index')->name('employee.show');
    Route::post('/', 'store')->name('employee.create');
    Route::put('/{id}', 'update')->name('employee.update');
});

// Урок 6 Формы
Route::prefix('/form')->controller(FormTestController::class)->group(function () {
    Route::get('/', 'displayForm')->name('form.show');
    Route::post('/', 'postForm')->name('form.post');
});

Route::prefix('/worker')->controller(WorkerController::class)->group(function () {
    Route::get('/{id?}', 'index')->name('worker.show');
    Route::post('/', 'store')->name('worker.create');
});

Route::prefix('/security')->controller(TestSecurityController::class)->group(function () {
    Route::get('/', 'index')->name('security.show');
    Route::post('/', 'post')->name('security.post');
});


// Группировка по префиксу и контроллеру
Route::prefix('/post')->controller(PostController::class)->group(function () {
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
