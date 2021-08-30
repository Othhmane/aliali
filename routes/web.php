<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/commandes', function () {
    return view('commandes');
})->middleware(['auth'])->name('commandes');

require __DIR__.'/auth.php';

// Route::get('/orders',[RequestController::class,'getAllOrders']);
Route::get('/tab',[RequestController::class,'getLivraisons']);
Route::get('/fetch',[OrderController::class,'fetch']);

Route::get('/orders',[OrderController::class,'index']);
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::get('/pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdfTest');
Route::get('/show/{id}',[OrderController::class,'show'])->name('show');





