<html>
<div class="col-span-2 bg-[#0895a4] h-screen border-r-2 border-[#f3f3f3]">
    <div class="flex flex-col gap-10 items-center justify-center my-10">
        {{-- Logo --}}
        <div>
            <img src="" alt="">
            <p>Wise</p>
        </div>
        {{-- Avatar --}}
        <div class="flex flex-col gap-3 items-center">
            <img src="" alt="" class="rounded-full w-10 h-10 object-cover">
            <p class="text-white text-sm font-medium">Irfan Hakim</p>
        </div>
        {{-- List --}}
        <ul>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center justify-center gap-2 px-5 py-2 text-white hover:bg-[#22979950] hover:rounded-full cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="auto"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm64 192c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 192c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192zM320 288c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32z" />
                    </svg>
                    <p class="text-xl font-medium flex-1">
                        Dashboard
                    </p>
                </a>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center justify-center gap-2 px-5 py-2 text-white hover:bg-[#22979930] hover:rounded-full cursor-pointer">
                    <p class="text-xl font-medium flex-1">
                        CRUD Pasien
                    </p>
                </a>
            </li>
        </ul>
    </div>
</div>

</html>
