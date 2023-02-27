<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocDocumentoController;

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
    return view('auth.login');
});
/*
Route::get('/doc_documento', function () {
    return view('doc_documento.index');
});

Route::get('/doc_documento/create',[DocDocumentoController::class,'create']);
*/

Route::resource('doc_documento', DocDocumentoController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [DocDocumentoController::class, 'index'])->name('home');

Route::group(['middleware' =>'auth'],function () {

    Route::get('/', [DocDocumentoController::class, 'index'])->name('home');

});