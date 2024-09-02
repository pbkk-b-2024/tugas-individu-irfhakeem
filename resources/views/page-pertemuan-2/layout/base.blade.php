<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PBKK 2024 Irfan</title>
</head>


<body>
    <header>
    </header>
    <div class="bg-white grid grid-cols-10 text-white">
        @include('page-pertemuan-2.components.sidebar')
        <div class="col-span-8 flex flex-col text-black gap-10">
            @include('page-pertemuan-2.components.navbar')
            <div class="px-10">
                @yield('content')
            </div>
        </div>
    </div>

    <footer>
        @include('page-pertemuan-2.components.footer')
    </footer>

    @yield('script')
</body>

</html>
