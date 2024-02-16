@extends('frontend.portal.dashlayouts.master')
@section('body')
    <div class="flex flex-wrap gap-x-4 gap-y-12  px-4 py-20 lg:px-20">
        {{-- <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-gray-700 to-gray-400 text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm  capitalize">Total Amount</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">14,000</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class=""><span class="text-sm font-bold text-green-600">+22% </span>vs last month</p>
                </div>
            </div>
        </div>
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-blue-700 to-[#7065d4] text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm  capitalize">Pending Amount</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">2,300</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class=""><span class="text-sm font-bold text-green-600">+3% </span>vs last month</p>
                </div>
            </div>
        </div> --}}
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-12 w-16 rounded-xl bg-gradient-to-tr from-emerald-700 to-emerald-500 text-center text-white shadow-lg">


                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 amountsvg text-white h-7 w-16" height="1em"
                            viewBox="0 0 448 512">
                            <style>
                                .amountsvg {
                                    fill: #ffffff
                                }
                            </style>
                            <path
                                d="M0 64C0 46.3 14.3 32 32 32h80c79.5 0 144 64.5 144 144c0 58.8-35.2 109.3-85.7 131.7l51.4 128.4c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8L106.3 320H64V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 64zM64 256h48c44.2 0 80-35.8 80-80s-35.8-80-80-80H64V256zm256.5 16.4c-.9 6 0 8.7 .4 9.8c.4 1.1 1.4 2.6 4.2 4.9c7.2 5.7 18.7 10 37.9 16.8l1.3 .5c16 5.6 38.7 13.6 55.7 28.1c9.5 8.1 17.9 18.6 23.1 32.3c5.1 13.7 6.1 28.5 3.8 44c-4.2 28.1-20.5 49.3-43.8 60.9c-22.1 11-48.1 12.5-73.2 8l-.2 0 0 0c-9.3-1.8-20.5-5.7-29.3-9c-6-2.3-12.6-4.9-17.7-6.9l0 0c-2.5-1-4.6-1.8-6.3-2.5c-16.5-6.4-24.6-25-18.2-41.4s24.9-24.6 41.4-18.2c2.6 1 5.2 2 7.9 3.1l0 0c4.8 1.9 9.8 3.9 15.4 6c8.8 3.3 15.3 5.4 18.7 6c15.7 2.8 26.7 .8 32.9-2.3c5-2.5 8-6 9.1-13c1-6.9 .2-10.5-.5-12.3c-.6-1.7-1.8-3.6-4.5-5.9c-6.9-5.8-18.2-10.4-36.9-17l-3-1.1c-15.5-5.4-37-13-53.3-25.9c-9.5-7.5-18.3-17.6-23.7-31c-5.5-13.4-6.6-28-4.4-43.2c8.4-57.1 67-78 116.9-68.9c6.9 1.3 27.3 5.8 35.4 8.4c16.9 5.2 26.3 23.2 21.1 40.1s-23.2 26.3-40.1 21.1c-4.7-1.4-22.3-5.5-27.9-6.5c-14.6-2.7-25.8-.4-32.6 3.2c-6.3 3.3-8.9 7.6-9.5 12z" />
                        </svg>
                    </div>

                    <div class="pt-1 text-right">
                        <p class="text-sm  capitalize">Pending Amount</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">Rs.{{ $user->earning }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
