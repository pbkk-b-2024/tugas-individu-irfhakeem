<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\HealthCenter;
use Illuminate\Http\Request;
use App\Models\MedicalReport;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class MedicalReportController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $patient = Patient::select('patient_id')->where('patient_id', 'like', "%" . $search . "%")->first();
        $medicalReports = MedicalReport::where('patient_id', 'like', "%" . $patient->patient_id . "%")->paginate(10);

        return view('doctor.search-medical-report', compact('medicalReports', 'patient'));
    }
    //
    public function get()
    {
        // Ambil data services dengan pagination
        $medicalReports = MedicalReport::orderBy('medical_report_id')->paginate(10);

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
        $validate = $request->validate([
            'nama' => 'required',
            'patient_id' => 'required',
            'dokter' => 'required',
            'faskes' => 'required',
            'service' => 'required',
            'diagnosis' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        dd($validate);

        MedicalReport::create($validate);
        return redirect()->route('medicalReport')->with('success', 'Medical Report added successfully.');
    }

    function edit($id)
    {
        $medicalReport = MedicalReport::find($id);
        $doctors = Doctor::all();
        $healthCenters = HealthCenter::all();
        $services = Service::all();

        return view('page-pertemuan-2.sections.medical-report-edit', compact('medicalReport', 'doctors', 'healthCenters', 'services'));
    }

    function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'patient_id' => 'required',
            'dokter' => 'required',
            'faskes' => 'required',
            'service' => 'required',
            'diagnosis' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        $medicalReport = MedicalReport::find($id);
        $medicalReport->update($validate);

        return redirect()->route('medicalReport')->with('success', 'Medical Report updated successfully.');
    }
}
