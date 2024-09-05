<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use Illuminate\Support\Facades\Schema;


class DrugController extends Controller
{
    //
    public function get()
    {
        $drugs = Drug::paginate(10);

        $columns = Schema::getColumnListing('drugs');

        $excludedColumns = ['created_at', 'updated_at'];

        $columns = array_diff($columns, $excludedColumns);

        return view('page-pertemuan-2.sections.drug', [
            'columns' => $columns,
            'drugs' => $drugs
        ]);
    }

    function delete($id)
    {
        $drug = Drug::find($id);

        if ($drug) {
            $drug->delete();
            return redirect()->route('drug')->with('success', 'Drug deleted successfully.');
        }

        return redirect()->route('drug')->with('error', 'Drug not found.');
    }
}
