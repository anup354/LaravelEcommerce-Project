@extends('frontend._layout._master')

@section('body')
    <!-- component -->
    <!-- Create By Joker Banny -->
    <style>
        @layer utilities {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>
    <div class="mx-auto max-w-screen-2xl pt-10 pb-5 bg-blue-50 max-md:px-0 px-16 ">
        <ul class="flex py-4 ">
            <li class="hover:text-[#f15a28] hover:underline px-1"> <a href="{{ route('home') }}">Home </a>
            </li>
            <li>/</li>
            <li class="hover:text-[#f15a28] hover:underline px-1"> Cart
            </li>

        </ul>
        {{-- <h1 class="mb-10 text-center text-2xl text-primary font-bold">Cart Items</h1> --}}
        <div id="cartDatas" class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            @include('frontend.components.cartData')
        </div>
    </div>
@endsection
