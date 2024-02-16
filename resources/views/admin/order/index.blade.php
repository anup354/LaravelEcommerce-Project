@extends('admin._layouts.master')

@section('body')
    <div>
        @include('admin.message.index')
        <div class="flex justify-between">
            <div class="text-2xl font-bold">Orders</div>
        </div>
        <div class="bg-white p-3 mt-5 rounded-lg font-main  shadow">
            <div class="flex item-center gap-1">
                <div>
                    <input type="text"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                        name="search" />
                </div>
                <div class="border px-2.5 py-2 bg-gray-100 rounded text-[#7065d4] font-medium cursor-pointer">
                    Search
                </div>
            </div>


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

                                <td class="">
                                    <div class="p-2 ">{{ $orders->view_status == 1 ? 'seen' : 'Not seen' }}
                                    </div>
                                </td>
                                <td class="">
                                    @if ($orders->order_status == 'DELIVERED')
                                        <span class="py-0.5 px-1 rounded bg-green-500 text-white text-xs">
                                            {{ $orders->order_status }}</span>
                                    @elseif ($orders->order_status == 'CANCELED')
                                        <span class="py-0.5 px-1 rounded bg-red-500 text-white text-xs">
                                            {{ $orders->order_status }}</span>
                                    @elseif ($orders->order_status == 'PROCESSING')
                                        <span class="py-0.5 px-1 rounded bg-orange-500 text-white text-xs">
                                            {{ $orders->order_status }}</span>
                                    @elseif ($orders->order_status == 'SHIPPED')
                                        <span class="py-0.5 px-1 rounded bg-teal-500 text-white text-xs">
                                            {{ $orders->order_status }}</span>
                                    @elseif ($orders->order_status == 'VERIFIED')
                                        <span class="py-0.5 px-1 rounded bg-blue-500 text-white text-xs">
                                            {{ $orders->order_status }}</span>
                                    @elseif ($orders->order_status == 'RETURNED')
                                        <span class="py-0.5 px-1 rounded bg-yellow-500 text-white text-xs">
                                            {{ $orders->order_status }}</span>
                                    @endif
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
    </div>
@endsection
