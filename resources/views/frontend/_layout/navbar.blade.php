<style>
    #results {
        display: none;
        position: absolute;
        max-height: 150px;
        width: 100%;
        overflow-y: auto;
        z-index: 999;
        /* Ensure the dropdown is above other content */
    }

    .result-item {
        padding: 5px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .result-item:hover {
        background-color: #F2F2F2;
    }
</style>
<section class="sticky top-0 bg-white z-[999] px-20 max-lg:px-10 max-md:px-5 mx-auto max-w-screen-2xl max-md:shadow-md">

    <div class="flex  py-5 justify-between  items-center ">
        <div class="flex max-lg:gap-2">
            <a href="{{ route('home') }}"><img src="{{ asset('images/svg/logo-no-background.svg') }}" alt="logo" class="w-40 "></a>
        </div>
        {{-- #9b1df1 --}}
        <div class="w-[40%] relative max-md:hidden   ">
            <form action="
            {{ route('productsearch') }}
            " method="GET">
                <div class="flex">
                    <div class="relative w-full">
                        <input type="text" id="search" name="search-term"
                            class="block border border-[#4456a6] p-2.5 w-full z-20 text-sm text-gray-900 rounded-md outline-none "
                            placeholder="Search for product" required>
                        <button type="submit" class="absolute top-0 right-0 p-2.5 text-[#4456a6]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                <path d="M21 21l-6 -6"></path>
                            </svg>
                        </button>
                        <ul id="results" class="mt-2 border rounded-md bg-white shadow-lg">
                    </div>
                </div>
            </form>
        </div>
        <div class="flex justify-end space-x-3">
            <div class="flex space-x-6 max-md:space-x-7 items-center  text-[#4456a6]">
                <a href="
            {{ route('wishlist') }}
            ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>
                <div class="relative ">
                    <a href="
                {{ route('cart') }}
                ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>
                    </a>

                    <div id="cartCount"
                        class="absolute cart-count max-md:bottom-4 bottom-4 left-3.5 bg-[#4456a6] text-white rounded-full text-xs px-1">
                        {{ totalCartQuantity() }}
                    </div>

                </div>

                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <div>
                        <button x-on:click="open = true" type="button"
                            class="inline-flex justify-center w-full text-sm mt-1 font-medium focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-blue-700" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <svg class="w-4 h-4 ml-2 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                style="margin-top:3px">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>
                    </div>
                    <div x-cloak x-show="open" x-on:click.away="open = false"
                        class="absolute w-36 right-1  bg-white shadow-lg rounded-xl  ring-1 ring-black ring-opacity-5 focus:outline-none">

                        @if (Auth::guard('customer_registrations')->user())
                            <a
                                href="
                            {{ route('portal.dashboard') }}
                            ">
                                <div class="py-1 border-b border-gray-200" role="none">
                                    <button
                                        class="flex px-4 rounded-tl-md py-2 text-sm text-gray-700 border-l-2 border-transparent  hover:border-[#7065d4] ">
                                        <span class="mr-2">
                                        </span>Dashboard</button>
                                </div>
                            </a>
                            <div class="py-1" role="none">
                                <form action=" {{ route('front.logout') }}" method="POST" class="">
                                    @csrf
                                    <button
                                        class=" px-4 py-2  text-sm text-gray-700 border-l-2 border-transparent rounded-bl-md hover:border-[#7065d4] ">
                                        <span class="mr-2">
                                        </span>Logout</button>
                                </form>
                            </div>
                        @else
                            <div class="py-1 border-b" role="none">
                                <a href="
                            {{ route('register') }}
                            "
                                    class="{{ request()->segment(1) == 'register' ? 'active flex px-4 py-2 text-sm font-medium border-l-2 border-transparent  rounded-tl-md hover:border-[#7065d4] hover:text-[#7065d4] text-[#4456a6] underline' : 'flex px-4 py-2 text-sm font-medium border-l-2 border-transparent  rounded-tl-md hover:border-[#7065d4] hover:text-[#7065d4] text-[#4456a6]' }}">
                                    <span class="mr-2">

                                    </span>Register</a>
                            </div>

                            <div class="py-1" role="none">
                                <a href="
                            {{ route('login') }}
                            "
                                    class="{{ request()->segment(1) == 'login' ? 'active flex px-4 py-2 text-sm font-medium border-l-2 border-transparent  rounded-bl-md hover:border-[#7065d4] hover:text-[#7065d4] text-[#4456a6]  underline' : 'flex px-4 py-2 text-sm font-medium border-l-2 border-transparent  rounded-bl-md hover:border-[#7065d4] hover:text-[#7065d4] text-[#4456a6] ' }} ">
                                    <span class="mr-2">

                                    </span>Login</a>
                            </div>
                        @endif
                    </div>
                </div>



            </div>
            {{-- <div id="mobileNavToggle" class="navbar-burger  md:hidden " href="#">
                <div x-data="{
                    slideOverOpen: false
                }" class="relative  w-auto h-auto">
                    <button @click="slideOverOpen=true"
                        class="inline-flex text-[#4456a6]  z-[50] items-center justify-center  p-2 text-lg font-medium transition-colors bg-white  rounded-md hover:bg-neutral-100 active:bg-white disabled:opacity-50 disabled:pointer-events-none  float-right   ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#4456a6] "fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                    </button>
                    <template x-teleport="body">
                        <div x-show="slideOverOpen" @keydown.window.escape="slideOverOpen=false"
                            class="relative z-[99]">
                            <div x-show="slideOverOpen" x-transition.opacity.duration.600ms
                                @click="slideOverOpen = false" class="fixed inset-0  bg-black bg-opacity-10">
                            </div>
                            <div class="fixed inset-0 overflow-hidden">
                                <div class="absolute inset-0 overflow-hidden">
                                    <div class="fixed inset-y-0 right-0 flex max-w-full ">
                                        <div x-show="slideOverOpen" @click.away="slideOverOpen = false"
                                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                            x-transition:enter-start="translate-x-full"
                                            x-transition:enter-end="translate-x-0"
                                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                            x-transition:leave-start="translate-x-0"
                                            x-transition:leave-end="translate-x-full" class="w-screen max-w-xs">
                                            <div
                                                class="flex flex-col h-full    bg-white border-l shadow-lg border-neutral-100/70">
                                                <div class="px-4 sm:px-5 sticky py-3 top-0 z-50 bg-white ">
                                                    <div class="flex flex-col justify-center items-center">
                                                        <div class="text-xl mt-3 font-semibold leading-6 text-gray-900"
                                                            id="slide-over-title">Category</div>
                                                        <div class="">
                                                            <button @click="slideOverOpen=false"
                                                                class=" top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 space-x-1 text-xs font-medium   rounded-md border-neutral-200 text-neutral-600 hover:bg-slate-300 hover:rounded-full hover:p-2 hover:text-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-10 h-10">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="relative  flex-1 px-2 mt-5 z-10 sm:px-5">
                                                    <div class="absolute inset-0 px-4 sm:px-5">
                                                        <div class="relative h-full overflow-y-hidden rounded-md ">
                                                            <aside class="p-4">
                                                                @foreach (getCategories(0) as $key => $parentcategory)
                                                                    <div id="dropdownContact_{{ $parentcategory->id }}"
                                                                        data-dropdown-toggle="dropdown"
                                                                        class="flex-1 mt-2 item cursor-pointer">

                                                                        <div
                                                                            class="link custom-flex flex items-center mt-2 item">
                                                                            <span @click="isOpen = !isOpen">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-chevron-right"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor"
                                                                                    fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                        d="M0 0h24v24H0z"
                                                                                        fill="none" />
                                                                                    <path d="M9 6l6 6l-6 6" />
                                                                                </svg>
                                                                            </span>
                                                                            <span class="text-orange-500">
                                                                                {{ $parentcategory->categoryname }}
                                                                            </span>
                                                                        </div>
                                                                    </div>



                                                                    <!-- Dropdown menu -->
                                                                    @if (count(getCategories($parentcategory->id)) > 0)
                                                                        <div id="contactdropdown_{{ $parentcategory->id }}"
                                                                            class="z-10 hidden ml-5 divide-y divide-gray-100 bg-white">
                                                                            <ul class="text-sm text-blue-900 ml-1.5 "
                                                                                aria-labelledby="dropdownDefaultButton">
                                                                                <li class="flex-row mt-2 item ">
                                                                                    @foreach (getCategories($parentcategory->id) as $key => $subcategory)
                                                                                        <div
                                                                                            class="link custom-flex flex items-center space-x-1  mt-2 ">
                                                                                            {{ $subcategory->categoryname }}
                                                                                        </div>

                                                                                        @if (count(getCategories($subcategory->id)) > 0)
                                                                                            <ul class="text-sm text-gray-700"
                                                                                                aria-labelledby="dropdownDefaultButton">
                                                                                                <li
                                                                                                    class="ml-3.5 flex-row mt-0.5 item">
                                                                                                    @foreach (getCategories($subcategory->id) as $key => $subsubcategory)
                                                                                                        <div
                                                                                                            class="link custom-flex flex-1  mt-1.5  p-1.5 item">
                                                                                                            {{ $subsubcategory->categoryname }}
                                                                                                        </div>
                                                                                                    @endforeach
                                                                                                </li>
                                                                                            </ul>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                                <script>
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                        const dropdownButtons = document.querySelectorAll("[data-dropdown-toggle]");

                                                                        dropdownButtons.forEach((dropdownButton) => {
                                                                            const dropdownMenu = dropdownButton.nextElementSibling;

                                                                            dropdownButton.addEventListener("click", function(event) {
                                                                                event.preventDefault();
                                                                                dropdownMenu.classList.toggle("hidden");
                                                                            });

                                                                            // Hide the dropdown when clicking outside of it
                                                                            document.addEventListener("click", function(event) {
                                                                                if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event
                                                                                        .target)) {
                                                                                    dropdownMenu.classList.add("hidden");
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                                                </script>





                                                            </aside>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

            </div> --}}
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</section>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mobileNavToggle = document.getElementById('mobileNavToggle');
        const mobileNavLinks = document.getElementById('mobileNavLinks');

        mobileNavToggle.addEventListener('click', () => {
            mobileNavLinks.classList.toggle('hidden');
        });
    });
</script>
