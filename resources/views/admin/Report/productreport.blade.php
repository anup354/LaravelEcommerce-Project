@extends('admin._layouts.master')

@section('body')
    <div class="bg-white p-3 mt-5 rounded-lg font-main  shadow">
        {{-- <div class="flex item-center gap-1">
        <div>
            <input type="text"
                class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                name="search" />
        </div>
        <div class="border px-2.5 py-2 bg-gray-100 rounded text-[#7065d4] font-medium cursor-pointer">
            Search
        </div>
    </div> --}}

        <div class="">
            <div class="text-[#f15a28] text-lg font-medium">
                Product Report
            </div>
            <form method="GET" action="{{ route('productreport') }} " class=" p-2">
                <div class="py-2">
                    <label class="text-gray-600">Product Name : </label>
                    {{-- <input type="text"
                    class="border my-1 border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block max-md:w-full w-1/2 p-2.5"
                    name="productname" placeholder="Type productname" /> --}}



                    <select id="default"
                        class="border my-1 w-48 border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block max-md:w-full p-2.5 "
                        name="productid">
                        <option value="" selected>Choose a Product</option>
                        @foreach ($allproducts as $product)
                            <option value="{{ $product->id }}" @if ($singleproduct && $singleproduct->id == $product->id) selected @endif>
                                {{ $product->product_name }}
                            </option>
                        @endforeach

                        {{-- <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option> --}}
                    </select>
                </div>
                <div class="flex gap-x-5 max-md:space-y-3 max-md:flex-col items-center w-full">

                    <div class="flex-col w-full">
                        <label class=" text-gray-600 text-sm pb-2" for="show-select">From</label>
                        <div class="flex flex-col max-sm:p-2    col-span-3">
                            <input id="datepicker" name="from" class="w-full border text-black py-2 px-4 rounded-md"
                                type="date" value="{{ old('form', $fromdate) }}" placeholder="YYYY-MM-DD" required>
                        </div>

                    </div>
                    <div class="flex-col w-full">
                        <label class=" text-gray-600 text-sm pb-2" for="show-select">To</label>
                        <div class="flex relative">
                            <input id="datepicker" name="to" class="w-full border text-black py-2 px-4 rounded-md"
                                type="date" value="{{ old('to', $todate) }}" placeholder="YYYY-MM-DD" required>

                        </div>
                    </div>

                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script>
                        flatpickr("#datepicker", {
                            // dateFormat: "Y-m-d",
                        });
                    </script>
                    <button class=" mt-7">

                        <div class=" flex bg-sky-600 px-4 rounded-sm ">
                            <div class=" inset-y-0  flex items-center pl-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
                                </svg>
                            </div>
                            <div
                                class="appearance-none   border-sky-400 block   py-2 bg-sky-600 text-md placeholder-gray-400 text-white focus:outline-none">
                                Filter</div>
                        </div>
                    </button>
                </div>
            </form>
        </div>

        @if ($singleproduct)
            <div class="py-2 px-2 text-gray-600 ">

                <div class="py-2 ">
                    Product Name: <label class="text-gray-700">{{ $singleproduct->product_name }}</label>
                </div>
                <div class="">
                    Available Stock: <label class="text-gray-700">{{ $singleproduct->product_stock }}</label>
                </div>
            </div>
        @endif


        <div class="relative overflow-x-auto ">
            <table class="w-full divide-y divide-gray-200">
                <thead class="font-normal p-10">
                    <tr class="">
                        <th scope="col " class="p-2 font-semibold ">
                            Product Name
                        </th>
                        <th scope="col " class="p-2 font-semibold ">
                            Attributes
                        </th>

                        <th scope="col" class="font-semibold ">
                            Quantity
                        </th>
                        <th scope="col" class="font-semibold ">
                            Delivered Date
                        </th>
                        {{-- <th scope="col" class="font-semibold ">
                        View Status
                    </th>
                    <th scope="col" class="font-semibold ">
                        Status
                    </th>

                    <th scope="col" class="font-semibold ">
                        Ordered Date
                    </th>
                    <th scope="col" class="font-semibold ">
                        Actions
                    </th> --}}
                    </tr>
                </thead>


                @if ($productreports)
                    @foreach ($productreports as $key => $productreport)
                        {{-- @dd($productreport) --}}
                        <tbody class="bg-white divide-y divide-gray-200 text-center items-center">
                            <tr>
                                {{-- @dd( $productreport) --}}
                                <td class="">
                                    <div>{{ getProductName($productreport->orderproductid)->product_name }}</div>
                                </td>
                                {{-- @dd($productreport) --}}
                                @php
                                    $attributes = getproductattribute($productreport->orderitemid);
                                @endphp
                                <td class="p-2.5">
                                    <div class="flex justify-center gap-3 flex-wrap">
                                        @foreach ($attributes as $key => $attribute)
                                            <div class="bg-[#f15a28] text-white p-1.5 rounded font-normal">
                                                {{ $attribute->getAttributename->attribute_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </td>


                                <td class="">
                                    <div>{{ $productreport->orderedquantity }}</div>
                                </td>
                                {{-- <td class="">
                            <div>{{ $orders->payment_method }}</div>
                        </td>

                        <td class="">
                            <div class="p-2 ">{{ $orders->view_status == 1 ? 'seen' : 'Not seen' }}
                            </div>
                        </td>
                        <td class="">
                            <div class="p-2 bg-slate-300">{{ $orders->order_status }}</div>
                        </td> --}}

                                <td>
                                    <div>{{ (new \DateTime($productreport->orderdeliverydate))->format('jS M Y') }}
                                    </div>

                                </td>


                                {{-- <td>
                                <div class="flex p-2 justify-center">
                                    <a href=
                                    {{ route('order.details', $orders->order_id) }}
                                    >

                                        <div class="bg-[#6B9E41] py-2 px-2 mx-2 text-white rounded-md">
                                            View Details
                                        </div>
                                    </a>



                                </div>
                            </td> --}}
                            </tr>

                        </tbody>
                    @endforeach
                @endif
            </table>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
            <script>
                $('#default').select2({
                    multi: true
                });
            </script>

        </div>
    </div>
    @if (!request('productid'))
        <div class="item center text-[#F1612D] w-full flex justify-center p-4 mt-2 bg-white">
            Choose Product Name , From and To Date to see report
        </div>
    @endif
    @if ($productreports)
        @if ($productreports->isEmpty())
            <div class="item center w-full flex justify-center p-4 mt-2 bg-white">
                No data found
            </div>
        @endif
    @endif
@endsection



