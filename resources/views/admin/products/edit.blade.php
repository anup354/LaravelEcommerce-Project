@extends('admin._layouts.master')

@section('page_title', 'Edit Product')
@section('product_select', 'bg-[#F1612D] text-white')
@section('body')
    <div class="flex items-center gap-4">
        <a href="{{ route('product.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Product</div>
    </div>
    <div class="mt-30  w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('product.update', $product->id) }} " enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex mt-4">
                <div class="p-6 w-7/12 bg-white">
                    <div class="flex flex-col">
                        <div>
                            <label class="text-sm font-semibold w-full" htmlFor="">
                                Product name
                            </label>
                            <div>

                                <input
                                    class="text-xs border border-gray-300 focus:outline-none p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                    name="product_name" placeholder="Type product name here" type="text"
                                    value="{{ old('product_name', $product->product_name) }}" />
                                @error('product_name')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="mt-2">
                            <label class="text-sm font-semibold w-full " htmlFor="">
                                Product order
                            </label>
                            <div>
                                <input
                                    class="text-xs border border-gray-300 focus:outline-none p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                    name="product_order" placeholder="Type product order here" type="text"
                                    value="{{ old('product_order', $product->product_order) }}" />
                                @error('product_order')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}



                        {{-- Product selling price --}}
                        <div class="mt-2">
                            <label class="text-sm font-semibold w-full" htmlFor="">Product Price ( Selling
                                Price)</label>
                            <div>
                                <input id="product_price"
                                    class="text-xs border border-gray-300 focus:outline-none p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                    name="product_price" placeholder="Type product price here" type="text"
                                    value="{{ old('product_price', $product->product_price) }}" />
                                @error('product_price')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- Tax excluding and including --}}
                        <div class="mt-2 border border-gray-300 p-3 rounded ">
                            <h4 class="mb-4 text-sm font-semibold text-gray-900 ">Tax</h4>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center ps-3">
                                        <input id="horizontal-list-radio-license" type="radio" value="excludingtax"
                                            name="tax_type" onclick="toggleTaxInput(false)"
                                            {{ $product->tax_type == 'excludingtax' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                                        <label for="horizontal-list-radio-license"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900">
                                            Excluding Tax
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center ps-3">
                                        <input id="horizontal-list-radio-id" type="radio" value="includingtax"
                                            name="tax_type" onclick="toggleTaxInput(true)"
                                            {{ $product->tax_type == 'includingtax' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                                        <label for="horizontal-list-radio-id"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900">
                                            Including Tax
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <div id="taxInputContainer" class="hidden ">
                                <div class=" text-gray-600 text-sm font-semibold my-2">Tax Percentage</div>
                                <div class="flex w-full">
                                    <input
                                        class="text-xs border border-gray-300 p-3 focus:outline-none rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                        name="tax_percentage" value="{{old("tax_percentage",$product->tax_percentage)}}" placeholder="Type Tax Percentage here" type="text" />
                                </div>
                                @error('tax_percentage')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <script>
                            function toggleTaxInput(show) {
                                var taxInputContainer = document.getElementById('taxInputContainer');
                                if (show) {
                                    taxInputContainer.classList.remove('hidden');
                                } else {
                                    taxInputContainer.classList.add('hidden');
                                }
                            }
                            toggleTaxInput(document.querySelector('input[name="tax_type"]:checked').value === 'includingtax');

                        </script>

                        {{-- Discount --}}
                        <div class="mt-2 border border-gray-300 p-3 rounded ">
                            <div class="flex items-center text-sm font-semibold">
                                <label for="default-checkbox" class="">Discount</label>
                                <input id="discount" type="checkbox" value="YES" name="disc"
                                    {{ $product->discount_amount != null ? 'checked' : '' }} class="w-4 h-4 ml-1"
                                    onchange="discountCheck()">
                            </div>
                            <div class="flex  flex-col gap-4 {{ $product->discount_amount == null ? 'hidden' : '' }}"
                                id="showdisc">
                                <label for="discount-type-1" class=" text-gray-600 mt-2">Discount Amount</label>
                                <div class="flex w-full">
                                    <input
                                        class="text-xs border border-gray-300 focus:outline-none p-3 rounded  focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                        name="discount_amount" placeholder="Type product price here" type="number"
                                        value="{{ $product->discount_amount }}" />
                                    @error('discount_amount')
                                        <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                {{-- <div class="flex gap-x-4 mt-4">
                                    <div class="flex">
                                        <input type="radio" name="discount_type" value="CASH"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-[#F1612D] "
                                            id="discount-type-1" {{ $product->discount_type == 'CASH' ? 'checked' : '' }}>
                                        <label for="discount-type-1" class=" text-gray-600 ml-2 mt-2">Cash</label>
                                    </div>

                                    <div class="flex">
                                        <input type="radio" name="discount_type" value="PERCENTAGE"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-[#F1612D] "
                                            id="discount-type-2"
                                            {{ $product->discount_type == 'PERCENTAGE' ? 'checked' : '' }}>
                                        <label for="discount-type-2" class=" text-gray-600 ml-2 mt-2">Percentage(%)</label>
                                    </div>


                                </div> --}}

                            </div>
                        </div>

                        {{-- brand --}}

                        <div class="mt-4">

                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Brands
                            </label>
                            <select id="brand" name="brand"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#7065d4] focus:border-[#7065d4] block w-full p-2.5 ">
                                <option disabled selected>Choose a brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ old('attribute_group_id', $product->brand) == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->brandname }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                                <div class="invalid-feedback text-red-400 text-sm ">* {{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Available Quantity --}}
                        <div class="mt-2">
                            <label class="text-sm font-semibold w-full" htmlFor="">Available Product Quantity ( Stock
                                )</label>
                            <div>
                                <input id="product_stock"
                                    class="text-xs border border-gray-300 focus:outline-none p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                    name="product_stock" placeholder="Type product stock here" type="text"
                                    value="{{ old('product_stock', $product->product_stock) }}" />
                                @error('product_stock')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        {{-- image --}}
                        <div class="mt-3">

                            <label class='text-sm font-semibold'>Featured Image</label>
                            <div
                                class='text-sm p-2 form-control border-2 border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                                <input type="file" name="featured_image" onchange="loadFile(event)" />
                            </div>

                            <img class="myoldimage" src="{{ asset('/uploads/' . $product->featured_image) }}"
                                alt="Card" style="width: 70px;margin-bottom:2px;">
                            <img id="myoutput" style="width: 70px; margin-bottom: 2px;" />
                            <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('myoutput');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    var old = document.getElementsByClassName('myoldimage')[0];
                                    console.log(old)
                                    old.classList.add("hidden");

                                };
                            </script>

                            @error('featured_image')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- video --}}
                        <div class="mt-3">
                            <label class='text-sm font-semibold'>Add Video</label>
                            <div
                                class='text-sm p-2 form-control border-2 border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                                <input type="file" name="video" onchange="loadVideo(event)" />
                            </div>

                            <script>
                                var loadVideo = function(event) {
                                    var output = document.getElementById('myvideo');
                                    var old = document.getElementsByClassName('myoldvideo')[0];

                                    // Hide the old video
                                    if (old) {
                                        old.classList.add("hidden");
                                    }

                                    // Unhide the new video if a file is selected
                                    output.classList.remove("hidden");
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                            </script>

                            <video id="myvideo" controls autoplay class="hidden">
                                <source src="" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                            @if ($product->video)
                                <video class="myoldvideo" controls autoplay>
                                    <source src="{{ asset('uploads/' . $product->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                            @error('video')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-sm font-semibold w-full mt-2">
                            Description
                        </div>
                        <textarea class="tinymce block w-full mt-1 rounded-md" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                        <div class="mt-2 w-full">
                            <label class="text-sm font-semibold w-full">Featured</label>
                            <div class="flex mt-2">
                                <div class="ml-4">
                                    <input type="radio" name="featured" value="1"
                                        {{ $product->featured ? 'checked' : '' }}>
                                    <span class="ml-1">Yes</span>
                                </div>
                                <div class="ml-4">
                                    <input type="radio" name="featured" value="0"
                                        {{ !$product->featured ? 'checked' : '' }}>
                                    <span class="ml-1">No</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 w-full">
                            <label class="text-sm font-semibold w-full">Show in slider</label>
                            <div class="flex mt-2">
                                <div class="ml-4">
                                    <input type="radio" name="slider" value="1"
                                        {{ $product->slider ? 'checked' : '' }}>
                                    <span class="ml-1">Yes</span>
                                </div>
                                <div class="ml-4">
                                    <input type="radio" name="slider" value="0"
                                        {{ !$product->slider ? 'checked' : '' }}>
                                    <span class="ml-1">No</span>
                                </div>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="parent_id" value="{{ $product->parent_id
                         }}"> --}}

                        <div>
                            <button
                                class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
                <div class=" w-5/12 ml-3 rounded ">

                    {{-- attributes --}}
                    <div class="mt-3 bg-white rounded p-3 shadow-lg">
                        <div class="mt-4 ">
                            <div class="text-md font-semibold shadow rounded-md text-black w-full p-2 ">Attribute
                                Group</div>
                            <div class="mt-3 pl-5  max-h-[15rem] overflow-y-scroll">
                                @foreach ($attributegroups as $attributegroup)
                                    {{-- <input type="checkbox" name="attributesgroup[]" value="{{ $attributegroup->id }}" /> --}}
                                    {{ $attributegroup->attribute_group_name }}

                                    @php
                                        $attributes = getAttributes($attributegroup->id);
                                    @endphp
                                    @if (count($attributes) == 0)
                                        <div class="ml-10 text-gray-500">No attributes found</div>
                                    @else
                                        @foreach ($attributes as $key => $attributeitem)
                                            <div class="ml-10">
                                                <input type="checkbox" name="attributes[{{ $attributegroup->id }}][]"
                                                    value="{{ $attributeitem->id }}"
                                                    {{ in_array($attributeitem->id, $attributeItem) ? 'checked' : '' }} />
                                                {{ $attributeitem->attribute_name }}
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- category --}}
                    <div class="bg-white mt-3 shadow-lg p-3 rounded">

                        <div class="text-md font-semibold shadow rounded-md text-black w-full p-2">
                            Select Category
                        </div>
                        <div class="max-h-[26rem] mt-3 border-r overflow-y-scroll w-full">

                            @foreach (getCategories(0) as $category)
                                <div class="mt-2 ml-2">
                                    <input type="checkbox" name="subcategory_ids[]"
                                        class="w-[13px] h-[13px] text-blue-600 bg-gray-100 border-gray-300 rounded"
                                        id="{{ $category->id }}" value="{{ $category->id }}" {{-- {{ getCategories($category->id)->count() == 0 ? '' : 'disabled' }} --}}
                                        {{ in_array($category->id, $productcategory->pluck('category_id')->toArray()) ? 'checked' : '' }}
                                        {{-- {{ $category->id == $product->category_id ? ' checked' : '' }} --}}>
                                    <label for="{{ $category->id }}"
                                        class="ml-1">{{ $category->categoryname }}</label>
                                    <input type="hidden" class="form-check-label ml-1" id="{{ $category->id }}"
                                        name="category_ids[]" value="{{ $category->id }}">

                                    <div class="ml-4 subcategory-container">
                                        @foreach (getCategories($category->id) as $subcategory)
                                            <div class="ml-7 mt-1">
                                                <input type="checkbox" name="subcategory_ids[]"
                                                    class="w-[13px] h-[13px] text-blue-600 bg-gray-100 border-gray-300 rounded"
                                                    id="{{ $subcategory->id }}" value="{{ $subcategory->id }}"
                                                    {{ in_array($subcategory->id, $productcategory->pluck('category_id')->toArray()) ? 'checked' : '' }}
                                                    {{-- {{ getCategories($subcategory->id)->count() == 0 ? '' : 'disabled' }} --}} {{-- {{ $subcategory->id == $product->category_id ? ' checked' : '' }} --}}>
                                                <label for="{{ $subcategory->id }}"
                                                    class="ml-1">{{ $subcategory->categoryname }}</label>
                                            </div>
                                            @foreach (getCategories($subcategory->id) as $twosubcategory)
                                                <div class="ml-20 mt-1">
                                                    <input type="checkbox" name="subcategory_ids[]"
                                                        class="w-[13px] h-[13px] text-blue-600 bg-gray-100 border-gray-300 rounded"
                                                        id="{{ $twosubcategory->id }}" value="{{ $twosubcategory->id }}"
                                                        {{ in_array($twosubcategory->id, $productcategory->pluck('category_id')->toArray()) ? 'checked' : '' }}
                                                        {{-- {{ getCategories($twosubcategory->id)->count() == 0 ? '' : 'disabled' }} --}} {{-- {{ $twosubcategory->id == $product->category_id ? ' checked' : '' }} --}}>
                                                    <label for="{{ $twosubcategory->id }}"
                                                        class="ml-1">{{ $twosubcategory->categoryname }}</label>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>
    <script>
        function discountCheck() {
            let disc = document.querySelector('#discount')
            let showdisc = document.querySelector('#showdisc')
            if (disc.checked) {
                showdisc.classList.remove('hidden')
            } else {
                showdisc.classList.add('hidden')

            }
        }
    </script>
@endsection
