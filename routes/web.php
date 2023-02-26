<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
    return view('home');
});

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/resultado', [Controller::class, 'result'])->name('result');
Route::get('/cotacao-enviada', [Controller::class, 'quotationSend'])->name('quotationSend');
Route::post('/enviar-simulacao', [Controller::class, 'result'])->name('result');
Route::post('/enviar-cotacao', [Controller::class, 'cotacao'])->name('cotacao');
Route::get('/dash', [Controller::class, 'dash'])->name('dash');
Route::post('dash/dash-envio', [Controller::class, 'dashEnvio'])->name('dashEnvio');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
