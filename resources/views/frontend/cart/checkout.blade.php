@extends('frontend._layout._master')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
@section('body')
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css');
    </style>
    <style>
        .form-radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-shrink: 0;
            border-radius: 100%;
            border-width: 2px;
        }

        .form-radio:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media not print {
            .form-radio::-ms-check {
                border-width: 1px;
                color: transparent;
                background: inherit;
                border-color: inherit;
                border-radius: inherit;
            }
        }

        .form-radio:focus {
            outline: none;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            background-repeat: no-repeat;
            padding-top: 0.5rem;
            padding-right: 2.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
        }

        .form-select::-ms-expand {
            color: #a0aec0;
            border: none;
        }

        @media not print {
            .form-select::-ms-expand {
                display: none;
            }
        }

        @media print and (-ms-high-contrast: active),
        print and (-ms-high-contrast: none) {
            .form-select {
                padding-right: 0.75rem;
            }
        }
    </style>

    <div class="mx-auto max-w-screen-2xl bg-blue-50 md:py-5 md:px-14">
        @include('admin.message.index')
        <style>
            .active-tab {
                /* background-color: #205579; */
                border-color: #4c74a8;
                color: #1479af;
            }
        </style>
        <ul class="flex ">
            <li class="hover:text-[#f15a28] hover:underline px-1"> <a href="{{ route('home') }}">Home </a>
            </li>
            <li>/</li>
            <li class="hover:text-[#f15a28] hover:underline px-1"> Cart
            </li>

        </ul>

        <form method="POST" action="
        {{ route('checkoutpay') }}
        ">
            @csrf
            <div class="w-full bg-white border-t  border-gray-200 px-5 pt-10 text-gray-800">
                <div>

                    <div class="text-sm italic text-gray-400">
                        Note: Check both billing information and shipping information before order .
                    </div>

                    <div class="w-full">
                        <div class=" md:flex items-start">
                            <div class=" md:w-7/12">

                                <div class="mb-1 border-b border-gray-200 ">
                                    <div class="flex flex-wrap w-full text-sm font-medium text-center text-[#4456a6]"
                                        id="tabExample" role="tablist">

                                        <span class="" role="paymentinfo">
                                            <button
                                                class="inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                                                id="billing_tab" type="button" role="tab"
                                                aria-controls="billing-button" aria-selected="true"
                                                onclick="showTab('billing-button',this)">Billing
                                                Info</button>
                                        </span>
                                        <span class="mr-2" role="paymentinfo">
                                            <button
                                                class="inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                                                id="shipping-tab" type="button" role="tab"
                                                aria-controls="shipping-button" aria-selected="true"
                                                onclick="showTab('shipping-button',this)">Shipping
                                                Info</button>
                                        </span>

                                    </div>
                                </div>

                                <div id="tabContentExample">
                                    <div class="hidden-items   p-2  rounded-lg " id="billing-button" role="tabpanel"
                                        aria-labelledby="billing_tab">
                                        <div class="py-2 text-[#4456a6] font-semibold">
                                            Billing Information
                                        </div>
                                        <div
                                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Full
                                                        Name</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Enter your name" name="billing_name" type="text"
                                                        required value="{{ old('billing_name', $users->name ?? '') }}" />

                                                </div>
                                            </div>
                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Email</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Please provide your email to track your order"
                                                        name="billing_email" type="email"
                                                        value="{{ old('billing_email', $users->email ?? '') }}" />
                                                </div>
                                            </div>

                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Billing
                                                        Address</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Enter billing address" name="billing_address"
                                                        type="text"
                                                        value="{{ old('billing_address', $users->address ?? '') }}"
                                                        required />
                                                </div>
                                            </div>

                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Phone
                                                        no.</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Enter Phonenumber" name="billing_phonenumber"
                                                        type="number"
                                                        value="{{ old('billing_phonenumber', $users->phonenumber ?? '') }}"
                                                        required />
                                                </div>
                                            </div>

                                            {{-- <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Telegram
                                                        no.</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Enter number for telegram" name="telegram_number" type="number"

                                                        required />
                                                </div>
                                            </div> --}}
                                        </div>

                                    </div>

                                    <div class="hidden-items p-2 rounded-lg  " id="shipping-button" role="tabpanel"
                                        aria-labelledby="shipping-tab">
                                        <div class="py-2 text-[#4456a6] font-semibold">
                                            Shipping Information
                                        </div>
                                        <div
                                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Full
                                                        Name</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Enter name" name="shipping_name" type="text"
                                                        value="{{ old('shipping_name', $users->name ?? '') }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Email</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Please provide your email to track your order"
                                                        name="shipping_email" type="email"
                                                        value="{{ old('shipping_email', $users->email ?? '') }}" />
                                                </div>
                                            </div>

                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Delivery
                                                        Address</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border text-sm border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Enter delivery address" name="shipping_address"
                                                        type="text" name="deliveryaddress"
                                                        value="{{ old('shipping_address', $users->address ?? '') }}" />
                                                </div>
                                            </div>

                                            <div class="mb-3 flex">
                                                <div class="w-24">
                                                    <label class="text-gray-600 font-semibold text-sm mb-1">Phone
                                                        no.</label>
                                                </div>
                                                <div class="w-full">
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="Enter phone number" name="shipping_phonenumber"
                                                        type="number"
                                                        value="{{ old('shipping_phonenumber', $users->phonenumber ?? '') }}" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>








                                {{-- <div class="flex w-full gap-2 text-sm">
                                    <div>
                                        <input type="radio" id="online-payment" name="payment" value="online-payment"
                                            class="hidden peer" disabled>
                                        <label for="online-payment"
                                            class="inline-flex items-center justify-between py-2 px-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  hover:text-gray-600 hover:bg-gray-100">
                                            <div class="block">
                                                <div class="w-full  font-semibold">Online payment</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="cash-on-delivery" name="payment"
                                            value="cash-on-delivery" class="hidden peer" checked>
                                        <label for="cash-on-delivery"
                                            class="inline-flex items-center justify-between py-2 px-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                            <div class="block">
                                                <div class="w-full font-semibold">Cash on delivery</div>
                                            </div>
                                        </label>
                                    </div>
                                </div> --}}

                                <div class="grid sm:grid-cols-2 gap-2">
                                    <label for="hs-radio-in-form"
                                        class="flex p-3 block w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-[#7065d4] focus:ring-[#7065d4]  ">
                                        <input type="radio" name="paymentmethod"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-[#7065d4] disabled:opacity-50 disabled:pointer-events-none "
                                            id="hs-radio-in-form" value="Cash-On-Delivery" checked>
                                        <span class="text-sm text-gray-500 ms-3 "><img class=" w-32 object-contain "
                                                src="{{ asset('images/cashondelivery.png') }}"
                                                alt="cashondelivery"></span>
                                    </label>

                                    <label id="paymentMethods" for="hs-radio-checked-in-form"
                                        class="flex p-3 block relative  w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-[#7065d4] focus:ring-[#7065d4]  ">
                                        <input type="radio" name="paymentmethod"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-[#7065d4] disabled:opacity-50 disabled:pointer-events-none "
                                            id="hs-radio-checked-in-form" value="Khalti" disabled>
                                        <div class="absolute mt-4 font-semibold text-red-500 text-sm  ml-32 ">
                                            (Comming soon)
                                        </div>
                                        <img class=" w-28 object-contain " src="{{ asset('images/khalti.png') }}"
                                            alt="khalti">
                                    </label>

                                    <label id="paymentMethods" for="hs-radio-checked-in-ime"
                                        class="flex p-3 block relative w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-[#7065d4] focus:ring-[#7065d4]  ">
                                        <input type="radio" name="paymentmethod"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-[#7065d4] disabled:opacity-50 disabled:pointer-events-none "
                                            id="hs-radio-checked-in-ime" value="imepay" disabled>
                                        <div class="absolute mt-2 font-semibold text-red-500 text-sm  ml-28 ">
                                            ( Comming soon)
                                        </div>
                                        <img class=" w-28 px-5 object-contain " src="{{ asset('images/imelogo.svg') }}"
                                            alt="ime">
                                    </label>
                                </div>
                                @error('paymentmethod')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror

                                <div id="cash-on-delivery-content" class="hidden"></div>
                                <script>
                                    const onlinePaymentRadio = document.getElementById("online-payment");
                                    const cashOnDeliveryRadio = document.getElementById("cash-on-delivery");
                                    const onlinePaymentContent = document.getElementById("online-payment-content");
                                    const cashOnDeliveryContent = document.getElementById("cash-on-delivery-content");

                                    // Function to show the default selected radio content
                                    function showDefaultSelectedContent() {

                                        // onlinePaymentContent.style.display = "block";
                                        cashOnDeliveryContent.style.display = "block";

                                    }

                                    // Add event listeners for radio button clicks
                                    onlinePaymentRadio.addEventListener("click", function() {
                                        onlinePaymentContent.style.display = "block";
                                        cashOnDeliveryContent.style.display = "none";
                                    });

                                    cashOnDeliveryRadio.addEventListener("click", function() {
                                        onlinePaymentContent.style.display = "none";
                                        cashOnDeliveryContent.style.display = "block";
                                    });

                                    // Show the default selected content on page load
                                    showDefaultSelectedContent();
                                </script>

                                {{-- <div class="mb-3 mt-6 flex">
                                    <div class="w-24">
                                        <label class="text-gray-600 font-semibold text-sm mb-1">Delivery</label>
                                    </div>
                                    <div class="max-md:pl-3">
                                        <div>
                                            <input name="delivery" value="100" id="valleyin" type="radio"
                                                checked><label>
                                                Inside Valley:
                                                <span><span>Rs.</span>&nbsp;100</span></label>
                                        </div>
                                        <div>
                                            <input name="delivery" value="300" id="valleyout" type="radio"><label>
                                                Outside Valley:
                                                <span><span>Rs.</span>&nbsp;300</span></label>

                                        </div>
                                    </div>
                                </div> --}}

                                <div class="mb-3 mt-6 flex">
                                    <div class="w-24">
                                        <label class="text-gray-600 font-semibold text-sm mb-1">Delivery</label>
                                    </div>
                                    <div class="max-md:pl-3">
                                        <div>
                                            <input name="delivery" value="{{ getSetting()->delivery_insidevalley }}"
                                                id="valleyin" type="radio" checked><label>
                                                Inside Valley:
                                                <span><span>Rs.</span>&nbsp;{{ getSetting()->delivery_insidevalley }}</span></label>
                                        </div>
                                        <div>
                                            <input name="delivery" value="{{ getSetting()->delivery_outsidevalley }}"
                                                id="valleyout" type="radio"><label>
                                                Outside Valley:
                                                <span><span>Rs.</span>&nbsp;{{ getSetting()->delivery_outsidevalley }}</span></label>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- @dd($items) --}}
                            <div class="px-3 md:w-5/12 lg:pr-10 text-sm max-md:my-10 max-md:border max-md:p-4">
                                @foreach ($items as $key => $item)
                                    <input type="hidden" name="product_id" value="{{ $item->id }}" />
                                    <div
                                        class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6 ">
                                        <div class="w-full flex items-center">
                                            <div
                                                class="overflow-hidden rounded-lg w-[20%]  h-full bg-gray-50 border border-gray-200">
                                                <img src="{{ asset('/uploads/' . $item->attributes->image) }}"
                                                    alt="product">
                                            </div>

                                            <div class="flex-grow   pl-3">
                                                <h6 class="font-semibold uppercase text-gray-600">{{ $item->name }}</h6>
                                                <span class="text-gray-400 flex">
                                                    Qty: <input type="text" class="bg-white" name="productQty"
                                                        value="{{ $item->quantity }}" disabled />
                                                </span>
                                                <div class="mt-5 sm:mt-0 text-xs">

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
                                            </div>
                                            <div class="-ml-32">

                                                <input class="text-right  bg-transparent" name="productPrice"
                                                    type="text" value="Rs. {{ Cart::get($item->id)->getPriceSum() }}"
                                                    disabled />
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                <div class="">
                                    <div class=" text-[#f15a28] mb-4">
                                        <span class="font-bold">Note:</span>
                                        <span class="font-medium"> Get free delivery on purchases over Rs. 1500.</span>
                                    </div>
                                    <div class="mb-2">
                                        <a href="{{ route('home') }}"
                                            class="border text-center  font-semibold hover:bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 hover:text-white bg-white  transition duration-700 ease-in-out text-[#4456a6]  ">Continue
                                            Shopping</a>
                                    </div>
                                </div>


                                <div class="flex-grow  border-b py-2">
                                    <label class="text-gray-600 font-semibold text-sm  ml-1">
                                        Coupon code :
                                    </label>
                                    <div id="couponcodefield"
                                        class="flex gap-4 items-center justify-between w-full flex-grow ">
                                        <div class="w-full">
                                            <input
                                                class="w-full px-3 my-1 py-2 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="xxxxxx" type="text" name="couponcode" id="couponcode" />

                                        </div>
                                        <div class="py-1" id="applybutton">
                                            <div class="block cursor-pointer bg-[#0f577d] hover:bg-[#0f577d] focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"
                                                id="checkButton">Apply
                                            </div>
                                        </div>
                                    </div>
                                    <span id="appliedcouponcode" class="text-[#f15a28] font-medium hidden">Coupon Code
                                        Applied</span>
                                    <span id="couponerrormessage" class="text-red-500"></span>
                                </div>

                                <div class="mb-6 mt-2 pb-6 border-b border-gray-200 text-gray-800">
                                    <div class="w-full flex mb-3 items-center hidden" id="coupondiscount">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Coupon Discount</span>
                                        </div>
                                        <div class="pl-3">
                                            {{-- <span class="font-semibold">Rs.</span> --}}
                                            <span class="font-semibold" id="discountamount">0 </span>
                                            <span class="font-semibold">%</span>

                                        </div>
                                    </div>

                                    <div class="w-full flex mb-3 items-center">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Subtotal</span>
                                        </div>
                                        <div class="pl-3">
                                            <span class="font-semibold">Rs. {{ Cart::getSubTotal() }}</span>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center mb-3 font-semibold">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Delivery Charge</span>
                                        </div>

                                        <input id="defaultSelection"
                                            class="text-sm w-24  focus:outline-none mt-3 p-2  text-right"
                                            name="delivery_charge " type="hidden" value="" />
                                        <label class="text-sm mr-1 ">
                                            Rs.
                                        </label>
                                        <div id="changedeliverycharge" class="text-md">
                                        </div>

                                    </div>

                                    <div class="w-full flex mb-3 items-center">
                                        <div class="flex-grow font-semibold">
                                            <span class="text-gray-600">Tax</span>
                                        </div>
                                        <div class="pl-3">
                                            <span class="font-semibold" id="gettax">{{ getSetting()->tax }}</span>
                                            <span class="font-semibold">%</span>

                                        </div>
                                        <input type="hidden" name="taxamount" id="taxamount" value="" />
                                    </div>
                                </div>
                                <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                    <div class="w-full flex items-center">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Total</span>
                                        </div>

                                        <input id="alltotalvalue"
                                            class="text-sm  font-semibold border-gray-300 mt-0.5 ml-1 border focus:outline-none w-24"
                                            name="alltotalamount" placeholder="Type product MRP price here"
                                            type="hidden" value="{{ Cart::getSubTotal() }}" />
                                        <label class="text-md mr-1 font-semibold">
                                            Rs.
                                        </label>
                                        <div id="alltotalresult" class="text-md">
                                        </div>
                                        {{-- send data in script --}}
                                        <input id="alltotal" type="hidden"
                                            class="text-xs border border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                            placeholder="Type product MRP price here" type="text"
                                            value="{{ Cart::getSubTotal() }}" />
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="py-5">
                    <button
                        class="block  bg-[#4456a6] hover:bg-[#4456a6] focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"><i
                            class="mdi mdi-lock-outline mr-1"></i> PAY NOW
                    </button>
                </div>
            </div>
            <input type="hidden" value="valleyin" name="order_from" id="order_from" />


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
            <style>
                .colored-toast.swal2-icon-success {

                    background-color: #55ac23 !important;
                }

                .colored-toast.swal2-icon-error {

                    background-color: #f27474 !important;
                }

                .colored-toast.swal2-icon-warning {
                    background-color: #f8bb86 !important;
                }

                .colored-toast.swal2-icon-info {
                    background-color: #3fc3ee !important;
                }

                .colored-toast.swal2-icon-question {
                    background-color: #87adbd !important;
                }

                .colored-toast .swal2-title {
                    color: white;
                }

                .colored-toast .swal2-close {
                    color: white;
                }

                .colored-toast .swal2-html-container {
                    color: white;
                }
            </style>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#checkButton').click(function() {
                        var mycouponcode = $('#couponcode').val();
                        if (!mycouponcode) {
                            Toast.fire({
                                icon: "error",
                                title: "Please Enter Coupon Code ."
                            })

                            const msg = document.getElementById("couponerrormessage");
                            msg.innerText = "* Please Enter Coupon Code .";
                            // toastr.error("Please Enter Coupon Code .");
                            return false;
                        }
                        console.log(mycouponcode)
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: '/checkcouponcode',
                            data: {
                                couponcode: mycouponcode
                            },
                            success: function(response) {
                                if (response.success) {
                                    var alt = document.getElementById('alltotalvalue');

                                    var disamt = (response.data.discount_amount / 100) * alt.value;

                                    var changeamt = alt.value - disamt

                                    document.cookie = "disamt=" + disamt;
                                    // alt.value=disamt
                                    // alert(disamt)
                                    document.getElementById('alltotalvalue').value = changeamt.toFixed(
                                        2);
                                    alltotalresult.innerHTML = changeamt.toFixed(2);
                                    discountamount.innerHTML = response.data.discount_amount;


                                    // alert(response.data.discount_amount);
                                    Toast.fire({
                                        icon: "success",
                                        title: response.message
                                    })
                                    const msg = document.getElementById("couponerrormessage");
                                    const couponamount = document.getElementById("coupondiscount");
                                    const couponcodefield = document.getElementById("couponcodefield");
                                    const appliedcouponcode = document.getElementById(
                                        "appliedcouponcode");

                                    couponamount.classList.remove('hidden');
                                    couponcodefield.classList.add('hidden');
                                    appliedcouponcode.classList.remove('hidden');

                                    msg.innerText = "";
                                    // toastr.success(response.message);
                                } else {
                                    Toast.fire({
                                        icon: "error",
                                        title: response.message
                                    })
                                    const msg = document.getElementById("couponerrormessage");
                                    msg.innerText = "* Coupon code does not match.";
                                    // console.log("error")
                                    // toastr.error(response.message);
                                }
                                console.log(response);
                            },
                            error: function() {
                                // Handle the error here
                                console.log('Error occurred.');
                            }
                        });

                    });
                });
            </script>

        </form>

        {{-- <div>
            <a href="{{route("NICASIA")}}">

                NIC ASIA
            </a>
        </div> --}}

    </div>

    <script>
        // Get references to the radio buttons and result display area
        const option1Radio = document.getElementById("valleyin");
        const order_from = document.getElementById("order_from");
        const option2Radio = document.getElementById("valleyout");
        const productweight = document.getElementById("productweight");
        const resultDisplay = document.getElementById("defaultSelection");
        const getTax = document.getElementById("gettax").innerHTML;

        const productPrice = parseFloat(document.getElementById('alltotal').value) || 0;
        console.log("ppppprrree", productPrice)

        // const defaultSelectionDisplay = document.getElementById("defaultSelection");

        // Function to update the result display
        function updateResultDisplay(selectedOption) {

            var margin = ""
            if (productPrice > 1500) {
                resultDisplay.value = 0;
                margin = productPrice;

            } else {
                resultDisplay.value = `${selectedOption || '0'}`;
                margin = parseFloat(selectedOption) + productPrice;
            }
            // resultDisplay.value = `${selectedOption || '0'}`;

            // tax
            const tax = (parseFloat(getTax) / 100) * parseFloat(margin)
            console.log("taaaaaaaaxx", tax)
            console.log("ppppprrree", productPrice)

            const total = margin + tax
            console.log("toooootal", total)
            console.log("productPrice", productPrice)
            console.log("selectedOption", selectedOption)
            document.getElementById('taxamount').value = tax;
            document.getElementById('alltotalvalue').value = total.toFixed(2);
            alltotalresult.innerHTML = total.toFixed(2);

            if (productPrice > 1500) {
                console.log("15000")
                changedeliverycharge.innerHTML = 0;
            } else {
                console.log("adsdsf")
                changedeliverycharge.innerHTML = parseFloat(selectedOption);
            }


        }

        // Event listener for the radio buttons
        option1Radio.addEventListener("change", function() {
            if (option1Radio.checked) {
                const selectedOption = option1Radio.value;
                order_from.value = "valleyin"
                updateResultDisplay(selectedOption);
            }
        });

        option2Radio.addEventListener("change", function() {
            if (option2Radio.checked) {
                const selectedOption = option2Radio.value;
                order_from.value = "valleyout"

                updateResultDisplay(selectedOption);
            }
        });

        // Set a default selection and update the result display
        resultDisplay.value = option1Radio.value; // Change this to the default option you want
        option1Radio.checked = true; // Change this to match the default option
        updateResultDisplay(option1Radio.value); // Update the result display with the default option
    </script>

    <style>
        .hidden-items {
            display: none;
        }
    </style>
    <script>
        function showTab(tabId, button) {
            const tabs = document.querySelectorAll('.hidden-items');
            tabs.forEach(tab => {
                if (tab.id === tabId) {
                    console.log(tab.id.value)
                    tab.style.display = 'block';
                } else {
                    tab.style.display = 'none';
                }
            });

            // Remove the active-tab class from all buttons
            const tabButtons = document.querySelectorAll('[role="tab"]');
            tabButtons.forEach(tabButton => {
                tabButton.classList.remove('active-tab');
            });

            button.classList.add('active-tab');
        }
        showTab('billing-button', document.getElementById('billing_tab'));
    </script>

    <style>
        .image-radio input[type="radio"] {
            display: none;
        }

        .image-radio img {
            border: 2px solid transparent;
        }

        .image-radio input[type="radio"]:checked+img {
            border-color: orange;
            /* Change this to your desired border color */
            border-radius: 6px;
        }
    </style>
@endsection
