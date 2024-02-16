@extends('admin._layouts.master')

@section('body')
    <div>
        @include('admin.message.index')
        <div class="flex justify-between">
            <div class="text-2xl font-bold  text-[#F1612D]">Rating</div>
        </div>
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
            <div class="relative overflow-x-auto ">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="font-normal p-10">
                        <tr class="">
                            {{-- <th scope="col " class="p-2 font-semibold ">
                                ID
                            </th> --}}

                            <th scope="col" class="p-2 font-semibold ">
                                Product
                            </th>

                            <th scope="col" class="font-semibold ">
                                Rating
                            </th>
                            {{-- <th scope="col" class="font-semibold ">
                                Comment
                            </th> --}}

                            <th scope="col" class="font-semibold ">
                                Rated By
                            </th>
                            <th scope="col" class="font-semibold ">
                                Status
                            </th>
                            <th scope="col" class="font-semibold ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    @foreach ($ratings as $key => $rating)
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            <tr>
                                {{-- <td class="">
                                    <div>{{ $rating->id }}</div>
                                </td> --}}
                                <td class="">
                                    <div>{{ $rating->product->product_name }}</div>
                                </td>
                                <td class="">
                                    <div>{{ $rating->rating }}</div>
                                </td>

                                {{-- <td class="">
                                    <div class="p-2 ">{{ $rating->review }}</div>
                                </td> --}}
                                <td class="">
                                    <div class="p-2 ">{{ $rating->getUser->name }}</div>
                                </td>
                                {{-- <td class="">
                                    <div class="p-2 bg-lime-600 text-white">{{ $rating->status  }}
                                    </div>
                                </td> --}}

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <div class="relative">
                                            {{-- @if ($rating->status == 'VERIFIED') --}}
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold @if ($rating->status == 'VERIFIED') text-green-900 @elseif($rating->status == 'PENDING') text-yellow-500 @else text-red-900 @endif  leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 @if ($rating->status == 'VERIFIED') bg-green-200 @elseif($rating->status == 'PENDING') bg-yellow-200 @else bg-red-200 @endif  opacity-50 rounded-full"></span>
                                                <span class="relative">{{ $rating->status }}</span>
                                            </span>

                                        </div>
                                    </span>
                                </td>

                                {{-- <td>
                                    <div>{{ (new \DateTime($orders->delivered_date))->format('jS M Y') }}</div>

                                </td> --}}


                                <td>
                                    <div class="flex p-2 justify-center">
                                        <a href={{ route('rating.show', $rating->id) }}>
                                            <div
                                                class="bg-[#6B9E41] border   border-[#6B9E41] px-4 py-1 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#6B9E41]">
                                                View Details
                                            </div>
                                        </a>

                                        <form method="POST"
                                            action="
                                        {{ route('rating.destroy', $rating->id) }}"
                                            id="delete-form-{{ $rating->id }}">
                                            @csrf
                                            @method('delete')

                                            <button type="button" onclick="deleteSingleImage({{ $rating->id }})"
                                                class="bg-red-600 border   border-red-600 px-4 py-1 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        {{--
                                        <a href={{ route('rating.show', $rating->id) }}>
                                            <div class="bg-red-600 border   border-red-600 px-4 py-1 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-red-600">
                                                Delete
                                            </div>
                                        </a> --}}
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="z-0 mt-3">
            {{ $ratings->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
