@extends('page-pertemuan-2.layout.base')

@section('title', 'Statistics')

@section('content')
    <div class="grid grid-rows-2">
        <div class="grid grid-cols-3 gap-8">
            <div class="p-8  rounded-3xl h-56">
                <div class="flex flex-col gap-5">
                    <p class="font-semibold text-lg">Total Patients</p>
                    <p class="text-5xl font-bold text-center">100K</p>
                </div>
            </div>
            <div class="p-8  rounded-3xl h-56">
                <div class="flex flex-col gap-5">
                    <p class="font-semibold text-lg">Total Doctors</p>
                    <p class="text-5xl font-bold text-center">100K</p>
                </div>
            </div>
            <div class="p-8  rounded-3xl h-56">
                <div class="flex flex-col gap-5">
                    <p class="font-semibold text-lg">Total Health Center</p>
                    <p class="text-5xl font-bold text-center">100K</p>
                </div>
            </div>
        </div>
        <div>
            <p>testing</p>
        </div>
    </div>
@endsection
