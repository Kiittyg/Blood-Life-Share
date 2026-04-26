<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonneurController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\GroupesanguinController;
use App\Http\Controllers\LocaliteController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DemandedonController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\LignervController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockgsController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\LignedemandeController;
use App\Http\Controllers\CentrehospitalierController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\LignedonController;
use App\Http\Controllers\LignedemandedonController;
use App\Http\Controllers\NotificationController;

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

Route::get('/bonjour', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('registerr');
});
/*Route::get('/', function () {
    return view('accueil');
});*/

Route::get('home',[TemplateController::class,'index'])->name('home');
Route::get('actualites', [TemplateController::class, 'actualites'])->name('actualites');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/registerr', [UserController::class, 'create'])->name('registerr');
Route::post('/registerr', [UserController::class, 'store'])->name('ajout.user');
Route::get('user.index', [UserController::class, 'index'])->name('user.index');
Route::get('user.show', [UserController::class, 'show'])->name('user.show');


//Route::get('/user/showcurrent', [UserController::class, 'showCurrentUser'])->middleware('auth')->name('user.showcurrent');


Route::get('/loginn', [LoginController::class, 'showLoginForm'])->name('loginn');
Route::post('/loginn', [LoginController::class, 'login'])->name('login.submit');
Route::get('/accueil', [LoginController::class, 'index'])->name('dashboard');
Route::get('login.show', [LoginController::class, 'show'])->name('current.show');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
/*----------------------------------DEMANDEDON--------------------------------------*/
Route::get('demandedon.index', [DemandedonController::class, 'index'])->name('demandedon.index');
Route::get('demandedon.create', [DemandedonController::class, 'create'])->name('ajout.demandedon');
Route::post('demandedon.store', [DemandedonController::class, 'store'])->name('enregistrer.demandedon');
Route::get('demandedon.edit/{id}', [DemandedonController::class, 'edit'])->name('edit.demandedon');
Route::post('demandedon.update/{id}', [DemandedonController::class, 'update'])->name('update.demandedon');
Route::get('demandedon.supprimer/{id}', [DemandedonController::class, 'destroy'])->name('supprimer.demandedon');

/*Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');*/
/*Route::get('/', [WelcomeController::class, 'index'])->name('home');


/*-----------------------------RENDEZVOUS------------------------------------------*/
Route::get('rendezvous.index', [RendezvousController::class, 'index'])->name('rendezvous.index');
Route::get('rendezvous.create', [RendezvousController::class, 'create'])->name('enregistrer.rendezvous');
Route::post('rendezvous.store', [RendezvousController::class, 'store'])->name('ajout.rendezvous');
Route::get('rendezvous.edit/{id}', [RendezvousController::class, 'edit'])->name('edit.rendezvous');
Route::post('rendezvous.update/{id}', [RendezvousController::class, 'update'])->name('update.rendezvous');
Route::get('rendezvous.supprimer/{id}', [RendezvousController::class, 'destroy'])->name('supprimer.rendezvous');


/*-----------------------------LIGNERV----------------------------------------------*/
Route::get('lignerv.index', [LignervController::class, 'index'])->name('lignerv.index');
Route::get('lignerv.create', [LignervController::class, 'create'])->name('ajout.lignerv');
Route::post('lignerv.store', [LignervController::class, 'store'])->name('enregistrer.lignerv');
Route::get('lignerv.edit/{id}', [LignervController::class, 'edit'])->name('edit.lignerv');
Route::post('lignerv.update/{id}', [LignervController::class, 'update'])->name('update.lignerv');
Route::get('lignerv.supprimer/{id}', [LignervController::class, 'destroy'])->name('supprimer.lignerv');


/*-----------------------------GROUPESANGUIN-------------------------------------------*/
Route::get('groupesanguin.index', [GroupesanguinController::class, 'index'])->name('groupesanguin.index');
Route::get('groupesanguin.create', [GroupesanguinController::class, 'create'])->name('ajout.groupesanguin');
Route::post('groupesanguin.store', [GroupesanguinController::class, 'store'])->name('enregistrer.groupesanguin');
Route::get('groupesanguin.edit/{id}', [GroupesanguinController::class, 'edit'])->name('edit.groupesanguin');
Route::post('groupesanguin.update/{id}', [GroupesanguinController::class, 'update'])->name('update.groupesanguin');
Route::get('groupesanguin.supprimer/{id}', [GroupesanguinController::class, 'destroy'])->name('supprimer.groupesanguin');



/*-----------------------------STOCK-----------------------*/
Route::get('stock.index', [StockController::class, 'index'])->name('stock.index');
Route::get('stock.create', [StockController::class, 'create'])->name('enregistrer.stock');
Route::post('stock.store', [StockController::class, 'store'])->name('ajout.stock');
Route::get('stock.edit/{id}', [StockController::class, 'edit'])->name('edit.stock');
Route::post('stock.update/{id}', [StockController::class, 'update'])->name('update.stock');
Route::get('stock.supprimer/{id}', [StockController::class, 'destroy'])->name('supprimer.stock');


/*------------------------STOCKGS------------------------------------*/
Route::get('stockgs.index', [StockgsController::class, 'index'])->name('stockgs.index');
Route::get('stockgs.create', [StockgsController::class, 'create'])->name('ajout.stockgs');
Route::post('stockgs.store', [StockgsController::class, 'store'])->name('enregistrer.stockgs');
Route::get('stockgs.edit/{id}', [StockgsController::class, 'edit'])->name('edit.stockgs');
Route::post('stockgs.update/{id}', [StockgsController::class, 'update'])->name('update.stockgs');
Route::get('stockgs.supprimer/{id}', [StockgsController::class, 'destroy'])->name('supprimer.stockgs');

