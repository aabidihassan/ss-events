<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresController;

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

Route::get('/services', function () {
    return view('client.services');
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


Route::get('/fournisseurs', function () {
    return view('client.fournisseur');
});

Route::get('/admin/services', function () {
    if(auth()->user()->type == 'admin') return view('admin.services');
})->middleware(['auth'])->name('editCompte');

Route::get('/admin/pres', function () {
    if(auth()->user()->type == 'admin') return PresController::getPres();
})->middleware(['auth'])->name('editCompte');

Route::get('/contact', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    if(auth()->user()->type == 'client') return view('client.profile');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('/editCompte',[ProfileController::class,'editCompte'])->middleware(['auth'])->name('editCompte');
Route::post('/editProfile',[ProfileController::class,'editProfile'])->middleware(['auth'])->name('editProfile');
