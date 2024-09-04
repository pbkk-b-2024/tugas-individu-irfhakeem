<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\HealthCenter;
use App\Models\Drug;
use App\Models\Specialization;
use Illuminate\Support\Facades\Schema;

class ApiController extends Controller
{
    public function getPatient()
    {
        // Ambil semua data pasien
        $patients = Patient::all();

        // Ambil nama kolom dari tabel patients
        $columns = Schema::getColumnListing('patients');

        $excludedColumns = ['created_at', 'updated_at'];

        // Filter kolom yang tidak diinginkan
        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.pasien', [
            'columns' => $columns,
            'patients' => $patients
        ]);
    }

    public function getDoctor()
    {
        $doctors = Doctor::all();

        $columns = Schema::getColumnListing('doctors');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.doctor', [
            'columns' => $columns,
            'doctors' => $doctors
        ]);
    }

    public function getHealthCenter()
    {
        $healthCenters = HealthCenter::all();

        $columns = Schema::getColumnListing('health_centers');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.health-center', [
            'columns' => $columns,
            'healthCenters' => $healthCenters
        ]);
    }

    public function getDrug()
    {
        $drugs = Drug::all();

        $columns = Schema::getColumnListing('drugs');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.drug', [
            'columns' => $columns,
            'drugs' => $drugs
        ]);
    }

    public function getSpecialization()
    {
        $specializations = Specialization::all();

        $columns = Schema::getColumnListing('specializations');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.specialization', [
            'columns' => $columns,
            'specializations' => $specializations
        ]);
    }
    public function getService()
    {
        $services = Specialization::all();

        $columns = Schema::getColumnListing('services');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.service', [
            'columns' => $columns,
            'services' => $services
        ]);
    }
}
