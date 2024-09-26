<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddHealthCenterRequest;
use App\Http\Requests\GetHealthCenterByIdRequest;
use App\Http\Requests\UpdateHealthCenterRequest;
use Illuminate\Http\Request;
use App\Models\HealthCenter;
use App\Models\HealthCenterService;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class HealthCenterController extends Controller
{
    //
    public function get()
    {
        $healthCenters = HealthCenter::orderBy('health_center_id')->paginate(10);

        $columns = Schema::getColumnListing('health_centers');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        $services = Service::select('service_id', 'nama')->get();

        return view('page-pertemuan-2.sections.health-center', [
            'columns' => $columns,
            'healthCenters' => $healthCenters,
            'services' => $services
        ]);
    }

    function delete($id)
    {
        $healthCenter = HealthCenter::find($id);

        if ($healthCenter) {
            $healthCenter->delete();
            return redirect()->route('healthCenter')->with('success', 'Health Center deleted successfully.');
        }

        return redirect()->route('healthCenter')->with('error', 'Health Center not found.');
    }
    function add(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'service_id' => 'required|array',
            'service_id.*' => 'exists:services,service_id',
        ]);

        $healthCenter = HealthCenter::create($request->only('nama', 'alamat', 'no_telp', 'email'));
        // dd($healthCenter);

        foreach ($request->service_id as $serviceId) {
            HealthCenterService::create([
                'health_center_id' => $healthCenter->health_center_id,
                'service_id' => $serviceId
            ]);
        }

        return redirect()->route('healthCenter')->with('success', 'Health Center and services added successfully.');
    }

    function edit($id)
    {
        $healthCenter = HealthCenter::find($id);
        $services = Service::select('service_id', 'nama')->get();
        $healthCenterServices = HealthCenterService::where('health_center_id', $id)->pluck('service_id')->toArray();

        // dd($healthCenterServices);

        return view('page-pertemuan-2.sections.health-center-edit', compact('healthCenter', 'services', 'healthCenterServices'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'service_id' => 'required|array',
            'service_id.*' => 'exists:services,service_id',
        ]);

        $healthCenter = HealthCenter::find($id);
        $healthCenter->update($request->only('nama', 'alamat', 'no_telp', 'email'));

        $existingServices = HealthCenterService::where('health_center_id', $id)->pluck('service_id')->toArray();

        foreach ($existingServices as $existingServiceId) {
            if (!in_array($existingServiceId, $request->service_id)) {
                HealthCenterService::where('health_center_id', $id)
                    ->where('service_id', $existingServiceId)
                    ->delete();
            }
        }

        foreach ($request->service_id as $serviceId) {
            if (!in_array($serviceId, $existingServices)) {
                HealthCenterService::create([
                    'health_center_id' => $healthCenter->health_center_id,
                    'service_id' => $serviceId
                ]);
            }
        }

        return redirect()->route('healthCenter')->with('success', 'Health Center updated successfully.');
    }

    function getHealthCenter()
    {
        $healthCenters = HealthCenter::all();
        return response()->json($healthCenters);
    }

    function getHealthCenterById(GetHealthCenterByIdRequest $request)
    {
        $healthCenter = HealthCenter::find($request->health_center_id);
        $healthCenter->services = HealthCenterService::where('health_center_id', $healthCenter->health_center_id)->pluck('service_id')->toArray();

        if ($healthCenter) {
            return response()->json($healthCenter);
        }

        return response()->json([
            'message' => 'Health Center not found.'
        ], 400);
    }

    function addHealthCenter(AddHealthCenterRequest $request)
    {
        $healthCenter = HealthCenter::create($request->only('nama', 'alamat', 'no_telp', 'email'));

        foreach ($request->service_id as $serviceId) {
            HealthCenterService::create([
                'health_center_id' => $healthCenter->health_center_id,
                'service_id' => $serviceId
            ]);
        }

        $healthCenter->services = HealthCenterService::where('health_center_id', $healthCenter->health_center_id)->pluck('service_id')->toArray();

        return response()->json([
            'message' => 'Health Center and services added successfully.',
            'data' => $healthCenter
        ]);
    }

    function deleteHealthCenter(GetHealthCenterByIdRequest $request)
    {
        $healthCenter = HealthCenter::find($request->health_center_id);

        if ($healthCenter) {
            $healthCenter->delete();
            return response()->json([
                'message' => 'Health Center deleted successfully.'
            ]);
        }

        return response()->json([
            'message' => 'Health Center not found.'
        ], 400);
    }

    function updateHealthCenter(UpdateHealthCenterRequest $request)
    {
        $healthCenter = HealthCenter::find($request->health_center_id);

        if ($healthCenter) {
            $healthCenter->update($request->only('nama', 'alamat', 'no_telp', 'email'));

            $existingServices = HealthCenterService::where('health_center_id', $healthCenter->health_center_id)->pluck('service_id')->toArray();

            foreach ($existingServices as $existingServiceId) {
                if (!in_array($existingServiceId, $request->service_id)) {
                    HealthCenterService::where('health_center_id', $healthCenter->health_center_id)
                        ->where('service_id', $existingServiceId)
                        ->delete();
                }
            }

            foreach ($request->service_id as $serviceId) {
                if (!in_array($serviceId, $existingServices)) {
                    HealthCenterService::create([
                        'health_center_id' => $healthCenter->health_center_id,
                        'service_id' => $serviceId
                    ]);
                }
            }

            return response()->json([
                'message' => 'Health Center updated successfully.',
            ]);
        }

        return response()->json([
            'message' => 'Health Center not found.'
        ], 400);
    }
}
