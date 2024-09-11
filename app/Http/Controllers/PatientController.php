<?php

namespace App\Http\Controllers;

use App\Models\MedicalReport;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    // Patient Page
    public function getByAuth()
    {
        $email = Auth::user()->email ?? null;
        $patient = Patient::where('email', $email)->first();

        if ($patient) {
            return view('patient.dashboard', compact('patient'));
        }

        return redirect()->route('welcome')->with('error', 'Patient not found.');
    }

    public function getMyMedicalReports()
    {
        $email = Auth::user()->email ?? null;
        $patient = Patient::where('email', $email)->first();
        $id = $patient->patient_id ?? null;

        if ($id) {
            $medicalReports = MedicalReport::where('patient_id', $id)->orderBy('created_at', direction: 'desc')->paginate(10);
            // dd($medicalReports);
            return view('patient.medical-reports', compact('medicalReports'));
        }

        return redirect()->route('dahsboard')->with('error', 'Patient not found.');
    }



    // Admin Page
    public function get()
    {

        // Ambil semua data pasien
        $patients = Patient::orderBy('patient_id')->paginate(10);

        // Ambil nama kolom dari tabel patients
        $columns = Schema::getColumnListing('patients');

        $excludedColumns = ['created_at', 'updated_at'];

        // Filter kolom yang tidak diinginkan
        $columns = array_diff($columns, $excludedColumns);
        // dd($patients);
        return view('page-pertemuan-2.sections.pasien', [
            'columns' => $columns,
            'patients' => $patients
        ]);
    }

    function delete($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            $patient->delete();
            return redirect()->route('pasien')->with('success', 'Patient deleted successfully.');
        }

        return redirect()->route('pasien')->with('error', 'Patient not found.');
    }

    function add(Request $request)
    {
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->nik = $request->nik;
        $patient->tanggal_lahir = $request->tanggal_lahir;
        $patient->email = $request->email;
        $patient->no_hp = $request->no_hp;
        $patient->jenis_kelamin = $request->jenis_kelamin;
        $patient->Golongan_darah = $request->Golongan_darah;
        $patient->save();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->nik;
        $user->save();

        $user->assignRole('patient');

        return redirect()->route('pasien')->with('success', 'Patient added successfully.');
    }

    public function edit($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            return view('page-pertemuan-2.sections.pasien-edit', compact('patient'));
        }

        return redirect()->route('pasien')->with('error', 'Patient not found.');
    }

    function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'Golongan_darah' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $patient = Patient::find($id);
        $patient->update($validate);
        return redirect()->route('pasien')->with('success', 'Patient updated successfully.');
    }
}
