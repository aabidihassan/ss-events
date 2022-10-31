<?php

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
Route::get('/test', function () {
    return view('client.profile');
});

Route::get('/mariage', function () {
    return view('mariage');
});
Route::get('/anniversaire', function () {
    return view('anniv');
});
Route::get('/soiree', function () {
    return view('soiree');
});
Route::get('/seminaire', function () {
    return view('Seminaire');
});


Route::get('/fournisseur', function () {
    return view('profil-for');
});

Route::get('/contact', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    if(auth()->user()->type == 'client') return view('client.profile');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
