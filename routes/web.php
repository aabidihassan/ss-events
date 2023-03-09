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
use App\Http\Controllers\FeedbackController;
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

// Routes Public 

Route::get('/', function () {
    return IndexController::index();
});
Route::get('/services', function () {
    return view('client.services');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/fournisseur', function () {
    return FournisseurController::index();
});
Route::get('/contact', function () {
    return view('register');
});
Route::get('/detailsFournisseur/{id}',function ($id)
{
 return ClientController::showFournisseur($id);
});
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
Route::post('/contact', [ContactUsController::class, 'submitContactForm'])->name('contact');
Route::post('/search',[FournisseurController::class,'search'])->name('search');

//End Route Public

//Routes For client 

Route::post('/feedback',[FeedbackController::class, 'addCommit'])->middleware(['auth'])->name('addFeedback');
Route::get('/dashboard', function () {
    if(auth()->user()->type == 'client') return view('client.profile');
    if(auth()->user()->type == 'admin') return redirect('/administrator');
    return FournisseurController::getProfile();
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/editCompte',[ProfileController::class,'editCompte'])->middleware(['auth'])->name('editCompte');
Route::post('/editProfile',[ProfileController::class,'editProfile'])->middleware(['auth'])->name('editProfile');

//End Routes for clients

//Routes Back office for fournisseur

Route::get('/back', function () {
    if(auth()->user()->type == 'fournisseur') return view('backoffice.prestataires.dashboard');
})->middleware(['auth'])->name('back');
Route::get('/feedbacks', function () {
    if(auth()->user()->type == 'fournisseur') return FeedbackController::getFeedbacks();
})->middleware(['auth'])->name('fournisseur-feedback');
Route::get('/dashboard2', function () {
    if(auth()->user()->type == 'fournisseur') return view('backoffice.prestataires.dashboard');
})->middleware(['auth'])->name('fournisseur-dashboard');
Route::get('/profile', function () {
    if(auth()->user()->type == 'fournisseur') return FournisseurController::getProfile();
})->middleware(['auth'])->name('fournisseur-profile');
Route::get('/abonnement', function () {
    if(auth()->user()->type == 'fournisseur') return FournisseurController::getAbonnement();
})->middleware(['auth'])->name('fournisseur-abonnement');
Route::post('image/store', [ProfileController::class, 'store'])->middleware(['auth'])->name('image.store');
Route::post('profile_picture/update', [ProfileController::class, 'updateProfilePicture'])->middleware(['auth'])->name('profile_picture.update');

//Routes Back office for administrator

Route::get('/administrator', function () {
    if(auth()->user()->type == 'admin')  return view('backoffice.administrators.dashboard');
})->middleware(['auth'])->name('adminbackOffice');
Route::get('/administrator/profile', function () {
    if(auth()->user()->type == 'admin') return view('backoffice.administrators.profile');
})->middleware(['auth'])->name('adminProfile');
Route::get('/administrator/services', function () {
    if(auth()->user()->type == 'admin') return ServiceController::getAll();
})->middleware(['auth'])->name('adminService');
Route::get('/administrator/prefournisseurs', function () {
    if(auth()->user()->type == 'admin') return PresController::getPres();
})->middleware(['auth'])->name('adminPreFournisseur');
Route::get('/administrator/fournisseurs', function () {
    if(auth()->user()->type == 'admin') return FournisseurController::getAll();
})->middleware(['auth'])->name('adminFournisseur');
Route::get('/administrator/clients', function () {
    if(auth()->user()->type == 'admin') return ClientController::getAll();
})->middleware(['auth'])->name('adminClient');
Route::get('/admin/pres/decline/{id}', [PresController::class, 'decline'])->middleware(['auth']);
Route::get('/admin/pres/accept/{id}', [PresController::class, 'accept'])->middleware(['auth']);
Route::get('/admin/fournisseurs/desactivate/{id}', [FournisseurController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/fournisseurs/activate/{id}', [FournisseurController::class, 'activate'])->middleware(['auth']);
Route::get('/admin/services/desactivate/{id}', [ServiceController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/services/activate/{id}', [ServiceController::class, 'activate'])->middleware(['auth']);
Route::get('/admin/clients/desactivate/{id}', [ClientController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/clients/activate/{id}', [ClientController::class, 'activate'])->middleware(['auth']);
Route::post('/administrator/services/addService', [ServiceController::class ,'addService'])->middleware(['auth'])->name('addService');
//End Routes Back office for administrator