@extends('layouts.base')

@section('title', 'Medical Reports')

@section('content')
    <div class="flex flex-col ">
        <h1>Paitent Medical Report</h1>
        <form action="{{ route('doctor.search-medical-reports') }}" method="POST">
            @csrf
            <input type="text" name="nik" placeholder="Insert Patient's NIK">
            <button class="bg-blue-500 px-4 py-2" type="submit">Search</button>
        </form>

        <div>

        </div>
    </div>
@endsection
