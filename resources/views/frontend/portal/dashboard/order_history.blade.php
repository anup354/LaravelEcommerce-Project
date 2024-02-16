@extends('frontend.portal._layouts.master')

@section('body')
    <!-- Static sidebar for desktop -->
    <div class=" md:flex md:flex-shrink-0  ">

        <div class="flex flex-col  flex-1 overflow-hidden">
            <div class="flex  flex-shrink-0 ">

                <div class="flex flex-col  flex-1 overflow-hidden">
                    <div class="flex-1 relative flex-shrink-0 overflow-y-auto focus:outline-none">
                        <div class="py-6">

                            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                                <h1 class="text-2xl font-semibold text-gray-900">Order History</h1>
                                <div class="">
                                    Show: 5
                                </div>
                                @if ($order_list->isEmpty())
                                    <div class="text-center text-gray-500 px-2 py-10">Nothing to show...</div>
                                @else
                                    @foreach ($order_list as $key => $order)
                                        <div class="bg-white mt-8 p-3 shadow-lg">
                                            <div class="flex justify-between items-center border-b-[1.5px]">
                                                <div class="flex flex-col space-y-1 py-2">
                                                    <div class="flex text-sm ">
                                                        Order: <span
                                                            class="text-blue-500 ml-1">{{ $order->order_id }}</span>
                                                    </div>
                                                    <div class="flex text-xs text-slate-500">
                                                        Placed on
                                                        <span
                                                            class="ml-1">{{ $order->created_at->format('F j, Y g:i A') }}</span>
                                                    </div>
                                                </div>
                                                <div class="text-blue-600 cursor-pointer">
                                                    <a href="{{ route('user.details', $order->order_id) }}"
                                                        class="hover:underline">
                                                        View
                                                    </a>
                                                </div>
                                            </div>

                                            @foreach ($order->orderItem as $item)
                                                <div class="mt-12 flex justify-between items-start">
                                                    <div class="p-3">
                                                        <img src="{{ asset('uploads/' . $item->product->featured_image) }}"
                                                            alt="product-image" class="h-16 w-24 rounded-lg " />
                                                    </div>
                                                    <div class="">
                                                        {{ $item->product->product_name }}
                                                    </div>
                                                    <div class="text-md text-slate-400">
                                                        Qty: <span class="text-black">
                                                            {{ $item->quantity }}
                                                        </span>
                                                    </div>
                                                    <div>
                                                        @if ($order->order_status == 'DELIVERED')
                                                            <span
                                                                class="py-0.5 px-1 rounded bg-green-500 text-white text-xs">
                                                                {{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'CANCELED')
                                                            <span class="py-0.5 px-1 rounded bg-red-500 text-white text-xs">
                                                                {{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'PROCESSING')
                                                            <span
                                                                class="py-0.5 px-1 rounded bg-orange-500 text-white text-xs">
                                                                {{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'SHIPPED')
                                                            <span
                                                                class="py-0.5 px-1 rounded bg-teal-500 text-white text-xs">
                                                                {{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'VERIFIED')
                                                            <span
                                                                class="py-0.5 px-1 rounded bg-blue-500 text-white text-xs">
                                                                {{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'RETURNED')
                                                            <span
                                                                class="py-0.5 px-1 rounded bg-yellow-500 text-white text-xs">
                                                                {{ $order->order_status }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        {{ $order->created_at->format('F j, Y') }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
