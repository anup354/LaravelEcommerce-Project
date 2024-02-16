@extends('frontend.portal._layouts.master')

@section('body')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Payment History</h1>

        @if ($commissions->isEmpty())
            <div class="text-center text-gray-500 px-2 py-10">Nothing to show...</div>
        @else
            <div class="pt-5">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="text-left bg-gray-50 p-2">
                        <tr class="p-2">
                            <th scope="col " class="p-2 font-semibold ">
                                Order ID
                            </th>
                            <th scope="col " class="p-2 font-semibold ">
                                Items
                            </th>

                            <th scope="col" class="font-semibold ">
                                Affilate Commission
                            </th>
                            <th scope="col" class="font-semibold ">
                                Incentive Commission
                            </th>

                            <th scope="col" class="font-semibold ">
                                Date
                            </th>
                            <th scope="col" class="font-semibold ">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($commissions as $key => $commission)
                            {{-- @dd($commission) --}}
                            <tr class="">
                                <td class="p-3">
                                    <div>{{ $commission->order_id }}</div>
                                </td>
                                <td class="p-3">
                                    <div>{{ $commission->items }}</div>
                                </td>
                                <td class="">
                                    <div>{{ $commission->affilate_commission }}</div>
                                </td>
                                <td class="">
                                    <div>{{ $commission->incentive_commission }}</div>
                                </td>

                                <td>
                                    <div>{{ $commission->created_at->format('jS M Y') }}</div>
                                </td>
                                {{-- <td>{{$commission->created_at->diffForHumans()}}</td>  --}}

                                <td>
                                    <div class="flex p-2 justify-center">
                                        <a href={{ route('user.affilatecommission', $commission->order_id) }}>

                                            <div class="bg-[#6B9E41] py-2 px-2 mx-2 text-white rounded-md">
                                                View Details
                                            </div>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif
    </div>
    

@endsection
