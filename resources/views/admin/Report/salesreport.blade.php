@extends('admin._layouts.master')

@section('body')
    <div class="px-5 bg-background w-full">
        <div class="text-2xl font-bold text-[#F1612D]"> Sales Report</div>
        {{-- <div class="flex justify-between">
        <div class="flex">
            <a href='{{ route(' admin.userprofile') }}'
                class='bg-sky-500 text-white h-10 p-2 text-sm flex items-center font-main rounded-lg'>
                <span class='material-symbols-outlined text-sm mr-2'>add</span>
                <span>Add Users</span>
            </a>
        </div>
        </div> --}}

        <div class="mt-8  items-center">
            <form method="GET" action="
                    {{ route('searchsales') }}
                    "
                class=" flex items-center">
                <div class="flex gap-x-5 max-md:space-y-3 max-md:flex-col items-center w-full">
                    <div class="flex-col w-full">
                        <label class=" text-gray-600 text-sm pb-2" for="show-select">From</label>
                        <div class="flex flex-col max-sm:p-2    col-span-3">
                            <input id="datepicker" name="from" class="w-full border text-black py-2 px-4 rounded-md"
                                type="date" value="{{ old('form') }}" placeholder="YYYY-MM-DD" required>
                        </div>

                    </div>
                    <div class="flex-col w-full">
                        <label class=" text-gray-600 text-sm pb-2" for="show-select">To</label>
                        <div class="flex relative">
                            <input id="datepicker" name="to" class="w-full border text-black py-2 px-4 rounded-md"
                                type="date" value="{{ old('to') }}" placeholder="YYYY-MM-DD" required>

                        </div>
                    </div>

                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script>
                        flatpickr("#datepicker", {
                            // dateFormat: "Y-m-d",
                        });
                    </script>
                    <button class="mt-7">
                        <div class=" flex items-center bg-sky-600 px-4 rounded-sm w-full  justify-between">
                            <div>

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
                                </svg>
                            </div>

                            <div
                                class="appearance-none max-md:w-full  border-sky-400    py-2 bg-sky-600 text-md placeholder-gray-400 text-white focus:outline-none">
                                Filter</div>
                        </div>
                    </button>
                </div>
            </form>
            @if ($fromdate)
                <div class="flex lg:space-x-4 justify-between">
                    <div class="flex items-center mt-2 sm:mt-0 lg:mt-5 justify-end space-x-3 w-[20%] max-md:w-full">
                        <div class="relative max-md:w-full w-full">
                            <a href="{{ route('report.csv', request()->query()) }}">
                                <button type="button"
                                    class="appearance-none rounded-md flex items-center justify-between border border-green-400 border-b p-2  w-full bg-green-600 text-sm placeholder-gray-400 text-white focus:bg-green-800 focus:placeholder-green-600 focus:text-white focus:outline-none">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-type-csv" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                            <path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" />
                                            <path
                                                d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                                            <path d="M16 15l2 6l2 -6" />
                                        </svg>
                                    </span>
                                    <span class="text-xs">
                                        Download CSV
                                    </span>
                                </button>
                            </a>
                        </div>
                        <div class="relative max-md:w-full w-full">
                            <a href="{{ route('report.pdf', request()->query()) }}">
                                <button type="button"
                                    class="appearance-none rounded-md flex items-center p-2 justify-between border border-red-300 border-b  bg-red-400 text-white  w-full  text-sm placeholder-gray-400  focus:bg-red-800 focus:placeholder-red-600 focus:text-white focus:outline-none">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-type-pdf" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                            <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                                            <path d="M17 18h2" />
                                            <path d="M20 15h-3v6" />
                                            <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                                        </svg>
                                    </span>
                                    <span class="text-xs">
                                        Download PDF
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="mt-7  my-3 ">
                    <span class="text-[#4456a6] text-md">Report from
                        <label class="text-[#F1612D] font-semibold">{{ $fromdate }}</label>
                        to
                        <label class="text-[#F1612D] font-semibold"> {{ $todate }}</label>
                    </span>
                </div>
            @endif
            @if ($home == 1)
                <div class="bg-white p-3 mt-5 rounded-lg font-main  shadow">
                    <div class="relative overflow-x-auto ">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="font-normal p-10">
                                <tr class="">
                                    <th scope="col " class="p-2 font-semibold ">
                                        Order ID
                                    </th>

                                    <th scope="col" class="font-semibold ">
                                        Total Price
                                    </th>
                                    <th scope="col" class="font-semibold ">
                                        Payment Method
                                    </th>

                                    <th scope="col" class="font-semibold ">
                                        Delivered Date
                                    </th>
                                    <th scope="col" class="font-semibold ">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($order_list as $key => $orders)
                                <tbody class="bg-white divide-y divide-gray-200 text-center">
                                    <tr>
                                        <td class="">
                                            <div>{{ $orders->order_id }}</div>
                                        </td>


                                        <td class="">
                                            <div>{{ $orders->amount }}</div>
                                        </td>
                                        <td class="">
                                            <div>{{ $orders->payment_method }}</div>
                                        </td>

                                        <td>
                                            <div>{{ (new \DateTime($orders->delivered_date))->format('jS M Y') }}</div>

                                        </td>


                                        <td>
                                            <div class="flex p-2 justify-center">
                                                <a href={{ route('order.details', $orders->order_id) }}>

                                                    <div class="bg-[#6B9E41] py-2 px-2 mx-2 text-white rounded-md">
                                                        View Details
                                                    </div>
                                                </a>



                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            @else
                <div class="item center text-[#F1612D] w-full flex justify-center p-4 mt-2 bg-white">
                    Choose From and To Date to see report
                </div>
            @endif
            @if ($order_list->isEmpty())
                <div class="item center w-full flex justify-center p-4 mt-2 bg-white">
                    No data found
                </div>
            @endif


            @if ($totalprice)
                <div class="float-right my-5 text-lg">
                    Total Sale:<label class="text-[#F1612D] text-xl">
                        Rs. {{ $totalprice }}
                    </label>
                </div>
            @endif

            <div class="mt-5 ">
                {{-- {{ $userdatas->links('vendor.pagination.tailwind') }} --}}
                {{-- {{ $userdatas->appends($params)->links() }} --}}
            </div>
        </div>
    </div>

@endsection
