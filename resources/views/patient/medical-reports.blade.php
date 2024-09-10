@extends('layouts.base')

@section('title', 'Medical Reports')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <tbody id="myTable" class="text-center">
                @foreach ($medicalReports as $medicalReport)
                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $medicalReports->onEachSide(1)->links() }}
    </div>

@endsection
