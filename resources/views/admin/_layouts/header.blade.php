<section class="flex items-center px-6 py-4 justify-between bg-white  border-b-2 border-gray-200">
    <div class="flex items-center space-x-3 justify-between ">
        <div class="">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:block w-8">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class=" md:col-span-1 lg:col-span-2">
            <div class="flex items-center w-40">
                <img class="w-full" src="{{ asset('images/svg/logo-no-background.svg')  }}" alt="banner_image">

            </div>
        </div>


    </div>
    <div x-data="{ dropdownOpen: false }" class="relative shadow-[0_3px_10px_rgb(0,0,0,0.2)] h-9 w-9 rounded-full mr-3">
        <button @click="dropdownOpen = ! dropdownOpen"
            class="relative block h-9 w-9 overflow-hidden rounded-full focus:outline-none">
            <img class="object-cover w-full h-full " src="{{ asset('images/tagphoto.PNG') }}" alt="tagphoto">
        </button>

        <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full">
        </div>

        <div x-cloak x-show="dropdownOpen"
            class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
            <a href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
            <a href="
            {{-- {{ route('admin.changepassword') }} --}}
            "
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Change
                Password</a>

            <form action=" {{ route('admin.logout') }}" method="POST" class="">
                @csrf
                <button class="w-full flex justify-start">
                    <div class="block px-4 py-2 text-left text-sm w-full text-gray-700 hover:bg-indigo-600 hover:text-white">
                        Logout
                    </div>
                </button>
            </form>

        </div>
    </div>
</section>
