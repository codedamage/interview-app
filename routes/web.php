<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ImportExportController;
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

Route::get('/', function () {
    return view('index');
});

Route::get(
    '/dashboard',
    [QuestionController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('questions', QuestionController::class)->middleware(['auth']);
Route::get('/search/', [QuestionController::class, 'search'])->name('search')->middleware(['auth']);
Route::post('/sendQuestionMail',[MailController::class,'sendMail'])->name('send.email');

Route::controller(ImportExportController::class)->group(function () {
    Route::post('/import', 'import')->name('question.import')->middleware(['auth']);
    Route::get('/export', 'export')->name('question.export')->middleware(['auth']);
});

Route::controller(DropzoneController::class)->group(function(){
    Route::post('dropzone/store', 'store')->name('dropzone.store');
});


require __DIR__.'/auth.php';
