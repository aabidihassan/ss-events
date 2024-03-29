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
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\favoirController;
use App\Http\Controllers\AbonnementsController;
require __DIR__ . '/auth.php';
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
Route::get('/service', function () {
    return ServiceController::index();
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
Route::get('/fournisseur/{id}', function ($id) {
    return ClientController::showFournisseur($id);
})
    ->middleware(['auth'])
    ->name('detailsFournisseur');
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
Route::post('/contact', [ContactUsController::class, 'submitContactForm'])->name('contact');
Route::post('/fournisseur', [FournisseurController::class, 'search'])->name('search');
Route::post('/incrementContactWhatsApp', [FournisseurController::class, 'incrementContactWhatsApp'])
    ->middleware(['auth'])
    ->name('incrementCW');
Route::get('/register-fournisseur', function () {
    return view('auth.register-fournisseur');
})->name('register-fournisseur');

Route::get('/espace-fournisseur', function () {
    return FournisseurController::espaceFournisseur();
})->name('espace-fournisseur');

Route::post('/check-username', [IndexController::class, 'checkUser'])->name('checkUsername');

//End Route Public

//Routes For client

Route::post('/feedback', [FeedbackController::class, 'addCommit'])
    ->middleware(['auth'])
    ->name('addFeedback');
Route::get('/dashboard', function () {
    if (auth()->user()->type == 'client') {
        return ClientController::profile();
    }
    if (auth()->user()->type == 'admin') {
        return redirect('/administrator');
    }
    return FournisseurController::mydash();
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::post('/editCompte', [ProfileController::class, 'editCompte'])
    ->middleware(['auth'])
    ->name('editCompte');
Route::post('/editProfile', [ProfileController::class, 'editProfile'])
    ->middleware(['auth'])
    ->name('editProfile');
Route::post('/fournisseur/addFavoir', [favoirController::class, 'create'])
    ->middleware(['auth'])
    ->name('favoir');
//End Routes for clients

//Routes Back office for fournisseur

Route::get('/back', function () {
    if (auth()->user()->type == 'fournisseur') {
        return view('backoffice.prestataires.dashboard');
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('back');
Route::get('/feedbacks', function () {
    if (auth()->user()->type == 'fournisseur') {
        return FeedbackController::getFeedbacks();
    }
    if (auth()->user()->type == 'admin') {
        return FeedbackController::getAllFeedbacks();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('fournisseur-feedback');
Route::get('/profile', function () {
    if (auth()->user()->type == 'fournisseur') {
        return FournisseurController::getProfile();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('fournisseur-profile');
Route::get('/abonnement', function () {
    if (auth()->user()->type == 'fournisseur') {
        return FournisseurController::getAbonnement();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('fournisseur-abonnement');
Route::post('image/store', [ProfileController::class, 'store'])
    ->middleware(['auth'])
    ->name('image.store');
Route::post('profile_picture/update', [ProfileController::class, 'updateProfilePicture'])
    ->middleware(['auth'])
    ->name('profile_picture.update');

Route::post('profile_picture/delete', [ProfileController::class, 'deleteProfilePicture'])
    ->middleware(['auth'])
    ->name('profile_picture.delete');

Route::get('image/checkCount', [ProfileController::class, 'checkCount'])
    ->middleware(['auth'])
    ->name('image.checkCount');

//Routes Back office for administrator

Route::get('/administrator', function () {
    if (auth()->user()->type == 'admin') {
        return IndexController::adminDashboard();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminbackOffice');
Route::get('/administrator/profile', function () {
    if (auth()->user()->type == 'admin') {
        return view('backoffice.administrators.profile');
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminProfile');
Route::get('/administrator/services', function () {
    if (auth()->user()->type == 'admin') {
        return ServiceController::getAll();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminService');
Route::get('/administrator/prefournisseurs', function () {
    if (auth()->user()->type == 'admin') {
        return PresController::getPres();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminPreFournisseur');
Route::get('/administrator/fournisseurs', function () {
    if (auth()->user()->type == 'admin') {
        return FournisseurController::getAll();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminFournisseur');
Route::get('/administrator/clients', function () {
    if (auth()->user()->type == 'admin') {
        return ClientController::getAll();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminClient');

Route::get('/administrator/classes', function () {
    if (auth()->user()->type == 'admin') {
        return ClasseController::getAll();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminClasses');

Route::get('/administrator/abonnements', function () {
    if (auth()->user()->type == 'admin') {
        return AbonnementsController::getAll();
    }
    return redirect('/');
})
    ->middleware(['auth'])
    ->name('adminAbonnements');

Route::get('/admin/pres/decline/{id}', [PresController::class, 'decline'])->middleware(['auth']);

Route::post('/administrator/prefournisseurs/accecptFournisseur', [PresController::class, 'accept'])
    ->middleware(['auth'])
    ->name('accecptFournisseur');

Route::get('/admin/fournisseurs/desactivate/{id}', [FournisseurController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/fournisseurs/activate/{id}', [FournisseurController::class, 'activate'])->middleware(['auth']);
Route::get('/admin/clients/desactivate/{id}', [ClientController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/clients/activate/{id}', [ClientController::class, 'activate'])->middleware(['auth']);

//route classes
Route::post('/administrator/classe/addClasse', [ClasseController::class, 'create'])
    ->middleware(['auth'])
    ->name('addClasse');
Route::post('/administrator/classe/UpdateClasse', [ClasseController::class, 'update'])
    ->middleware(['auth'])
    ->name('updateClasse');
Route::post('/administrator/classe/destroy', [ClasseController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('deleteClasse');

//routes services
Route::post('/administrator/services/addService', [ServiceController::class, 'addService'])
    ->middleware(['auth'])
    ->name('addService');
Route::get('/admin/services/desactivate/{id}', [ServiceController::class, 'desactivate'])->middleware(['auth']);
Route::get('/admin/services/activate/{id}', [ServiceController::class, 'activate'])->middleware(['auth']);
Route::post('/administrator/services/UpdateServices', [ServiceController::class, 'update'])
    ->middleware(['auth'])
    ->name('updateService');
Route::post('/administrator/services/destroy', [ServiceController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('deleteService');

Route::post('/administrator/addAbonnement', [FournisseurController::class, 'createAbonnement'])
    ->middleware(['auth'])
    ->name('createAbonnement');

Route::get('/administrator/feedbacks/{id}', [FeedbackController::class, 'getFeedbacksFournisseur'])
    ->middleware(['auth'])
    ->name('feedbacksFournisseur');
Route::post('/administrator/feedbacks/update', [FeedbackController::class, 'updateFeedback'])
    ->middleware(['auth'])
    ->name('updateFeedback');
Route::get('/administrator/feedbacks/delete/{id_client}/{id_fournisseur}', [FeedbackController::class, 'deleteFeedbacks'])
    ->middleware(['auth'])
    ->name('deleteFeedback');

Route::POST('/administrator/sendNewsLetter}', [IndexController::class, 'sendNewsLetter'])
    ->middleware(['auth'])
    ->name('sendNewsLetter');

//End Routes Back office for administrator
