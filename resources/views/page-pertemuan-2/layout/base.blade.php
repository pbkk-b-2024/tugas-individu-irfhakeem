<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <title>PBKK 2024 Irfan</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>


<body>
    <div class="bg-white grid grid-cols-10 text-white">
        @include('page-pertemuan-2.components.sidebar')
        <div class=" col-span-8 flex flex-col text-black gap-10 h-screen">
            @include('page-pertemuan-2.components.navbar')
            <div class="px-10">
                @yield('content')
            </div>
            @include('page-pertemuan-2.components.footer')
        </div>
    </div>

    @yield('script')
</body>

</html>
