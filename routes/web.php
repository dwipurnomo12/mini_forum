<?php

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsToAnswer;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MassMessagingController;
use App\Http\Controllers\YourQuestionsController;
use App\Http\Controllers\MentoredStudentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'CheckRole:admin,teacher,student'], function () {
        Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
    Route::group(['middleware' => 'CheckRole:teacher,student'], function () {
        Route::get('/admin/profile', [ProfileController::class, 'index']);
        Route::PUT('/admin/profile', [ProfileController::class, 'update']);
    });

    Route::group(['middleware' => 'CheckRole:admin'], function () {
        Route::get('/admin/questions', [QuestionController::class, 'index']);
        Route::get('/admin/questions/send-message/{id}', [QuestionController::class, 'sendMessage']);
        Route::POST('/admin/questions/', [QuestionController::class, 'store']);

        Route::resource('/admin/notification', NotificationController::class);
    });
    Route::group(['middleware' => 'CheckRole:teacher'], function () {
        Route::get('/admin/questions-to-answer', [QuestionsToAnswer::class, 'index']);
        Route::get('/admin/questions-to-answer/{id}', [QuestionsToAnswer::class, 'show']);
        Route::POST('/admin/questions-to-answer/{id}', [QuestionsToAnswer::class, 'store']);

        Route::get('/admin/mentored-students', [MentoredStudentsController::class, 'index']);
        Route::get('/admin/mentored-students/{id}', [MentoredStudentsController::class, 'show']);

        Route::get('/admin/mass-messaging', [MassMessagingController::class, 'index']);
        Route::post('/admin/mass-messaging', [MassMessagingController::class, 'store']);
    });
    Route::group(['middleware' => 'CheckRole:student'], function () {
        Route::resource('/admin/your-questions', YourQuestionsController::class);
        Route::POST('/admin/your-questions/{id}/answer', [YourQuestionsController::class, 'answer']);

        Route::get('/admin/message', [MessageController::class, 'index']);
    });
});
