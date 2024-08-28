<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PBKK 2024 Irfan</title>
</head>

<header>
    <nav class="bg-[#333] w-full py-3">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <p class="text-white font-bold text-lg">PBKK</p>
        </div>
    </nav>
</header>

<body>
    @yield('content')
    <div class="bg-white grid grid-cols-8 text-white">
        <div class="col-span-2 left-0 bg-[#333] h-screen">
            <div class="flex flex-col gap-10">
                <div class="bg-[#222] py-5 px-5">
                    <p class=" text-white">
                        Muhammad <span class="font-bold">Irfan Hakim</span>
                    </p>
                </div>
                {{-- List Number Model --}}
                <div class="p-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li data-pertemuan="1"
                            class="nav-item has-treeview {{ request()->is('pertemuan1/*') ? 'menu-open' : '' }} ">
                            <a href="#" class="nav-link {{ request()->is('pertemuan1/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Pertemuan 1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('param') }}"
                                        class="nav-link {{ request()->is('pertemuan1/param*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Routing Parameter</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('genap-ganjil') }}"
                                        class="nav-link {{ request()->routeIs('genap-ganjil') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Genap Ganjil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fibonacci') }}"
                                        class="nav-link {{ request()->routeIs('fibonacci') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fibonacci</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('bilangan-prima') }}"
                                        class="nav-link {{ request()->routeIs('bilangan-prima') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bilangan Prima</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-span-6 flex flex-col px-10 py-5">

        </div>
    </div>
</body>

</html>
