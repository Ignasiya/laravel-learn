<?php

use App\Events\NewsCreated;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CookieTestController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeHomeworkController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormBuilderTestController;
use App\Http\Controllers\FormProcessor;
use App\Http\Controllers\FormTestController;
use App\Http\Controllers\HeaderTestController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\JsonParseController;
use App\Http\Controllers\LibraryUserController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\PdfGeneratorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RequestTestController;
use App\Http\Controllers\SendFileController;
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestDiController;
use App\Http\Controllers\TestRedirectController;
use App\Http\Controllers\TestSecurityController;
use App\Http\Controllers\TestValidationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Jobs\SyncNews;
use App\Models\News;
use App\Models\User;
use App\Notifications\UserEmailChangedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

Route::prefix('/validation')->controller(TestValidationController::class)->group(function () {
    Route::get('/', 'index')->name('validation.show');
    Route::post('/', 'post')->name('validation.post');
});

Route::prefix('/builder')->controller(FormBuilderTestController::class)->group(function () {
    Route::get('/', 'show')->name('build.show');
    Route::post('/', 'post')->name('build.post');
});

// Формы домашняя работа №6
Route::prefix('/form_book')->controller(BookController::class)->group(function () {
    Route::get('/{id?}', 'index')->name('form_book.show');
    Route::post('/', 'store')->name('form_book.create');
});

// Урок 7 Response ответы
Route::get('/test_url', function () {
//   return response('Helper response', 301)
//       ->header('X-HEADER-1', 'test')
//       ->header('Content-Type', 'application/json');

    return redirect(null, 301)->away('https://google.com');
});

Route::get('/test_cookie', function () {
    return response('My first cookie')
        ->cookie('my_test_cookie', 'test content', 5)
        ->withHeaders([
            'X-HEADER-TEST1' => 'IT WORKS!',
            'X-HEADER-TEST2' => 'IT WORKS!',
            'X-HEADER-TEST3' => 'IT WORKS!',])
        ->header('Set-Cookie', 'my_test_cookie2=10')
        ->withoutCookie('test_cookie2');
});

Route::get('/counter', function () {
    $counterValue = session('counter', 0);
    $counterValue++;
    session(['counter' => $counterValue,]);
    return 'ok';
});

Route::get('/result_counter', function () {
    if (session()->has('counter')) {
        session()->forget('counter');
    }
    return session('counter', 0);
});

Route::prefix('/list_of_books')->group(function () {
    Route::get('/', function () {
        $listOfBooks = session()->get('list_of_books', '');

        return response()->json([
            'status' => 'received',
            'list_of_books' => $listOfBooks ? unserialize($listOfBooks) : 'The list is empty'
        ]);
    });
    Route::post('/', function (Request $request) {
        $listOfBooks = session()->get('list_of_books', '');

        $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];

        $listOfBooks[] = ['author' => $request->get('author'), 'title' => $request->get('title')];

        session()->put('list_of_books', serialize($listOfBooks));

        return response()->json([
            'status' => 'saved',
            'list_of_books' => $listOfBooks
        ]);
    });
    Route::delete('/{id}', function (int $id) {
        $listOfBooks = session()->get('list_of_books', '');

        $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];

        if (array_key_exists($id, $listOfBooks)) {
            unset($listOfBooks[$id]);
        }

        session()->put('list_of_books', serialize($listOfBooks));

        return response()->json([
            'status' => 'deleted',
            'list_of_books' => $listOfBooks
        ]);
    });
});

Route::get('/file_download', function () {
    return response()->download(base_path() . '/test.txt', 'my_test');
});

Route::get('/file_show', function () {
    return response()->file(base_path() . '/test.txt');
});

Route::get('/file_stream', function () {
    return response()->streamDownload(function () {
        echo file_get_contents('https://google.com');
    }, 'google.html');
});

// Response домашняя работа №7
Route::prefix('/homework_client')->controller(ClientController::class)->group(function () {
    Route::get('/', 'index')->name('client.form');
    Route::get('/all', 'showAll')->name('client.show.all');
    Route::get('/{id}', 'showClient')->name('client.show');
    Route::post('/', 'store')->name('client.create');
});

Route::get('/resume_{id}/pdf', [PdfGeneratorController::class, 'index'])->name('client.pdf');

Route::get('/check_di', [TestDiController::class, 'showUrl'])->name('check_di.get');

// Service домашняя работа №8
Route::get('/logs', function () {
    return view('logs');
});

// Урок 9 Events
Route::get('/event', function () {
    return NewsCreated::dispatch(News::find(1));
});

Route::get('/news-update', function () {
    News::find(1)->update(['test' => 'TestTest']);
    return 'updated';
});

// Event домашняя работа №9
Route::get('news/created-test', function () {
    $news = new News();

    $news->title = 'Test news title';
    $news->body = 'Test news body';

    $news->save();
    return $news;
});

Route::get('news/{id}/hide', function ($id) {
    $news = News::findOrFail($id);
    $news->hidden = true;

    $news->save();

    return NewsCreated::dispatch($news);
});

// Урок 10 Очереди
Route::get('/sync-news', function () {
    SyncNews::dispatch(10);
    return response(['status' => 'success']);
});

Route::get('locale', function () {
    echo App::getLocale();
});

Route::get('locale/set/{locale}', function ($locale) {
    App::setLocale($locale);
    echo App::getLocale();
    echo '<hr>';
    echo __('messages.greet');
});

Route::get('locale/{locale}/thanks', function ($locale, Request $request) {
    App::setLocale($locale);
    echo __('messages.thanks', ['name' => $request->input('name')]);
});

Route::get('user/create-test/{amount}', function ($amount) {
    return User::factory($amount)->create();
});

Route::get('user/{user}/change-email', function (User $user, Request $request) {
    $oldEmail = $user->email;
    $user->email = $request->input('email');
    $user->save();
    $user->notify(new UserEmailChangedNotification($oldEmail));
    return response(['result' => 'email changed']);
});

Route::get('user/{user}/notifications', function (User $user) {
    return $user->notifications();
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
