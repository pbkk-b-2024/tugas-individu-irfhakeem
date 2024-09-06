<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\HealthCenter;
use Illuminate\Http\Request;
use App\Models\MedicalReport;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class MedicalReportController extends Controller
{
    //
    public function get()
    {
        // Ambil data services dengan pagination
        $medicalReports = MedicalReport::paginate(10);

        // Ambil nama kolom dari tabel medicalReports
        $columns = Schema::getColumnListing('medical_reports');

        // Kolom yang tidak ingin disertakan
        $excludedColumns = ['created_at', 'updated_at'];

        $doctors = Doctor::all();
        $healthCenters = HealthCenter::all();
        $services = Service::all();

        // Filter kolom yang tidak diinginkan
        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.medical-report', compact('medicalReports', 'columns', 'doctors', 'healthCenters', 'services'));
    }

    function delete($id)
    {
        $medicalReport = MedicalReport::find($id);

        if ($medicalReport) {
            $medicalReport->delete();
            return redirect()->route('medicalReport')->with('success', 'Medical Report deleted successfully.');
        }

        return redirect()->route('medicalReport')->with('error', 'Medical Report not found.');
    }

    function add(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'dokter' => 'required',
            'faskes' => 'required',
            'service' => 'required',
            'diagnosis' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        $medicalReport = new MedicalReport();
        $medicalReport->patient_id = $request->patient_id;
        $medicalReport->dokter = $request->dokter;
        $medicalReport->faskes = $request->faskes;
        $medicalReport->service = $request->service;
        $medicalReport->diagnosis = $request->diagnosis;
        $medicalReport->date = $request->date;
        $medicalReport->status = $request->status;
        // dd($medicalReport->dokter, $medicalReport->faskes, $medicalReport->service, $medicalReport->diagnosis, $medicalReport->date, $medicalReport->status);
        $medicalReport->save();

        return redirect()->route('medicalReport')->with('success', 'Medical Report added successfully.');
    }
}
