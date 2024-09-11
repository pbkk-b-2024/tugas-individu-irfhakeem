@extends('layouts.base')

@section('title', 'Medical Reports')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @foreach ($medicalReports as $medicalReport)
            <p>{{ $medicalReport->nama }}</p>
        @endforeach

    </div>

    <div class="mt-3">
        {{ $medicalReports->onEachSide(1)->links() }}
    </div>

@endsection