//Route::get('/user-details', [UserDetailsController::class, 'show'])->name('user.details');


/*------------------------------LIGNEDEMANDE-------------------------------*/
Route::get('lignedemande.index', [LignedemandeController::class, 'index'])->name('lignedemande.index');
Route::get('lignedemande.create', [LignedemandeController::class, 'create'])->name('enregistrer.lignedemande');
Route::post('lignedemande.store', [LignedemandeController::class, 'store'])->name('ajout.lignedemande');
Route::get('lignedemande.edit/{id}', [LignedemandeController::class, 'edit'])->name('edit.lignedemande');
Route::post('lignedemande.update/{id}', [LignedemandeController::class, 'update'])->name('update.lignedemande');
Route::get('lignedemande.supprimer/{id}', [LignedemandeController::class, 'destroy'])->name('supprimer.lignedemande');


/*---------------------------------------CENTREHOSPITALIER----------------------------------------------------------------*/
Route::get('centrehospitalier.index', [CentrehospitalierController::class, 'index'])->name('centrehospitalier.index');
Route::get('centrehospitalier.create', [CentrehospitalierController::class, 'create'])->name('enregistrer.centrehospitalier');
Route::post('centrehospitalier.store', [CentrehospitalierController::class, 'store'])->name('ajout.centrehospitalier');
Route::get('centrehospitalier.edit/{id}', [CentrehospitalierController::class, 'edit'])->name('edit.centrehospitalier');
Route::post('centrehospitalier.update/{id}', [CentrehospitalierController::class, 'update'])->name('update.centrehospitalier');
Route::get('centrehospitalier.supprimer/{id}', [CentrehospitalierController::class, 'destroy'])->name('supprimer.centrehospitalier');



/*---------------------------------------DON----------------------------------------------------------------*/
Route::get('don.index', [DonController::class, 'index'])->name('don.index');
Route::get('don.create', [DonController::class, 'create'])->name('enregistrer.don');
Route::post('don.store', [DonController::class, 'store'])->name('ajout.don');
Route::get('don.edit/{id}', [DonController::class, 'edit'])->name('edit.don');
Route::post('don.update/{id}', [DonController::class, 'update'])->name('update.don');
Route::get('don.supprimer/{id}', [DonController::class, 'destroy'])->name('supprimer.don');



/*---------------------------------------FONCTION----------------------------------------------------------------*/
Route::get('fonction.index', [FonctionController::class, 'index'])->name('fonction.index');
Route::get('fonction.create', [FonctionController::class, 'create'])->name('enregistrer.fonction');
Route::post('fonction.store', [FonctionController::class, 'store'])->name('ajout.fonction');
Route::get('fonction.edit/{id}', [FonctionController::class, 'edit'])->name('edit.fonction');
Route::post('fonction.update/{id}', [FonctionController::class, 'update'])->name('update.fonction');
Route::get('fonction.supprimer/{id}', [FonctionController::class, 'destroy'])->name('supprimer.fonction');



/*---------------------------------------LIGNEDON----------------------------------------------------------------*/
Route::get('lignedon.index', [LignedonController::class, 'index'])->name('lignedon.index');
Route::get('lignedon.create', [LignedonController::class, 'create'])->name('enregistrer.lignedon');
Route::post('lignedon.store', [LignedonController::class, 'store'])->name('ajout.lignedon');
Route::get('lignedon.edit/{id}', [LignedonController::class, 'edit'])->name('edit.lignedon');
Route::post('lignedon.update/{id}', [LignedonController::class, 'update'])->name('update.lignedon');
Route::get('lignedon.supprimer/{id}', [LignedonController::class, 'destroy'])->name('supprimer.lignedon');




/*-----------------------------------------LIGNEDEMANDEDON----------------------------------------------------------------*/
Route::get('lignedemandedon.index', [LignedemandedonController::class, 'index'])->name('lignedemandedon.index');
Route::get('lignedemandedon.create', [LignedemandedonController::class, 'create'])->name('ajout.lignedemandedon');
Route::post('lignedemandedon.store', [LignedemandedonController::class, 'store'])->name('enregistrer.lignedemandedon');
Route::get('lignedemandedon.edit/{id}', [LignedemandedonController::class, 'edit'])->name('edit.lignedemandedon');
Route::post('lignedemandedon.update/{id}', [LignedemandedonController::class, 'update'])->name('update.lignedemandedon');
Route::get('lignedemandedon.supprimer/{id}', [LignedemandedonController::class, 'destroy'])->name('supprimer.lignedemandedon');


/*-----------------------------------------ZONE----------------------------------------------------------------*/
Route::get('notifications.index', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('notification.create', [NotificationController::class, 'create'])->name('ajout.notification');
Route::post('notification.store', [NotificationController::class, 'store'])->name('enregistrer.notification');
Route::get('notification.edit/{id}', [NotificationController::class, 'edit'])->name('edit.notification');
Route::post('notification.update/{id}', [NotificationController::class, 'update'])->name('update.notification');
Route::get('notification.supprimer/{id}', [NotificationController::class, 'destroy'])->name('supprimer.notification');