<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

// Rotte Pubbliche
Route::get('/' , [PublicController::class , 'home'])->name('home');
Route::get('/aboutus/ourteam' , [PublicController::class , 'ourTeam'])->name('ourTeam');
Route::get('/categoria/{category}' , [PublicController::class , 'categoryShow'])->name('categoryShow');
Route::get('/ricerca/annuncio' , [PublicController::class , 'searchAnnouncement'])->name('announcements.search');


// Rotte annunci
Route::get('/nuovo/annuncio' , [AnnouncementController::class , 'CreateAnnouncement'])->name('announcement.create')->middleware('auth');
Route::get('/dettaglio/annuncio/{announcement}' , [AnnouncementController::class , 'showAnnouncement'])->name('announcement.show');

// Rotte revisori
Route::get('revisor/indexrevisor' , [RevisorController::class , 'indexrevisor'])->middleware('isRevisor')->name('revisor.indexrevisor');
Route::patch('/accetta/annuncio/{announcement}' , [RevisorController::class , 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}' , [RevisorController::class , 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
Route::get('/richiesta/revisore' , [RevisorController::class , 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/rendi/revisore/{user}' , [RevisorController::class , 'makeRevisor'])->name('make.revisor');
// Rotte Lingue
Route::post('/lingua/{lang}' , [PublicController::class , 'setLanguage'])->name('setLocale');



