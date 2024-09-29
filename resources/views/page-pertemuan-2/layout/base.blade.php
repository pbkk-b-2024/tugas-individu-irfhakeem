<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>PBKK 2024 Irfan</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Custom Scrollbar Styles */
        ::-webkit-scrollbar {
            height: 8px;
            width: 8px
        }

        ::-webkit-scrollbar-track {
            border-radius: 4px;
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #229799;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #22979970;
        }
    </style>
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
    <div class="bg-white grid grid-cols-10 text-white h-screen">
        @include('page-pertemuan-2.components.sidebar')
        <div class="col-span-8 flex flex-col text-black h-screen ">
            @include('page-pertemuan-2.components.navbar')
            <div class="px-10 flex-1 overflow-x-auto overflow-y-hidden">
                @yield('content')
            </div>
            @include('page-pertemuan-2.components.footer')
        </div>
    </div>

    @yield('script')
</body>

</html>
