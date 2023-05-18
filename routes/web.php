<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvidenciaController;

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
    return view('auth.login');
});

// Route::get('/evidencia', function () {
//     return view('evidencia.index');
// });

// Route::get('/evidencia/create',[EvidenciaController::class,'create']);

Route::resource('evidencia',EvidenciaController::class)->middleware('auth');

// Auth::routes();
Auth::routes(['register'=>false,'reset'=>false]);


Route::get('/home', [EvidenciaController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {
    
    Route::get('/', [EvidenciaController::class, 'index'])->name('home');

});