@extends('layout.base')

@section('title', 'Basic Routing')

@section('content')
    <div class="flex flex-col gap-3">
        <p>Contoh basic Rounting get untuk menuju "/"</p>
        <a href="/" class="bg-black px-5 py-2 rounded-lg text-white w-[10%] text-center">
            Return Home
        </a>
    </div>
@endsection
