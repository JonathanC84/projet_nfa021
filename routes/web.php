<?php

use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserReservationController;
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

// ajouter la route '/' associée avec l'action MainController::index()
// MainController est une classe et index est une méthode de cette classe
// cette route est nommée 'main.index'
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/test-index', [MainController::class, 'testIndex'])->name('main.test-index');
Route::get('/carte', [MainController::class, 'carte'])->name('main.carte');

//-- reservation côté client --//
// formulaire de réservation
Route::get('/reservation', [UserReservationController::class, 'create'])->name('reservation.create');
// traitement des données
Route::post('/reservation', [UserReservationController::class, 'store'])->name('reservation.store');
// page récapitulatif (options : valider, modifier, annuler)
Route::get('/reservation/{id}/done', [UserReservationController::class, 'done'])->name('reservation.done');
// formulaire de modification
Route::get('/reservation/{id}/', [UserReservationController::class, 'edit'])->name('reservation.edit');
// traitement des données modifiées
Route::put('/reservation', [UserReservationController::class, 'update'])->name('reservation.update');
// suppression de la réservation (bouton "annuler")
Route::delete('/reservation/{id}', [UserReservationController::class, 'destroy'])->name('reservation.destroy');

//-- routes des principales vues --//
// page contact
Route::get('/contact', [MainController::class, 'contact'])->name('main.contact');
// homepage
Route::get('/test', [MainController::class, 'test'])->name('main.test');

// page de test
// Route::get('/test-resa', [MainController::class, 'testReservation'])->name('main.testReservation');

//-- back office --//

// affichage de la liste des réservations
Route::get('/admin/reservation', [ReservationController::class, 'index'])->name('admin.reservation.index');
// get -> affichage du formulaire de création
Route::get('/admin/reservation/create', [ReservationController::class, 'create'])->name('admin.reservation.create');
// post -> traitement des données du formulaire
Route::post('/admin/reservation', [ReservationController::class, 'store'])->name('admin.reservation.store');
// get -> affichage du formulaire de modification
Route::get('/admin/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservation.edit');
// put -> traitement des données du formulaire 
Route::put('/admin/reservation/{id}', [ReservationController::class, 'update'])->name('admin.reservation.update');
// suppression d'une reservation
Route::delete('/admin/reservation/{id}', [ReservationController::class, 'destroy'])->name('admin.reservation.destroy');