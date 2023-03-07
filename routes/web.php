<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactUsController;
require __DIR__.'/auth.php';
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
    return IndexController::index();
});
Route::get('/test', function () {
    return view('client.profile');
});

Route::get('/services', function () {
    return view('client.services');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/detail', function () {
    return view('fournisseurs.presentation');
});
Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/fournisseur', function () {
    return FournisseurController::index();
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

Route::get('/admin/fournisseurs/desactivate/{id}', [FournisseurController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/fournisseurs/activate/{id}', [FournisseurController::class, 'activate'])->middleware(['auth']);

Route::get('/admin/services', function () {
    if(auth()->user()->type == 'admin') return ServiceController::getAll();
})->middleware(['auth']);

Route::get('/admin/services/desactivate/{id}', [ServiceController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/services/activate/{id}', [ServiceController::class, 'activate'])->middleware(['auth']);

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
    return FournisseurController::profile();
})->middleware(['auth', 'verified'])->name('dashboard');



Route::post('/editCompte',[ProfileController::class,'editCompte'])->middleware(['auth'])->name('editCompte');
Route::post('/editProfile',[ProfileController::class,'editProfile'])->middleware(['auth'])->name('editProfile');
Route::post('image/store', [ProfileController::class, 'store'])->middleware(['auth'])->name('image.store');
Route::post('profile_picture/update', [ProfileController::class, 'updateProfilePicture'])->middleware(['auth'])->name('profile_picture.update');


Route::post('/search',[FournisseurController::class,'search'])->name('search');
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');

Route::post('/contact', [ContactUsController::class, 'submitContactForm'])->name('contact');

Route::get('/detailsFournisseur/{id}',function ($id)
{
 return ClientController::showFournisseur($id);
});