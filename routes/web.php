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
    return view('welcome');
});
/*
Route::get('/doc_documento', function () {
    return view('doc_documento.index');
});

Route::get('/doc_documento/create',[DocDocumentoController::class,'create']);
*/

Route::resource('doc_documento', DocDocumentoController::class);