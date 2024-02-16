@extends('frontend._layout._master')
<style>
    table {
        border-collapse: collapse;
        width: auto;
        border: 1px solid #ccc;
        overflow-x: scroll;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        border-left: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<style>
    .tooltip {
        position: relative;
        display: inline-block;
        /* border-bottom: 1px dotted black; */
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: #4456a6;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        top: 120%;
        left: 50%;
        margin-left: -60px;
    }

    .tooltip .tooltiptext::after {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent #4456a6 transparent;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    iframe {
        height: 300px;
        width: 100%;
    }

    #content-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .column {
        width: 600px;
        padding: 10px;

    }

    #featured {
        /* max-width: 500px; */
        max-height: 600px;
        object-fit: cover;
        cursor: pointer;
        /* border: 2px solid black; */

    }

    .thumbnail {
        object-fit: cover;
        max-width: 180px;
        max-height: 100px;
        cursor: pointer;
        opacity: 0.5;
        margin: 5px;
        border: 2px solid black;

    }

    .thumbnail:hover {
        opacity: 1;
    }

    .active {
        opacity: 1;
    }

    #slide-wrapper {
        max-width: 500px;
        display: flex;
        min-height: 100px;
        align-items: center;
    }

    #slider {
        width: 500px;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;

    }

    #slider::-webkit-scrollbar {
        width: 4px;

    }

    .arrow {
        width: 30px;
        height: 30px;
        cursor: pointer;
        transition: .3s;
    }
