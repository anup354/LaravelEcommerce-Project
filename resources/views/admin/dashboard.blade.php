@extends('admin._layouts.master')

@section('body')
    <div>
        <div class="grid grid-cols-1 gap-4  mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg></div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Total Users</h3>
                    <p class="text-3xl">{{ $totaluser }}</p>
                </div>
            </div>

            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-brand-producthunt h-12 w-12 text-white" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    </svg>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Total Products</h3>
                    <p class="text-3xl">{{ $totalproduct }}</p>
                </div>
            </div>

            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                        </path>
                    </svg></div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Total Blogs</h3>
                    <p class="text-3xl">{{ $totalblog }}</p>
                </div>
            </div>

            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-[#0f577d]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-truck-delivery h-12 w-12 text-white" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                        <path d="M3 9l4 0"></path>
                    </svg>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Total Order</h3>
                    <p class="text-3xl">{{ $totalorder }}</p>
                </div>
            </div>
        </div>

        <div class=" mt-5">
            <div class="bg-white p-3 mt-5 rounded-md font-main  shadow">
                <div class="relative ">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="font-normal p-10">
                            <tr class="">
                                <th scope="col " class="p-2 text-left text-[#f15a28] text-lg font-medium ">
                                    Top Selling Product
                                </th>


                            </tr>
                        </thead>
                        <tbody class="flex gap-5  flex-wrap bg-white  text-center">
                            @foreach ($topsellingproduct as $key => $topsellingproduct)
                                <tr class="flex flex-col mt-4">
                                    <td class="w-40 h-40">
                                        <img class="w-full h-full object-cover "
                                            src="{{ asset('/uploads/' . $topsellingproduct->featured_image) }}"
                                            alt="Card">

                                    </td>

                                    <td class="">
                                        <div class="text-[#f15a28] font-medium text-lg">
                                            {{ $topsellingproduct->product_name }}</div>
                                    </td>
                                    <td class="text-gray-500 font-medium text-md">
                                        <div>{{ $topsellingproduct->total_sale }} pcs</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
