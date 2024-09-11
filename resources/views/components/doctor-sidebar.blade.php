<html>
<div class="col-span-2 bg-white border-r-2 border-[#f3f3f3] shadow-xl h-screen">
    <div class="flex flex-col gap-10 items-center justify-center my-10">
        {{-- Logo --}}
        <div>
            <img src="" alt="">
            <p class="text-2xl font-bold text-[#229799]">MED<span class="font-medium text-gray-400">Plus</span></p>
        </div>
        {{-- Nama --}}
        <div class="flex flex-col gap-2 items-center">
            <img src="" alt="" class="rounded-full w-10 h-10 object-cover">
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = ! dropdownOpen"
                    class="relative flex items-center overflow-hidden focus:outline-none gap-3">
                    <p class="text-black">{{ Auth::user()->name }}</p>
                </button>

                <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false"
                    class="fixed inset-0 z-10 w-full h-full"></div>

                <div x-cloak x-show="dropdownOpen"
                    class="absolute left-0 right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                    <a href=" {{ route('profile.show') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
        {{-- List --}}
        <ul id="sidebar-links">
            <!-- Links JavaScript -->
        </ul>
    </div>
</div>

<script>
    const links = [{
            title: 'Dashboard',
            url: '{{ route('doctor.dashboard') }}',
        },
        {
            title: 'Medical Reports',
            url: '{{ route('doctor.search-medical-reports') }}',
        },
        {
            title: 'Appointments',
            url: '{{ route('appointment') }}',
        },
        {
            title: 'Prescriptions',
            url: '{{ route('prescription') }}',
        }
    ];

    const sidebarLinks = document.getElementById('sidebar-links');
    let isActive = localStorage.getItem('activeLink') || 'Dashboard';

    // Verifikasi apakah activeLink ada dalam daftar links
    const linkTitles = links.map(link => link.title);
    if (!linkTitles.includes(isActive)) {
        isActive = 'Dashboard';
        localStorage.setItem('activeLink', isActive);
    }

    links.map(link => {
        const li = document.createElement('li');
        li.innerHTML = `
            <a href="${link.url}" class="my-2 flex items-center justify-start px-5 py-2 hover:bg-gradient-to-r from-[#22979960] to-[#22979930] transition-colors ease-in-out duration-100 hover:text-white hover:shadow-[#22979930] hover:shadow-md rounded-full cursor-pointer ${link.title === isActive ? 'bg-gradient-to-r from-[#229799] to-[#22979940] shadow-[#22979960] shadow-md text-white' : 'text-gray-400'}">
                <p class="text-md flex-1">${link.title}</p>
            </a>
        `;
        li.addEventListener('click', () => {
            isActive = link.title;
            localStorage.setItem('activeLink', isActive);
            updateActiveState();
        });
        sidebarLinks.appendChild(li);
    });

    function updateActiveState() {
        const links = sidebarLinks.querySelectorAll('a');
        links.forEach(link => {
            if (link.textContent.trim() === isActive) {
                link.classList.add('bg-[#22979930]');
            } else {
                link.classList.remove('bg-[#22979930]');
            }
        });
    }

    updateActiveState();
</script>

</html>
