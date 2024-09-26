<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HealthCenterController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\ServiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Patient API
Route::get('/patient', [PatientController::class, 'getPatient']);
Route::get('/patient/{id}', [PatientController::class, 'getPatientById']);
Route::post('/add-patient', [PatientController::class, 'addPatient']);
Route::delete('/delete-patient/{id}', [PatientController::class, 'deletePatient']);
Route::put('/update-patient/{id}', [PatientController::class, 'updatePatient']);

// Doctor API
Route::get('/doctor', [DoctorController::class, 'getDoctor']);
Route::post('/search-doctor-id', [DoctorController::class, 'getDoctorById']);
Route::post("/add-doctor", [DoctorController::class, 'addDoctor']);


// Health Center API
Route::get('/health-center', [HealthCenterController::class, 'getHealthCenter']);
Route::post('/search-health-center-id', [HealthCenterController::class, 'getHealthCenterById']);
Route::post('/add-health-center', [HealthCenterController::class, 'addHealthCenter']);
Route::put('/update-health-center/{id}', [HealthCenterController::class, 'updateHealthCenter']);
Route::delete('/delete-health-center/{id}', [HealthCenterController::class, 'deleteHealthCenter']);

// Specialization API
Route::get('/specialization', [SpecializationController::class, 'getSpecialization']);
Route::post('/search-specialization-id', [SpecializationController::class, 'getSpecializationById']);
Route::post('/add-specialization', [SpecializationController::class, 'addSpecialization']);
Route::put('/update-specialization/{id}', [SpecializationController::class, 'updateSpecialization']);
Route::delete('/delete-specialization/{id}', [SpecializationController::class, 'deleteSpecialization']);

// Service API
Route::get('/service', [ServiceController::class, 'getService']);
Route::get('/service/{id}', [ServiceController::class, 'getServiceById']);
Route::post('/add-service', [ServiceController::class, 'addService']);
// Route::put('/update-service/{id}', [ServiceController::class, 'updateService']);
// Route::delete('/delete-service/{id}', [ServiceController::class, 'deleteService']);
