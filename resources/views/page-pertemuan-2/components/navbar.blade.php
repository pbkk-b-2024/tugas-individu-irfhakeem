<html>

<nav class="bg-white w-full px-10 my-10">
    <div class="flex justify-between items-center mx-auto">
        <p class="text-[#229799] font-bold text-xl">@yield('title')</p>
        <div class="flex items-center gap-4">
            @if (Route::currentRouteName() !== 'dashboard')
                <div>
                    <button class="bg-[#229799] px-2 py-[0.4rem] rounded-full items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fill-white" height="18"
                            width="auto"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center">
                    <div class="px-2 bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="auto" viewBox="0 0 512 512"
                            class="fill-gray-400 "><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                    </div>
                    <input id="searchInput" type="text" placeholder="Search here.."
                        class="rounded-r-full text-lg px-3 focus:outline-none focus:border-none">
                </div>
            @endif
        </div>
    </div>
</nav>

</html>
