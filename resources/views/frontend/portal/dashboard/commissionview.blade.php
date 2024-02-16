@extends('frontend.portal._layouts.master')

@section('body')
    <div class="pt-5">
        <div class="flex items-center gap-2">
            <a href="{{route("payment.history")}}">
                <div
                    class="border border-[#4456a6] hover:bg-white hover:text-[#4456a6] rounded-full p-1 bg-[#4456a6] text-white ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="17"
                        height="17" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M5 12l6 6"></path>
                        <path d="M5 12l6 -6"></path>
                    </svg>
                </div>
            </a>
            <h1 class="text-2xl font-semibold text-[#4456a6] mb-2">Details </h1>
        </div>

        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="text-left bg-gray-50 p-2">
                <tr class="p-2">
                    <th scope="col " class="p-2 font-semibold ">
                        Product Name
                    </th>
                    <th scope="col " class="p-2 font-semibold ">
                        Order Quantity
                    </th>
                    <th scope="col " class="p-2 font-semibold ">
                        Product Price
                    </th>

                    <th scope="col" class="font-semibold ">
                        Affilate Commission
                    </th>
                    <th scope="col" class="font-semibold ">
                        Incentive Commission
                    </th>


                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($orderitems as $key => $orderitem)
                    {{-- @dd($commission) --}}
                    <tr class="">
                        <td class="p-3">
                            <div>{{ $orderitem->product_name }}</div>
                        </td>
                        <td class="p-3">
                            <div>{{ $orderitem->order_quantity }}</div>
                        </td>
                        <td>
                            <div>{{ $orderitem->order_productPrice }}</div>
                        </td>
                        <td class="">
                            <div>{{ $orderitem->incentive_commission_amount }}</div>
                        </td>
                        <td class="">
                            <div>{{ $orderitem->affiliate_commission_amount }}</div>
                        </td>


                        {{-- <td>{{$commission->created_at->diffForHumans()}}</td>  --}}

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
