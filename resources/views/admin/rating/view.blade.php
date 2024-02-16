@extends('admin._layouts.master')

@section('body')
    {{-- @dd($ratings) --}}
    <div class="m-auto">
        @include('admin.message.index')
        <div class="border p-7 bg-white rounded-lg">
            <div class="flex gap-4">
                <a href="{{ route('rating.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M5 12l6 6"></path>
                        <path d="M5 12l6 -6"></path>
                    </svg>
                </a>
                <div class="text-xl font-bold">Rating</div>
            </div>

            <div class=" pt-4 bg-gray-50 p-4 mt-5">
                <div class=" grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-3">
                        <label for="Bank Name" class="block  text-sm font-bold text-gray-700">
                            Product Name
                        </label>
                        {{ $rating->product->product_name }}
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="address" class="block text-sm font-bold text-gray-700">
                            Rating
                        </label>
                        {{ $rating->rating }}
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="email" class="block text-sm font-bold text-gray-700">
                            Rated By
                        </label>
                        {{ $rating->getUser->name }}
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <p class="font-bold block text-sm text-gray-700">
                            Review
                        </p>
                        {{ $rating->review }}
                    </div>

                    <div class="flex flex-col justify-between col-span-6 sm:col-span-3">
                        <div>
                            <p class="font-bold text-gray-700 py-1 text-base">
                                Status
                            </p>
                            <div class="relative">
                                {{-- @if ($rating->status == 'VERIFIED') --}}
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold @if ($rating->status == 'VERIFIED') text-green-900 @elseif($rating->status == 'PENDING') text-yellow-500 @else text-red-900 @endif  leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 @if ($rating->status == 'VERIFIED') bg-green-200 @elseif($rating->status == 'PENDING') bg-yellow-200 @else bg-red-200 @endif  opacity-50 rounded-full"></span>
                                    <span class="relative">{{ $rating->status }}</span>
                                </span>

                            </div>
                        </div>

                        <div class="my-1">
                            {{-- @if ($rating->status === 'VERIFIED' || $rating->status === 'REJECTED')
                                        <div class="">

                                        </div>
                                    @else --}}
                            <div class="flex mt-3">
                                <form
                                    action="
                                                {{ route('changestatus', $rating->id) }}
                                                "
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="changestatus" value="VERIFIED" />
                                    <button type="submit" class="mr-2 py-1 px-3 bg-lime-600 text-white rounded-md">
                                        Verify
                                    </button>
                                </form>
                                <form
                                    action="
                                                {{ route('changestatus', $rating->id) }}
                                                "
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="changestatus" value="REJECTED" />
                                    <button class="mr-2 py-1 px-3 bg-red-800 text-white rounded-md ">
                                        Reject
                                    </button>
                                </form>
                            </div>
                            {{-- @endif --}}
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
