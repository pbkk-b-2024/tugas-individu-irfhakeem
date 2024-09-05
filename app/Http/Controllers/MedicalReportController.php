<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalReport;
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

        // Filter kolom yang tidak diinginkan
        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.medical-report', [
            'columns' => $columns,
            'medicalReports' => $medicalReports
        ]);
    }

    function delete($id)
    {
        $medicalReport = MedicalReport::find($id);

        if ($medicalReport) {
            $medicalReport->delete();
            return redirect()->route('medical-report')->with('success', 'Medical Report deleted successfully.');
        }

        return redirect()->route('medical-report')->with('error', 'Medical Report not found.');
    }
}
