@extends('frontend.portal._layouts.master')

@section('body')
    <!-- Static sidebar for desktop -->
    @include('admin.message.index')

    <div class="bg-gray-200 h-full z">

        <div class="container bg-gray-100 mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            {{-- <img class="h-auto w-full mx-auto"
                                src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                alt=""> --}}

                        </div>
                        <div class="text-center my-4">
                            {{-- <img class="h-32 w-32 rounded-full border-4 border-white  mx-auto my-4"
                                src="https://randomuser.me/api/portraits/women/21.jpg" alt=""> --}}
                            <div class="py-2">
                                <h3 class="font-bold text-2xl text-gray-800  mb-1">
                                    {{ $user_personal_details->name }}</h3>
                                <div class="inline-flex text-gray-700  items-center">
                                    <svg class="h-5 w-5 text-gray-400  mr-1" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24">
                                        <path class=""
                                            d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                    </svg>
                                    {{ $user_personal_details->address }}
                                </div>

                            </div>
                        </div>
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{ $user_personal_details->created_at->format('jS M Y') }}</span>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 ">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-1 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Full Name</div>
                                    <div class="px-4 py-2">{{ $user_personal_details->name }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email</div>
                                    <div class="px-4 py-2">{{ $user_personal_details->email }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Phone Number</div>
                                    <div class="px-4 py-2">{{ $user_personal_details->phonenumber }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Address</div>
                                    <div class="px-4 py-2">{{ $user_personal_details->address }}</div>
                                </div>

                                <div x-cloak x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                                    class="relative z-50 w-auto h-auto">
                                    <button @click="modalOpen=true"
                                        class="bg-[#0f577d] text-white px-4 py-2 my-2 rounded">Change
                                        Profile</button>
                                    <template x-teleport="body">
                                        <div x-show="modalOpen"
                                            class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                            x-cloak>
                                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                                x-transition:leave="ease-in duration-300"
                                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                                @click="modalOpen=false"
                                                class="absolute inset-0 w-full h-full bg-black bg-opacity-25">
                                            </div>
                                            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                                x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave="ease-in duration-200"
                                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                class="relative w-full py-1 bg-white px-1 sm:max-w-lg sm:rounded-lg">

                                                <div class="relative w-auto">
                                                    <div class="">
                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                            <div class="sm:flex sm:items-start">

                                                                <div class="mt-5 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                    <h3 class="text-lg leading-6 font-medium mt-5 text-gray-900"
                                                                        id="modal-title">
                                                                        Profile
                                                                    </h3>
                                                                    <div class="mt-2">
                                                                        <div class="w-full ">
                                                                            <div class="mt-4">
                                                                                <form method="POST" id="updateprofileform"
                                                                                    action="{{ route('user.updates', Auth::guard('customer_registrations')->user()->id) }}">
                                                                                    @csrf
                                                                                    @method('post')


                                                                                    <div class="flex gap-2 mt-1">
                                                                                        <label class="block mb-2">
                                                                                            <span class="text-gray-700">
                                                                                                Name</span>
                                                                                            <input name="name"
                                                                                                type="text"
                                                                                                value="{{ $user_personal_details != null ? $user_personal_details->name : '' }}"
                                                                                                class="block w-full mt-1 border h-10 rounded-lg p-2" />
                                                                                        </label>
                                                                                        <label class="block mb-2">
                                                                                            <span
                                                                                                class="text-gray-700">Address</span>
                                                                                            <input name="address"
                                                                                                type="text"
                                                                                                value="{{ $user_personal_details != null ? $user_personal_details->address : '' }}"
                                                                                                class="block w-full mt-1 border-gray-300 border h-10 rounded-lg p-2" />
                                                                                        </label>
                                                                                    </div>


                                                                                    <div class="flex gap-2 mt-2">
                                                                                        <label class="block mb-2">
                                                                                            <span
                                                                                                class="text-gray-700">Phone</span>
                                                                                            <input name="phonenumber"
                                                                                                type="text"
                                                                                                value="{{ $user_personal_details != null ? $user_personal_details->phonenumber : '' }}"
                                                                                                class="block w-full mt-1 border-gray-300 border h-10 rounded-lg p-2" />
                                                                                        </label>
                                                                                        <label class="block mb-2">
                                                                                            <span
                                                                                                class="text-gray-700">Email</span>
                                                                                            <input name="email"
                                                                                                type="text"
                                                                                                value="{{ $user_personal_details != null ? $user_personal_details->email : '' }}"
                                                                                                class="block w-full mt-1 border-gray-300 border h-10 rounded-lg p-2" />
                                                                                        </label>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                                                            <button type="submit" id="savebtn"
                                                                onclick="updateProfile()"
                                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                Save
                                                            </button>
                                                            <button @click="modalOpen=false" type="button"
                                                                class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>


                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function updateProfile() {
        let updateform = document.querySelector('#updateprofileform')
        updateform.submit()
    }
</script>
