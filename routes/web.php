<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::resource('certify', 'CertifyController')->middleware('auth');

Route::resource('pdf2','Pdf2Controller')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('upload','UploadController');

Route::resource('fileupload','FileuploadController')->middleware('auth');
