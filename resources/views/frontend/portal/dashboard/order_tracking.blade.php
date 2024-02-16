@extends('frontend.portal._layouts.master')

@section('body')

    <!-- Static sidebar for desktop -->
    <div class=" md:flex md:flex-shrink-0 ">
        <div class="flex flex-col  flex-1 overflow-hidden">
            <div class="flex  flex-shrink-0 ">

                <div class="flex flex-col  flex-1 overflow-hidden">
                    <div class="flex-1 relative flex-shrink-0 overflow-y-auto focus:outline-none">
                        <div class="py-6">

                            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                                <h1 class="text-2xl font-semibold text-gray-900">Track Order</h1>

                                <form method="GET" action="{{ route('user.tracker') }}" class="py-10">
                                    <label for="search"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only ">OrderID</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                        </div>
                                        <input type="search" id="search" name="orderid"
                                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none"
                                            placeholder="OrderID" required>
                                        <button type="submit"
                                            class="text-white absolute right-2.5 bottom-2.5 bg-orange-700 hover:bg-orange-800  font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
                                    </div>
                                </form>

                                @if ($order_list != null)
                                    <p class="ml-10 text-gray-500">Order ID: <span
                                            class="font-bold ml-2 underline">{{ $order_list->order_id }}</span></p>

                                    @if ($order_list->order_status == 'CANCELED')
                                        <div class="text-center text-gray-500 px-2 py-10">Sorry, This order has been
                                            cancelled ...
                                        </div>
                                    @else
                                        <ol class="items-center sm:flex my-10 ml-10  flex justify-between">
                                            <li class=" mb-6 sm:mb-0">
                                                <div class="flex items-center">
                                                    <div
                                                        class="z-10 flex items-center justify-center w-12 h-12 bg-green-200 rounded-full ring-0 ring-white  sm:ring-8 shrink-0">
                                                        <svg class="w-6 h-6 text-green-600" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="hidden sm:flex w-full bg-gray-300 h-0.5 ">
                                                    </div>
                                                </div>
                                                <div class="mt-3 sm:pr-8 ">
                                                    <div class="flex gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                            height="22" fill="currentColor"
                                                            class="bi bi-check2 text-green-600" viewBox="0 0 16 16">
                                                            <path
                                                                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                        </svg>
                                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                                            Processing
                                                        </h3>
                                                    </div>

                                                    <p class="text-base font-normal text-gray-500 ">Your
                                                        order
                                                        is currently being processed and verified.</p>
                                                </div>
                                            </li>
                                            <li class=" mb-6 sm:mb-0">
                                                <div class="flex items-center">
                                                    <div
                                                        class="z-10 flex items-center justify-center w-12 h-12 {{ $order_list->order_status != 'PROCESSING' ? 'bg-green-200' : ' bg-blue-100 ' }}  rounded-full ring-0 ring-white sm:ring-8  shrink-0">
                                                        <svg class="w-6 h-6 {{ $order_list->order_status != 'PROCESSING' ? 'text-green-600' : ' text-blue-800 ' }} "
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="hidden sm:flex w-full bg-gray-200 h-0.5 ">
                                                    </div>
                                                </div>
                                                <div class="mt-3 sm:pr-8">
                                                    <div class="flex gap-1">
                                                        @if ($order_list->order_status != 'PROCESSING')
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                height="22" fill="currentColor"
                                                                class="bi bi-check2 text-green-600" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                            </svg>
                                                        @endif

                                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                                            Verified
                                                        </h3>
                                                    </div>

                                                    <p class="text-base font-normal text-gray-500 "> Order
                                                        verified, packaging in progress to be shipped.</p>
                                                </div>
                                            </li>

                                            <li class="relative mb-6 sm:mb-0">
                                                <div class="flex items-center">
                                                    <div
                                                        class="z-10 flex items-center justify-center w-12 h-12 {{ $order_list->order_status != 'PROCESSING' && $order_list->order_status != 'VERIFIED' ? 'bg-green-200' : ' bg-blue-100 ' }} rounded-full ring-0 ring-white  sm:ring-8  shrink-0">
                                                        <svg class="w-6 h-6 {{ $order_list->order_status != 'PROCESSING' && $order_list->order_status != 'VERIFIED' ? 'text-green-600' : ' text-blue-800 ' }}"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="hidden sm:flex w-full bg-gray-200 h-0.5 ">
                                                    </div>
                                                </div>
                                                <div class="mt-3 sm:pr-8">
                                                    <div class="flex gap-1">
                                                        @if ($order_list->order_status != 'PROCESSING' && $order_list->order_status != 'VERIFIED')
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                height="22" fill="currentColor"
                                                                class="bi bi-check2 text-green-600" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                            </svg>
                                                        @endif

                                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                                            Shipped
                                                        </h3>
                                                    </div>
                                                    <p class="text-base font-normal text-gray-500 ">
                                                        Package
                                                        has been shipped and is in route to be delivered.</p>
                                                </div>
                                            </li>
                                            <li class="relative mb-6 sm:mb-0">
                                                <div class="flex items-center">
                                                    <div
                                                        class="z-10 flex items-center justify-center w-12 h-12 {{ $order_list->order_status == 'DELIVERED' ? 'bg-green-200' : ' bg-blue-100 ' }} rounded-full shrink-0">
                                                        <svg class="w-6 h-6 {{ $order_list->order_status == 'DELIVERED' ? 'text-green-600' : ' text-blue-800 ' }}"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="mt-3 sm:pr-8">
                                                    <div class="flex gap-1">
                                                        @if ($order_list->order_status == 'DELIVERED')
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                height="22" fill="currentColor"
                                                                class="bi bi-check2 text-green-600" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                            </svg>
                                                        @endif

                                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                                            Delivered
                                                        </h3>
                                                    </div>

                                                    <p class="text-base font-normal text-gray-500 ">
                                                        Package
                                                        Delivered.</p>
                                                </div>
                                            </li>
                                        </ol>
                                    @endif
                                @else
                                    <div class="text-center text-gray-500 px-2 py-10">Please Insert a valid order ID ...
                                    </div>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
