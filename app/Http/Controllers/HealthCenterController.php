<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCenter;
use Illuminate\Support\Facades\Schema;

class HealthCenterController extends Controller
{
    //
    public function get()
    {
        $healthCenters = HealthCenter::paginate(10);

        $columns = Schema::getColumnListing('health_centers');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.health-center', [
            'columns' => $columns,
            'healthCenters' => $healthCenters
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
}
