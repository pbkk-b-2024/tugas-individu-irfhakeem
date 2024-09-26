<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDoctorRequest;
use App\Http\Requests\DoctorGetBySipRequest;
use App\Http\Requests\GetDoctorByIdRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\HealthCenter;
use App\Models\Specialization;
use Illuminate\Support\Facades\Schema;


class DoctorController extends Controller
{
    public function get()
    {
        $doctors = Doctor::paginate(10);

        $columns = Schema::getColumnListing('doctors');

        $excludedColumns = ['created_at', 'updated_at'];

        $healthCenters = HealthCenter::all();
        $specializations = Specialization::all();

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.doctor', compact('columns', 'doctors', 'healthCenters', 'specializations'));
    }

    function delete($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor) {
            $doctor->delete();
            return redirect()->route('doctor')->with('success', 'Doctor deleted successfully.');
        }

        return redirect()->route('doctor')->with('error', 'Doctor not found.');
    }

    function add(Request $request)
    {
        $doctor = new Doctor();
        $doctor->sip = $request->sip;
        $doctor->nama = $request->nama;
        $doctor->email = $request->email;
        $doctor->no_hp = $request->no_hp;
        $doctor->jenis_kelamin = $request->jenis_kelamin;
        $doctor->spesialis_id = $request->spesialis_id;
        $doctor->tanggal_lahir = $request->tanggal_lahir;
        $doctor->health_center_id = $request->health_center_id;
        $doctor->save();

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = $request->sip;
        $user->save();

        $user->assignRole('doctor');
        return redirect()->route('doctor')->with('success');
    }

    function edit($id)
    {

        $doctor = Doctor::find($id);
        $healthCenters = HealthCenter::all();
        $specializations = Specialization::all();

        return view('page-pertemuan-2.sections.doctor-edit', compact('doctor', 'healthCenters', 'specializations'));
    }

    function update(Request $request, $id)
    {
        $validate = $request->validate([
            'sip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'spesialis_id' => 'required',
            'tanggal_lahir' => 'required',
            'health_center_id' => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor->update($validate);

        return redirect()->route('doctor')->with('success', 'Doctor updated successfully.');
    }

    // API
    public function getDoctor()
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    public function getDoctorById(GetDoctorByIdRequest $request)
    {
        $validated = $request->validated();
        $doctor_id = $validated['doctor_id'];
        $doctor = Doctor::where('doctor_id', $doctor_id)->first();

        if ($doctor) {
            return response()->json($doctor);
        }

        return response()->json([
            'message' => 'Doctor not found'
        ], 400);
    }

    public function addDoctor(AddDoctorRequest $request)
    {
        // Validasi otomatis dilakukan oleh FormRequest, jadi tidak perlu pengecekan manual
        $validated = $request->validated();

        // Membuat dan menyimpan data dokter
        $doctor = new Doctor();
        $doctor->sip = $validated['sip'];
        $doctor->nama = $validated['nama'];
        $doctor->email = $validated['email'];
        $doctor->no_hp = $validated['no_hp'];
        $doctor->jenis_kelamin = $validated['jenis_kelamin'];
        $doctor->spesialis_id = $validated['spesialis_id'];
        $doctor->tanggal_lahir = $validated['tanggal_lahir'];
        $doctor->health_center_id = $validated['health_center_id'];
        $doctor->save();

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = $request->sip;
        $user->save();

        // Menetapkan role 'doctor' ke user
        $user->assignRole('doctor');

        // Mengembalikan response
        return response()->json([
            'message' => 'Doctor added successfully',
            'data' => $doctor
        ]);
    }
}
