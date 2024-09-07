<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\HealthCenter;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class AppointmentController extends Controller
{
    //
    function get()
    {
        $appointments = Appointment::orderBy('appointment_id')->paginate(10);

        $columns = Schema::getColumnListing('appointments');

        $doctors = Doctor::all();
        $healthCenters = HealthCenter::all();
        $services = Service::all();

        $excludedColumns = ['created_at', 'updated_at'];
        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.appointment', compact('columns', 'appointments', 'doctors', 'healthCenters', 'services'));
    }

    function delete($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->delete();
            return redirect()->route('appointment')->with('success', 'Appointment deleted successfully.');
        }

        return redirect()->route('appointment')->with('error', 'Appointment not found.');
    }

    function add(Request $request)
    {
        $validate = $request->validate([
            'date' => 'required',
            'dokter_id' => 'required',
            'health_center_id' => 'required',
            'service_id' => 'required',
            'time' => 'required',
        ]);

        Appointment::create($validate);
        return redirect()->route('appointment')->with('success');
    }

    function edit($id)
    {
        $appointment = Appointment::find($id);
        $doctors = Doctor::all();
        $healthCenters = HealthCenter::all();
        $services = Service::all();

        return view('page-pertemuan-2.sections.appointment-edit', compact('appointment'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'dokter_id' => 'required',
            'health_center_id' => 'required',
            'service_id' => 'required',
            'time' => 'required',
        ]);

        $appointment = Appointment::find($id);
        $appointment->update($request->all());
        return redirect()->route('appointment')->with('success', 'Appointment updated successfully.');
    }
}
