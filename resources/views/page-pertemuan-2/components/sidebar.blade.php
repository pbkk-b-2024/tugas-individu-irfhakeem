<html>
<div class="col-span-2 bg-white border-r-2 border-[#f3f3f3] shadow-xl h-screen">
    <div class="flex flex-col gap-10 items-center justify-between py-10 h-full">
        <div class="flex flex-col gap-10 items-center justify-center">
            {{-- Logo --}}
            <div>
                <img src="" alt="">
                <p class="text-2xl font-bold text-[#229799]">MED<span class="font-medium text-gray-400">Plus</span></p>
            </div>
            {{-- Avatar --}}
            <div class="flex flex-col gap-2 items-center">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-20 w-20 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                @endif
                <p class="text-black">{{ Auth::user()->name }}</p>

            </div>

            {{-- List --}}
            <ul id="sidebar-links">
                @role('admin')
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Dashboard</p>
                        </a>
                    </li>
                @endrole
                @role('patient')
                    <li>
                        <a href="{{ route('dashboardPatient') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('dashboardPatient') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('medicalReportsPatient') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('medicalReportsPatient') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">My Medical Report</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('prescriptionPatient') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('prescriptionPatient') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">My Prescriptions</p>
                        </a>
                    </li>
                @endrole
                @role('doctor')
                    <li>
                        <a href="{{ route('dashboardDoctor') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('dashboardDoctor') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Dashboard</p>
                        </a>
                    </li>
                @endrole
                @can('add patients')
                    <li>
                        <a href="{{ route('pasien') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('pasien') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Patients</p>
                        </a>
                    </li>
                @endcan
                @can('add doctors')
                    <li>
                        <a href="{{ route('doctor') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('doctor') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Doctors</p>
                        </a>
                    </li>
                @endcan
                @can('add medical reports')
                    <li>
                        <a href="{{ route('medicalReport') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('medicalReport') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Medical Reports</p>
                        </a>
                    </li>
                @endcan
                @can('add specializations')
                    <li>
                        <a href="{{ route('specialization') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('specialization') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Specializations</p>
                        </a>
                    </li>
                @endcan
                @can('add health centers')
                    <li>
                        <a href="{{ route('healthCenter') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('healthCenter') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Health Centers</p>
                        </a>
                    </li>
                @endcan
                @can('add drugs')
                    <li>
                        <a href="{{ route('drug') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('drug') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Drugs</p>
                        </a>
                    </li>
                @endcan
                @can('add prescriptions')
                    <li>
                        <a href="{{ route('prescription') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('prescription') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Prescriptions</p>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('appointment') }}"
                        class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('appointment') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                        <p class="text-md flex-1">Appointments</p>
                    </a>
                </li>
                @can('add services')
                    <li>
                        <a href="{{ route('service') }}"
                            class="my-2 flex items-center justify-start px-5 py-2 transition-colors ease-in-out duration-100 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer text-gray-400 {{ request()->routeIs('service') ? 'bg-gradient-to-r from-[#229799] to-[#22979960] shadow-[#22979960] shadow-md text-white' : '' }}">
                            <p class="text-md flex-1">Services</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>


        <div>
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button
                    @click="dropdownOpen = !dropdownOpen; $nextTick(() => { if (dropdownOpen) { $refs.icon.classList.add('active'); $refs.icon.classList.remove('nonactive');} else { $refs.icon.classList.remove('active'); $refs.icon.classList.add('nonactive'); } })"
                    class="relative flex items-center overflow-hidden focus:outline-none gap-3">
                    <svg ref="icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#9ca3af"
                        :class="{ 'active ': dropdownOpen, 'fill-gray-400 nonactive': !dropdownOpen }"
                        viewBox="0 0 512 512">
                        <path
                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                    </svg>
                </button>

                <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false"
                    class="fixed inset-0 z-10 w-full h-full"></div>

                <div x-cloak x-show="dropdownOpen"
                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                    <a href="{{ route('profile.show') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <div class="border-t border-gray-200"></div>

                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

</html>
