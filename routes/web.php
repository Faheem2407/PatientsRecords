<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/patients',[PatientController::class,'showAllPatient']);
Route::get('/patients/{name}',[PatientController::class,'showPatientUsingName']);
Route::get('/patients/{name}/{test}',[PatientController::class,'showPatientTestReport']);


Route::get('/patient/{id}',[PatientController::class,'searchPatientById']);


Route::get('/patientDetailsByName/{name}',[PatientController::class,'patientDetailsByName']);
Route::get('/patientDetailsById/{id}',[PatientController::class,'patientDetailsById']);




//Route::get('/patient/{id}/{name}',[PatientController::class,'searchPatientByIdName']);
//Route::get('/patientall/{id}',[PatientController::class,'testallId']);