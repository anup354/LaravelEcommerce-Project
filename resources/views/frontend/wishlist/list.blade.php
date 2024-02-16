@extends('frontend._layout._master')

@section('body')
    <div class="mx-auto max-w-screen-2xl  max-md:px-0 px-16">
        <ul class="flex py-4 ">
            <li class="hover:text-[#f15a28] hover:underline px-1"> <a href="{{ route('home') }}">Home </a>
            </li>
            <li>/</li>
            <li class="hover:text-[#f15a28] hover:underline px-1"> {{ $title }}
            </li>

        </ul>
        <h2 class="text-2xl font-semibold pb-5 text-[#4456a6]">{{ $title }}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($products as $key => $product)
                <a href="{{ route('product.singlepage', $product->slug) }}" class="border rounded-md bg-white">
                    @include('frontend.components.productcomponent', ['product' => $product])
                </a>
            @endforeach
        </div>
        <div class=" mt-3">
            {{ $products->links('vendor.pagination.daleybhai-tailwind') }}
        </div>
    </div>
@endsection
