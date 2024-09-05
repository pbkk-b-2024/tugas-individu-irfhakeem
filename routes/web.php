<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HealthCenterController;
use App\Http\Controllers\MedicalReportController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\AppointmentController;

// Fallback routing
Route::fallback(function () {
    return response()->view('fallback', ['message' => 'Halaman yang Anda cari tidak ditemukan.'], 404);
});

Route::redirect('/', '/page-pertemuan-2/sections/dashboard', 301);

// Pertemuan 2
Route::prefix('/page-pertemuan-2')->group(function () {
    Route::prefix('/sections')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'statistics'])->name('dashboard');

        // Patient
        Route::get('/pasien', [PatientController::class, 'get'])->name('pasien');
        Route::delete('/pasien/delete/{id}', [PatientController::class, 'delete'])->name('pasien.delete');
        Route::post('/pasien/add', [PatientController::class, 'add'])->name('pasien.add');


        // Doctor
        Route::get('/doctor', [DoctorController::class, 'get'])->name('doctor');
        Route::delete('/doctor/delete/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');

        // Health Center
        Route::get('/health-center', [HealthCenterController::class, 'get'])->name('healthCenter');
        Route::delete('/health-center/delete/{id}', [HealthCenterController::class, 'delete'])->name('healthCenter.delete');

        //Services
        Route::get('/service', [ServiceController::class, 'get'])->name('service');
        Route::delete('/service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');

        // Drugs
        Route::get('/drug', [DrugController::class, 'get'])->name('drug');
        Route::delete('/drug/delete/{id}', [DrugController::class, 'delete'])->name('drug.delete');

        // Specialization
        Route::get('/specialization', [SpecializationController::class, 'get'])->name('specialization');
        Route::delete('/specialization/delete/{id}', [SpecializationController::class, 'delete'])->name('specialization.delete');

        // Prescription
        Route::get('/prescription', [PrescriptionController::class, 'get'])->name('prescription');
        Route::delete('/prescription/delete/{id}', [PrescriptionController::class, 'delete'])->name('prescription.delete');

        // Medical Report
        Route::get('/medicalReport', [MedicalReportController::class, 'get'])->name('medicalReport');
        Route::delete('/medicalReport/delete/{id}', [MedicalReportController::class, 'delete'])->name('medicalReport.delete');

        // Appointment
        Route::get('/appointment', [AppointmentController::class, 'get'])->name('appointment');
        Route::delete('/appointment/delete/{id}', [AppointmentController::class, 'delete'])->name('appointment.delete');
    });
});
