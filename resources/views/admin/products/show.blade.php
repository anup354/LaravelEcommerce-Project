@extends('admin._layouts.master')

@section('page_title', 'View Product')
@section('product_select', 'bg-[#F1612D] text-white')
@section('body')
    <div class="flex gap-4 items-center">
        <a href="{{ route('product.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="text-xl font-bold">View Product</div>
    </div>

    <section>
        <div class=" mx-auto max-w-screen-2xl px-4 pt-8 z-10">
            <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2">
                <div class="grid grid-cols-2  gap-4 md:grid-cols-1 h-[80vh]  px-5">
                    <img class="aspect-square w-full  rounded-xl object-contain border "
                        src="{{ asset('/uploads/' . $product->featured_image) }}" alt="Card">
                </div>

                <div class="">
                    <div class="mt-8 flex justify-between">
                        <div class="max-w-[35ch] space-y-2">
                            <h1 class="text-xl font-bold sm:text-2xl">
                                {{ $product->product_name }}
                            </h1>


                        </div>
                        <p class="text-lg font-bold text-orange-500">Rs.
                            {{ (int) $product->product_price - (int) $product->discount_amount }}</p>
                    </div>
                    {{-- @if ($product->cutoff_price) --}}
                    {{-- <p class="text-xs font-semibold text-gray-400 line-through float-right">Rs.
                        {{ $product->mrp_price }}</p> --}}


                    @if ($product->discount_amount)
                        <span class="ml-2 text-gray-400 line-through float-right"> Rs. {{ $product->product_price }}</span>
                    @endif






                    {{-- @endif --}}
                    {{-- @dd($productcategories) --}}
                    <div class="mt-4">
                        <span class="font-bold text-gray-600">Category :</span>
                        @foreach ($productcategories as $key => $productcategory)
                            {{ $productcategory->getCategory->categoryname }}
                            @if (!$loop->last)
                                ->
                            @endif
                        @endforeach
                    </div>
                    {{-- attributes --}}
                    <div>
                        <div class="mt-4 ">
                            {{-- <label for="attribute_id"
                                class="block mb-2 text-sm flex flex-col font-bold text-gray-900 ">Attributes
                            </label> --}}
                            {{-- @foreach ($attributeItems as $key => $attrubuteitem)
                                {{ $attrubuteitem->attribute_group_id }}
                            @endforeach --}}

                            @foreach ($attributeItems as $attributegroup => $attributes)
                                <div class="text-[#f15a28] text-md font-medium">

                                    {{ getAttributeGroupName($attributegroup)->attribute_group_name }}
                                </div>
                                {{-- @php
                                    $attributes = showAttributes($attributegroup->attribute_group_id, $product->id);

                                @endphp --}}
                                <div
                                    class="flex items-center  p-1 text-gray-500 border-gray-200 rounded-lg cursor-pointer peer-checked:border-[#f15a28] peer-checked:text-[#f15a28] hover:text-gray-600 hover-bg-gray-100">
                                    @foreach ($attributes as $key => $attributeitem)
                                        <div class="ml-5 border bg-white p-1.5 rounded">
                                            {{ getAttributName($attributeitem->attribute_id)->attribute_name }}
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="font-bold text-gray-600">Brand :</span> {{ $product->getBrand->brandname }}
                    </div>
                    <div class="mt-4">
                        <span class="font-bold text-gray-600">Added on :</span> {{ $product->created_at->format('F j, Y') }}
                    </div>
                    <div class="mt-4">
                        <span class="font-bold text-gray-600">Product Stock : </span><span
                            class="text-[#4456a6] text-2xl">{{ $product->product_stock }}</span>
                    </div>
                    <div class="mt-4">
                        <span class="font-bold text-gray-600">Total Product Sold : </span><span
                            class="text-[#4456a6] text-2xl">{{ $product->total_sale ?? 0 }}</span>
                    </div>
                    @if ($product->discount_amount)
                        <div class="mt-4">
                            <span class="font-bold text-gray-600">Discount Amount :</span> Rs.
                            {{ $product->discount_amount }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </section>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ccc;
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
    <div class="mt-4 px-4 ">
        <div class="text-xl font-bold text-gray-600 mb-2">Description</div>

        <div class="prose max-w-none">
            <div>
                {!! $product->description !!}

            </div>
        </div>

    </div>
    <section>
        <div class="mx-auto max-w-screen-2xl  py-6 px-4">
            <div class="flex justify-between">

                <div class="font-semibold text-lg text-gray-600">Other Images</div>
                {{-- <a href="{{ route('category.create') }}"> --}}
                <a href="{{ route('myimage', $product->id) }} ">
                    <div
                        class="border float-right border-[#4456a6] px-4 py-2 rounded-md mr-2 text-[#4456a6]  bg-white hover:bg-[#4456a6] hover:text-white">
                        <div>Add More Images</div>
                    </div>
                </a>
                {{-- </a> --}}
            </div>
            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($productImages as $key => $img)
                    <blockquote class="flex h-full justify-between border flex-wrap  rounded-lg">
                        <img alt="product" src="{{ asset('/uploads/' . $img->images) }}"
                            class="aspect-square w-full rounded-xl  object-contain" />
                        <form action="{{ route('deleteImage', $img->id) }} " method="POST"
                            id="delete-form-{{ $img->id }}" class="w-full">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="filefrom" value="insideshow" />

                            <button type="button" onclick="deleteSingleImage({{ $img->id }})"
                                class="border bg-red-600 p-1 cursor-pointer openModal hover:bg-red-500 text-white text-center w-full">
                                Delete
                            </button>
                        </form>
                    </blockquote>
                @endforeach



            </div>
        </div>
    </section>
@endsection
