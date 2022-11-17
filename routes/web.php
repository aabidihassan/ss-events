<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ClientController;

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
Route::get('/admin', function () {
    return view('admin.admin');
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

Route::get('/admin/pres/decline/{id}', [PresController::class, 'decline'])->middleware(['auth']);
Route::get('/admin/pres/accept/{id}', [PresController::class, 'accept'])->middleware(['auth']);

Route::get('/admin/fournisseurs', function () {
    if(auth()->user()->type == 'admin') return FournisseurController::getAll();
})->middleware(['auth']);

Route::get('/admin/clients', function () {
    if(auth()->user()->type == 'admin') return ClientController::getAll();
})->middleware(['auth']);

Route::get('/admin/clients/desactivate/{id}', [ClientController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/clients/activate/{id}', [ClientController::class, 'activate'])->middleware(['auth']);

Route::get('/contact', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    if(auth()->user()->type == 'client') return view('client.profile');
    if(auth()->user()->type == 'admin') return redirect('/admin/pres');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('/editCompte',[ProfileController::class,'editCompte'])->middleware(['auth'])->name('editCompte');
Route::post('/editProfile',[ProfileController::class,'editProfile'])->middleware(['auth'])->name('editProfile');