</style>
@section('body')
    <div class="mx-auto max-w-screen-2xl max-md:px-0 px-16">
        @include('admin.message.index')
        <div class="mx-5">

            <div class="flex text-md text-gray-500 mb-5">
                <div class="breadcrumbs">
                    <ul class="flex">
                        <li class="hover:text-[#f15a28] hover:underline"> <a href="{{ route('home') }}">Home</a>
                        </li>
                        @foreach ($breadcrumbs as $breadcrumb)
                            <span class="separator mx-2">/</span>
                            <li>
                                <a class="hover:text-[#f15a28] hover:underline"
                                    href="  {{ route('getbycategory', ['category' => $breadcrumb->slug . '?0da2qwz=' . $breadcrumb->category_id]) }}">{{ $breadcrumb->categoryname }}
                                    {{-- <a href="{{ route('category.index', ['category' => $breadcrumb->id]) }}">{{ $breadcrumb->categoryname }} --}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- @include('frontend.layouts.menunav') --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                <div class="p-4 bg-white shadow relative">
                    <a id="gallarylink" href="{{ asset('uploads/' . $product->featured_image) }}" data-fancybox="gallery"
                        data-rotation="0" target="_blank" class="block  w-full">
                        <img id="featured" src="{{ asset('uploads/' . $product->featured_image) }}"
                            class="w-full h-auto sm:h-[60vh]  hover:text-black rounded-t-xl object-contain">
                    </a>

                    <div class="mt-2 ">
                        @if (!$productImage->isEmpty())
                            <div id="slide-wrapper" class="relative ">
                                <svg id="slideLeft" class="arrow left-arrow " xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13.59 7.41L9 12l4.59 4.6L15 15.18L11.82 12L15 8.82M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14Z" />
                                </svg>

                                <div id="slider" class="flex items-center justify-center">
                                    @foreach ($productImage as $key => $img)
                                        <a href="{{ asset('uploads/' . $img->images) }}" data-fancybox="gallery"
                                            data-rotation="0" target="_blank">
                                            <img class="thumbnail aspect-square"
                                                src="{{ asset('uploads/' . $img->images) }}">
                                        </a>
                                    @endforeach
                                </div>

                                <svg id="slideRight" class="arrow right-arrow " xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10.41 7.41L15 12l-4.59 4.6L9 15.18L12.18 12L9 8.82M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5Z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>


                <div s_productId={{ $product->id }} class=" ">
                    <div class="text-5xl font-semibold ">{{ $product->product_name }}</div>
                    <div class="text-2xl  text-[#F1612D] py-5">
                        Rs. <span id="price">{{ (int) $product->product_price - (int) $product->discount_amount }}
                        </span>
                    </div>



                    <form class="add-to-cart" method="POST" action="{{ route('cart.store') }}">
                        @csrf
                        <input type="hidden" name="selectedAttributes" id="selectedAttributesInput" value="">
                        @php
                            $attr = [];
                        @endphp
                        @if (!$attributeItems->isEmpty())
                            <div class="mt-4 flex gap-8">

                                @foreach ($attributeItems as $attributegroup)
                                    <div>
                                        <div class="text-[#4456a6] font-semibold py-1">

                                            {{ $attributegroup->attribute_group_name }}
                                        </div>
                                        @php

                                            $attributes = showAttributes($attributegroup->attribute_group_id, $product->id);
                                            // dd($attributes);
                                        @endphp



                                        <div class="flex flex-wrap gap-4">

                                            <div class="">
                                                <select id="{{ $attributegroup->attribute_group_id }}"
                                                    name="myattributes[{{ $attributegroup->attribute_group_id }}]"
                                                    {{-- onchange="selectAtrribute(this)" --}}
                                                    class="border cursor-pointer border-gray-200 rounded-lg py-2 px-4 leading-tight focus:outline-none focus:border-blue-500">
                                                    @foreach ($attributes as $attributeitem)
                                                        <option value="{{ $attributeitem->id }}">
                                                            {{ $attributeitem->attribute_name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>



                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="my-5">
                            @if ($product->product_stock == 0)
                                <div class="italic text-[#F1612D]"> ( Out of Stock)
                                </div>
                            @endif
                            <div id="stockmessage" class="italic hidden text-[#F1612D]">Availabel Quantity :
                                {{ $product->product_stock }} ( Out of Stock)
                            </div>

                            <div class="flex flex-wrap mt-2 gap-2 items-center ">
                                <div class="flex flex-wrap gap-3">
                                    <div class="flex border justify-center bg-white items-center font-medium rounded-md">
                                        <span
                                            class="text-center pt-2 border-r w-8 h-full cursor-pointer hover:bg-[#529aca] hover:text-white focus:outline-none"
                                            onclick="decrementQuantity()">-</span>
                                        <div class="border-r flex justify-center items-center h-full w-9 quantity-counter">1
                                        </div>

                                        <input type="hidden" value="{{ $product->product_stock }}"
                                            id="availablequantity" />
                                        <input type="hidden" value="{{ $product->id }}" name="product_id" />
                                        <input type="hidden" value="1" name="quantity" id="quantity" />


                                        <span
                                            class="text-center pt-2 border-l w-8 h-full cursor-pointer hover:bg-[#529aca] hover:text-white focus:outline-none"
                                            onclick="incrementQuantity()">+</span>
                                    </div>

                                    <input type="hidden" name="sumprice"
                                        value="{{ (int) $product->product_price - (int) $product->discount_amount }}"
                                        id="alltotalPrice" />
                                    {{-- @if (Auth::guard('customers')->user()) --}}
                                    {{-- <a href="{{ route('cart') }}"> --}}

                                    <button id="cartbutton" {{ $product->product_stock == 0 ? 'disabled' : '' }}
                                        class="{{ $product->product_stock == 0 ? 'font-medium bg-[#5096bb] text-white py-2 px-3 rounded-md' : 'font-medium bg-[#4456a6] text-white py-2 px-3 rounded-md' }} ">ADD
                                        TO CART</button>

                                </div>
                                <div class="tooltip">
                                    <div wishlistproductId="{{ $product->id }}"
                                        class="product-wishlist  cursor-pointer flex justify-between font-medium border bg-[#4456a6] text-white py-2 px-3 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-heart-filled" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z"
                                                stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                        <span class="max-md:block hidden text-[#4456a6]">Add to wishlist</span>
                                    </div>
                                    <span class="tooltiptext max-md:hidden block text-[#4456a6] ">Add to wishlist</span>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="py-4">Total: <span id="totalQuantity">1</span> Quantity of MRP: <span
                            id="totalPrice">{{ (int) $product->product_price - (int) $product->discount_amount }}</span>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.openModal').on('click', function(e) {
                        $('#interestModal').removeClass('invisible');
                    });
                    $('.closeModal').on('click', function(e) {
                        $('#interestModal').addClass('invisible');
                    });
                });
            </script>
            <script>
                function incrementQuantity() {
                    let quantityElement = document.querySelector('.quantity-counter');
                    let quantity = document.querySelector('#quantity');

                    let availableqty = document.getElementById("availablequantity").value
                    let stockmessage = document.getElementById("stockmessage")
                    let cartbutton = document.getElementById("cartbutton")
                    let currentQuantity = parseInt(quantityElement.textContent);
                    console.log(availableqty)
                    console.log(currentQuantity + 1)
                    let checkquantity = currentQuantity + 1
                    if (availableqty < checkquantity) {
                        stockmessage.classList.remove("hidden");
                        cartbutton.classList.add("hidden");
                    }
                    quantityElement.textContent = currentQuantity + 1;
                    quantity.value = currentQuantity + 1;
                    updateTotalQuantity();
                }

                function decrementQuantity() {
                    let quantityElement = document.querySelector('.quantity-counter');
                    let quantity = document.querySelector('#quantity');
                    let currentQuantity = parseInt(quantityElement.textContent);

                    let availableqty = document.getElementById("availablequantity").value
                    let stockmessage = document.getElementById("stockmessage")
                    let cartbutton = document.getElementById("cartbutton")


                    let checkquantity = currentQuantity - 1
                    if (availableqty >= checkquantity) {
                        stockmessage.classList.add("hidden");
                        cartbutton.classList.remove("hidden");
                    }
                    if (currentQuantity > 1) {


                        quantityElement.textContent = currentQuantity - 1;
                        quantity.value = currentQuantity - 1;
                        updateTotalQuantity();
                    }
                }

                function updateTotalQuantity() {
                    let totalQuantityElement = document.getElementById('totalQuantity');
                    let totalPriceElement = document.getElementById('totalPrice');

                    let alltotalPriceElement = document.getElementById('alltotalPrice');

                    let PriceElement = document.getElementById('price').textContent;
                    let quantityCounter = document.querySelector('.quantity-counter').textContent;
                    totalQuantityElement.textContent = quantityCounter;

                    totalPriceElement.textContent = parseInt(quantityCounter) * parseInt(PriceElement);
                    alltotalPriceElement.value = parseInt(quantityCounter) * parseInt(PriceElement);
                }
            </script>




            <div class="">
                <div class="text-xl text-[#89BA46] py-5 font-medium pb-5 flex gap-10">
                    <div class=" cursor-pointer text-[#4456a6] " id="description">Description</div>
                </div>


                <div class="border px-5  overflow-x-scroll py-5 rounded-lg bg-white content " id="descriptionContent">
                    <div id="mylist">{!! $product->description !!}</div>

                </div>

                <script>
                    document.getElementById("mylist.div").classList.remove("min-h-[20px]", "text-message", "flex", "flex-col",
                        "items-start", "gap-3", "whitespace-pre-wrap", "break-words");
                    document.querySelectorAll(".text-message + &").forEach(element => {
                        element.classList.add("mt-5", "overflow-x-auto");
                    });
                </script>

            </div>
            @if ($product->video)
                <div class="text-[#4456a6] text-xl  mt-5 font-semibold">
                    Product Video
                </div>
                <div class="mt-5 items-center flex justify-center">
                    <video width="600" height="500" controls>
                        <source src="{{ asset('uploads/' . $product->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endif



            <div class="mt-5">
                <div class=" bg-gray-50">
                    <!-- Reviews -->
                    <div class="my-10  flex flex-wrap border ">
                        <div class="flex flex-col p-4">
                            <div class="">
                                <h1 class="text-3xl  font-bold text-[#4456a6]">
                                    What people think
                                    about <span class="text-[#f15a28]">{{ $product->product_name }}</span>
                                </h1>

                            </div>

                            <div class="flex gap-2">
                                <div class="font-medium text-[#f15a28]">Reviews</div>
                                <div class="font-medium text-[#f15a28]">({{ $reviewcount }})</div>
                            </div>
                            <div class="flex items-start justify-between">
                                <div class="mb-4  font-bold w-full ">
                                    <p class="text-start text-2xl">
                                        {{ $averagerating }}
                                    </p>
                                    <div class="flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                $fullStar = floor((int) $averagerating);
                                                $halfStar = ceil((int) $averagerating - (int) $fullStar);
                                            @endphp
                                            @if ($i <= $fullStar)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @elseif ($i == $fullStar + 1 && $halfStar)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <ul class="mb-6 mt-2 space-y-2 w-full border-l-2 pl-5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php
                                            $rating = $reviews->where('rating', $i)->first();
                                        @endphp
                                        <li class="flex items-center text-sm font-medium">
                                            <span class="w-3">{{ $i }}</span>
                                            <span class="mr-4 text-yellow-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </span>
                                            <div class="mr-4 h-2 w-full overflow-hidden rounded-full bg-gray-300">
                                                @if ($rating)
                                                    <div class="h-full w-{{ $rating->count * 2 }}/12 bg-yellow-400"></div>
                                                @else
                                                    <div class="h-full w-0 bg-yellow-400"></div>
                                                @endif
                                            </div>
                                            <span class="w-3">{{ $rating ? $rating->count : 0 }}</span>
                                        </li>
                                    @endfor
                                </ul>

                            </div>

                            <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                                :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                                <button @click="modalOpen=true"
                                    class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors text-white bg-blue-900 border rounded-md hover:bg-[#7065d4]   focus:outline-none disabled:opacity-80 disabled:pointer-events-none "
                                    {{ Auth::guard('customer_registrations')->user() ? '' : 'disabled' }}>Write
                                    a review</button>
                                @if (Auth::guard('customer_registrations')->user())
                                    <div>

                                    </div>
                                @else
                                    <div class="italic mt-0.5 text-gray-600">
                                        Note:<span> Please Login to add review.</span>
                                    </div>
                                @endif
                                <template x-teleport="body">
                                    <div x-show="modalOpen"
                                        class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen max-md:p-4"
                                        x-cloak>
                                        <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-300"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            @click="modalOpen=false"
                                            class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70">
                                        </div>
                                        <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                                            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
                                            <div class="flex items-center justify-between pb-3">
                                                <h3 class="text-lg font-semibold">Review</h3>
                                                <button @click="modalOpen=false"
                                                    class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('productreview', $product->id) }}">
                                                @csrf
                                                <div class="relative w-auto pb-8">
                                                    <p>Rate this product.</p>
                                                    <div class="flex items-center space-x-2" id="rating">
                                                        <span class="cursor-pointer" data-rating="1">
                                                            <svg class="w-6 h-6 fill-current "
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 2l2.25 6.722h7.161l-5.722 4.899 2.197 6.5-6.433-4.791-6.433 4.791 2.197-6.5-5.722-4.899h7.161z" />
                                                            </svg>
                                                        </span>
                                                        <span class="cursor-pointer" data-rating="2"><svg
                                                                class="w-6 h-6 fill-current"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 2l2.25 6.722h7.161l-5.722 4.899 2.197 6.5-6.433-4.791-6.433 4.791 2.197-6.5-5.722-4.899h7.161z" />
                                                            </svg></span>
                                                        <span class="cursor-pointer" data-rating="3"><svg
                                                                class="w-6 h-6 fill-current"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 2l2.25 6.722h7.161l-5.722 4.899 2.197 6.5-6.433-4.791-6.433 4.791 2.197-6.5-5.722-4.899h7.161z" />
                                                            </svg></span>
                                                        <span class="cursor-pointer" data-rating="4"><svg
                                                                class="w-6 h-6 fill-current"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 2l2.25 6.722h7.161l-5.722 4.899 2.197 6.5-6.433-4.791-6.433 4.791 2.197-6.5-5.722-4.899h7.161z" />
                                                            </svg></span>
                                                        <span class="cursor-pointer" data-rating="5"><svg
                                                                class="w-6 h-6 fill-current"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 2l2.25 6.722h7.161l-5.722 4.899 2.197 6.5-6.433-4.791-6.433 4.791 2.197-6.5-5.722-4.899h7.161z" />
                                                            </svg></span>
                                                    </div>
                                                    <p id="selected-rating" class="mt-2 text-center"></p>
                                                    <input id="selected-rating-value" type="hidden" value=""
                                                        name="rating" />
                                                    <script>
                                                        const stars = document.querySelectorAll('#rating span');
                                                        const selectedRating = document.getElementById('selected-rating');
                                                        const selectedRatingValue = document.getElementById('selected-rating-value');

                                                        stars.forEach((star) => {
                                                            star.addEventListener('click', () => {
                                                                const rating = star.getAttribute('data-rating');
                                                                selectedRating.innerText = `You rated it ${rating} stars.`;
                                                                selectedRatingValue.value = rating;
                                                                stars.forEach((s) => {
                                                                    if (s.getAttribute('data-rating') <= rating) {
                                                                        s.classList.add('text-yellow-500');
                                                                    } else {
                                                                        s.classList.remove('text-yellow-500');
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                    <label>Write your review</label>
                                                    <br />
                                                    <textarea class=" block w-full mt-1 rounded-md border px-3" name="review" rows="3">{{ old('review') }}</textarea>
                                                    @error('review')
                                                        <div class="invalid-feedback text-red-400 text-sm"
                                                            style="display: block;">
                                                            * {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>

                                                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                                    <div @click="modalOpen=false" type="button"
                                                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">
                                                        Cancel</div>
                                                    <button @click="modalOpen=false"
                                                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-[#4456a6] ">Save</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    @foreach ($reviews as $review)
                        <div class="flex items-center space-x-2 mt-4 pt-4 border-t w-full">
                            <div class="flex items-center space-x-2 w-[10%]" id="getrating">
                                @php
                                    $rating = $review->rating;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="cursor-pointer" get-data-rating="{{ $i }}">
                                        <svg class="w-4 h-5 fill-current @if ($i <= $rating) text-yellow-500 @endif"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l2.25 6.722h7.161l-5.722 4.899 2.197 6.5-6.433-4.791-6.433 4.791 2.197-6.5-5.722-4.899h7.161z" />
                                        </svg>
                                    </span>
                                @endfor
                            </div>
                            <div class="flex items-center w-[89%]">
                                <div class="text-gray-600 text-xs ">{{ $review->getUser->name }}</div>
                                <div class="ml-2 text-green-600 text-xs">Verified Buyer</div>
                            </div>
                            <div class="justify-end w-[10%]">

                                <div class="ml-2 text-gray-600 text-xs">{{ $review->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="mt-3">
                            {{ $review->review }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @if (!$relatedproducts->isEmpty())
            <div class="mx-5 my-5">
                @include('frontend.products.relatedproducts')
            </div>
        @endif
    </div>




    <script type="text/javascript">
        let thumbnails = document.getElementsByClassName('thumbnail')
        let activeImages = document.getElementsByClassName('active')

        for (let i = 0; i < thumbnails.length; i++) {
            thumbnails[i].addEventListener('mouseover', function() {
                console.log(activeImages)
                if (activeImages.length > 0) {
                    activeImages[0].classList.remove('active')
                }
                this.classList.add('active')
                document.getElementById('featured').src = this.src
                document.getElementById('gallarylink').href = this.src

            })
        }

        let buttonRight = document.getElementById('slideRight')
        let buttonLeft = document.getElementById('slideLeft')

        buttonLeft.addEventListener('click', function() {
            document.getElementById('slider').scrollLeft -= 180
        })

        buttonRight.addEventListener('click', function() {
            document.getElementById('slider').scrollLeft += 180
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-fancybox="gallery"]').fancybox({
                loop: true,
                buttons: [
                    "zoom",
                    // "share",
                    "rotate",
                    "slideShow",
                    "fullScreen",
                    "thumbs",
                    "download",
                    "close"
                ],
                animationEffect: "zoom-in-out",
                transitionEffect: "zoom-in-out",

                thumbs: {
                    autoStart: true,
                    axis: "x"
                },
                beforeShow: function(instance, current) {
                    current.opts.rotation = $(current.opts.$orig).data('rotation') || 0;
                }

            });
        });
    </script>

    {{-- <div class="">
    <x-singlepage
    productname="Apple"
    price="250"
    singleProduct->featured_image="apple.jpg"

    />
</div> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {

            loop: true,
            autoplay: {
                delay: 5000,

            },

            centerSlide: "true",
            fade: "true",
            grabCursor: "true",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },

        });
    </script>

    {{-- @include('frontend.singlepage.singlepage', ["singleProduct"=>$singleProduct]) --}}

@endsection
