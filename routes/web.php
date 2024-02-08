<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Models\Activity;


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


Route::get('/',function(){
    return view('welcome');
});
Route::get('/pfe',[App\Http\Controllers\PfeController::class ,'pfe_index'])->name('PfeIndex');//->middleware('auth');
Route::get('/activities',[App\Http\Controllers\PfeController::class ,'show_activities'])->name('activities');//->middleware('auth');
Route::get('/contactUs',[App\Http\Controllers\PfeController::class ,'contactez_nous'])->name('contactez');//->middleware('auth');
Route::get('/aboutUs',[App\Http\Controllers\PfeController::class ,'about_us'])->name('aboutUs');//->middleware('auth');
Route::get('/login',[App\Http\Controllers\PfeController::class ,'login'])->name('login');
Route::get('/registration',[App\Http\Controllers\PfeController::class ,'to_register'])->name('registration');
Route::post('/registration',[App\Http\Controllers\PfeController::class ,'register'])->name('register');
Route::post('/login',[App\Http\Controllers\PfeController::class ,'auth'])->name('auth');
Route::get('/logout',[App\Http\Controllers\PfeController::class ,'logout'])->name('logout');
Route::get('/profile/{user?}',[App\Http\Controllers\PfeController::class ,'profile_index'])->name('ProfilIndex');
Route::get('/profile/activities/user/{utilisateur?}',[App\Http\Controllers\ActivityController::class ,'index'])->name('Profil_activities');
Route::get('/profile/activities/add',[App\Http\Controllers\ActivityController::class ,'create'])->name('AddActivity')->middleware('auth');
Route::post('/profile/activities/add',[App\Http\Controllers\ActivityController::class ,'store'])->name('insertActivity')->middleware('auth');
Route::get('/profile/activities/{activity}',[App\Http\Controllers\ActivityController::class ,'show'])->name('showActivity')->middleware('auth');
Route::get('/profile/activities/edit/{activity}',[App\Http\Controllers\ActivityController::class ,'edit'])->name('editActivity')->middleware('auth');
Route::post('/profile/activities/edit/{activity}',[App\Http\Controllers\ActivityController::class ,'update'])->name('updateActivity')->middleware('auth');
Route::get('/profile/activities/drop/{activity}',[App\Http\Controllers\ActivityController::class ,'destroy'])->name('dropActivity')->middleware('auth');
Route::get('/activity/{activity}',[App\Http\Controllers\PfeController::class,'show'])->name('activity');
Route::get('/activity/{activity}/reservation',[App\Http\Controllers\ReservationController::class,'create'])->name('addReservation')->middleware('auth');
Route::post('/activity/{activity}/reservation',[App\Http\Controllers\ReservationController::class,'store'])->middleware('auth');
Route::get('/reservations/{filter?}',[App\Http\Controllers\ReservationController::class,'index'])->name('reservationIndex')->middleware('auth');
Route::get('/reservations/{activity}/show',[App\Http\Controllers\ReservationController::class,'show'])->name('showReservation')->middleware('auth');
Route::get('/reservations/accept/{reservation}',[App\Http\Controllers\ReservationController::class,'accept'])->name('AcceptReservation')->middleware('auth');
Route::get('/reservations/refuse/{reservation}',[App\Http\Controllers\ReservationController::class,'refuse'])->name('RefuseReservation')->middleware('auth');
Route::get('/reservations/{reservation}/edit',[App\Http\Controllers\ReservationController::class,'edit'])->name('editReservation')->middleware('auth');
Route::get('/reservations/{reservation}/drop',[App\Http\Controllers\ReservationController::class,'destroy'])->name('dropReservation')->middleware('auth');
Route::post('/reservations/{reservation}/edit',[App\Http\Controllers\ReservationController::class,'update'])->name('updateReservation')->middleware('auth');










