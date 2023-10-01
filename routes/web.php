<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\admincontroller;
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


Route::get('/',[homecontroller::class,'index']);
Route::get('/home',[homecontroller::class,'redirect'])->name('home');
Route::post('/appointment',[homecontroller::class,'appointment'])->name('appointment');
Route::get('/myappointment',[homecontroller::class,'myappointment'])->name('myappointment');
Route::get('/delete_myappointment/{id}',[homecontroller::class,'delete_myappointment'])->name('delete_myappointment');
Route::get('/fetch_myappointment/{id}',[homecontroller::class,'fetch_myappointment'])
      ->name('fetch_myappointment');
Route::post('edit_myappointment',[homecontroller::class,'edit_myappointment'])
->name('edit_myappointment');
Route::post('/upload_doctor',[admincontroller::class,'upload_doctor'])->name('upload_doctor');
Route::get('/showappointment',[admincontroller::class,'showappointment'])
      ->name('showappointment');
Route::get('/editappointment/{id}',[admincontroller::class,'editappointment'])
->name('editappointment');
Route::get('/showdoctor',[admincontroller::class,'showdoctor'])
->name('showdoctor');
Route::get('/delete_doctor/{id}',[admincontroller::class,'delete_doctor'])
->name('delete_doctor');
Route::get('/edit_doctor/{id}',[admincontroller::class,'edit_doctor'])
->name('edit_doctor');
Route::post('/edit_doctor_record',[admincontroller::class,'edit_doctor_record'])
->name('edit_doctor_record');
Route::get('/showemail/{id}',[admincontroller::class,'showemail'])
->name('showemail');
Route::get('/sendemail',[admincontroller::class,'sendemail'])
->name('sendemail');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::view('/add_doctor','admin/add_doctor');

});
 