@if ($items->count())
    <div class="rounded-lg md:w-2/3">
        <div class="flex justify-between ">
            <div class=" text-center text-2xl text-[#4456a6] font-bold">
                Cart Items
            </div>
            <div
                class=" clearall rounded-md p-1.5 overflow-hidden relative group cursor-pointer font-medium bg-[#4456a6] text-red-800 ">
                <span
                    class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-red-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                <span class="relative text-white transition duration-300 group-hover:text-white ease">Clear Cart</span>
            </div>
        </div>
        <div class="py-2 text-[#f15a28]">
            <span class="font-bold">Note:</span>
            <span class="font-medium"> Get free delivery on purchases over Rs. 1500.</span>
        </div>
        {{-- @dd($items) --}}
        @foreach ($items as $key => $item)
            {{-- @dd($item->associatedModel->id) --}}
            {{-- $decodedArray = json_decode($jsonString, true); --}}

            <div class="justify-between mb-6 rounded-lg bg-white py-6 pl-6 shadow-md sm:flex sm:justify-start">
                <div singleId={{ $item->id }}
                    class="max-sm:block hidden clearSingle float-right -mt-6  h-8 rounded-tr-lg rounded-bl-lg p-1.5 overflow-hidden relative group cursor-pointer font-medium bg-[#4456a6] text-red-800 ">
                    <span
                        class="absolute w-32 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-red-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                    <span class="relative text-white transition duration-300 group-hover:text-white ease">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </span>
                </div>

                {{-- @dd($item->attributes->attr) --}}
                <img src="{{ asset('/uploads/' . $item->attributes->image) }}" alt="product-image"
                    class=" rounded-lg h-24" />

                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="mt-5 sm:mt-0 text-xs">
                        <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>
                        {{-- <p class="mt-1 text-xs text-gray-700">36EU - 4US</p> --}}
                        <p class="text-sm font-semibold mt-2">Rs. {{ $item->price }}</p>

                        @if ($item->attributes->attr)
                            <div class=" flex gap-1 ">
                                @foreach ($item->attributes->attr as $key => $attri)
                                    <div class=" border bg-[#4456a6] text-white p-1 rounded">
                                        {{ getCartAttributes($attri)->attribute_name }}
                                        {{-- {{$key}} --}}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6 pr-6">
                        <div class="flex items-center border-gray-100">
                            <a values={{ $item->id }}
                                class="sub-quantity cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100
                        hover:bg-[#7065d4] hover:text-blue-50">
                                - </a>
                            <input class="h-8 w-12 border bg-white text-center text-xs outline-none" type="number"
                                readonly value="{{ $item->quantity }}" min="1" />
                            <a value={{ $item->id }}
                                class="add-quantity cursor-pointer rounded-r bg-gray-100 py-1 px-3
                        duration-100
                        hover:bg-[#7065d4] hover:text-blue-50">
                                + </a>
                        </div>
                        <div class="flex items-center space-x-4">
                            Rs. {{ Cart::get($item->id)->getPriceSum() }}
                        </div>
                    </div>
                </div>
                <div singleId={{ $item->id }}
                    class="clearSingle cursor-pointer float-right pr-2 max-sm:hidden block -mt-6 rounded-tr-lg rounded-bl-lg p-1 text-white font-bold bg-[#4456a6] h-8 overflow-hidden relative group  ">
                    <span
                        class="absolute w-32 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-red-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                    <span class="relative text-white transition duration-300 group-hover:text-white ease">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </span>
                </div>


            </div>
        @endforeach
    </div>
    <!-- Sub total -->

    <div class="mt-14 mb-3 h-full rounded-lg border bg-white p-6 shadow-md  md:w-1/3 ">

        <div class="mb-2 flex justify-between">
            <p class="text-gray-700">Subtotal</p>
            <p class="text-gray-700"> Rs. {{ Cart::getSubTotal() }}
            </p>
        </div>

        <hr class="my-4" />
        <div class="flex justify-between">
            <p class="text-lg font-bold">Total</p>
            <div class="">
                <p class="mb-1 text-lg font-bold">
                    Rs. {{ Cart::getSubTotal() }}
                </p>
                {{-- <p class="text-sm text-gray-700">including Delivery</p> --}}
            </div>
        </div>
        <a href="{{ route('checkout') }}"
            class="mt-6 border  text-center font-semibold bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white block transition duration-700 ease-in-out hover:text-[#4456a6] ">Check
            out</a>
        <a href="{{ route('home') }}"
            class="border mt-2 text-center font-semibold hover:bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 hover:text-white bg-white block transition duration-700 ease-in-out text-[#4456a6]  ">Continue
            Shopping</a>
    </div>
@else
    <div class=" mb-6 text-center text-[#4456a6]">
        <div class="  text-2xl text-primary font-bold">
            Cart Items
        </div>
        <div class="p-3">
            No items Found
        </div>
    </div>

@endif



<input type="hidden" value="{{ $items->count() }}" id="data">
