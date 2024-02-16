@extends('admin._layouts.master')

@section('page_title', 'Product')
@section('product_select', 'bg-[#4456a6] text-white')
@section('body')
    <div class="px-5 bg-background w-full">
        @include('admin.message.index')

        <div class="flex justify-between">
            <div class="text-2xl font-bold">Products</div>
            <div class="flex">
                <a href='{{ route('product.create') }}'
                    class='bg-[#4456a6] text-white h-10 p-2 text-sm flex gap-2 items-center font-main rounded-lg'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="svgicon" height="1em" viewBox="0 0 448 512">
                        <style>
                            .svgicon {
                                fill: #ffffff;
                            }
                        </style>
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    <span>Add Product</span>
                </a>
            </div>

        </div>
        <div class='product-table relative bg-white p-3 rounded-lg mt-10 font-main  shadow'>

            <div class=" overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="font-normal p-10">
                        <tr class="">
                            <th scope="col " class="p-2 font-semibold ">
                                Product Name
                            </th>
                            {{-- <th scope="col " class="p-2 font-semibold ">
                                Category Name
                            </th> --}}

                            <th scope="col" class="font-semibold ">
                                Price
                            </th>
                            <th scope="col" class="font-semibold ">
                               Stock
                            </th>
                            <th scope="col" class="font-semibold ">
                                Image
                            </th>
                            <th scope="col" class="font-semibold ">
                                Brand
                            </th>
                            <th scope="col" class="font-semibold ">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    @foreach ($data as $key => $product)
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            <tr>
                                <td class="">
                                    <div>{{ $product->product_name }}</div>
                                </td>
                                {{-- <td class="">
                                    @if ($product->category_id)
                                        <div>{{ $product->getCategory->categoryname }}</div>
                                    @else
                                        <div>-</div>
                                    @endif
                                </td> --}}
                                <td class="">
                                    <div>{{ $product->product_price }}</div>
                                </td>

                                <td class="">
                                    <div>{{ $product->product_stock}}</div>
                                    {{-- <div>{{ $product->featured ? 'Yes' : 'No' }}</div> --}}
                                </td>
                                <td class="p-2" style="width: 100px;">
                                    <img class="" src="{{ asset('/uploads/' . $product->featured_image) }}"
                                        alt="Card" style="width: 70px;">
                                </td>
                                {{-- <td>
                                    @if ($product->created_at)
                                        <div>{{ $product->created_at->format('F j, Y') }}</div>
                                    @else
                                        <div>-</div>
                                    @endif
                                </td> --}}
                                <td>
                                    @if (optional($product->getBrand)->brandname)
                                        <div>{{ $product->getBrand->brandname }}</div>
                                    @else
                                        -
                                    @endif
                                </td>
                                
                                <td class="z-[999]">
                                    <div x-data="{ isActive: false }" class="">
                                        <div
                                            class="inline-flex items-center overflow-hidden font-normal rounded-md border bg-white">
                                            <button x-on:click="isActive = !isActive"
                                                class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                                <span class="sr-only">Menu</span>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-dots-vertical" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="z-[999] absolute end-0  mt-2 w-36 divide-y font-semibold divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                                            role="menu" x-cloak x-transition x-show="isActive"
                                            x-on:click.away="isActive = false"
                                            x-on:keydown.escape.window="isActive = false">
                                            <div class="">
                                                <a href="{{ route('product.show', $product->id) }}"
                                                    class="block rounded-lg px-2 py-2 text-sm  text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                                    role="menuitem">
                                                    View
                                                </a>

                                                {{-- <a href="{{ route('product.edit', $product->id) }}    "
                                                    class="block rounded-lg px-2 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                                    role="menuitem">
                                                    View Report
                                                </a> --}}

                                                <a href="{{ route('product.edit', $product->id) }}    "
                                                    class="block rounded-lg px-2 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                                    role="menuitem">
                                                    Edit
                                                </a>

                                                <a href="{{ route('myimage', $product->id) }}"
                                                    class="block rounded-lg px-2 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                                    role="menuitem">
                                                    Add images
                                                </a>
                                            </div>
                                            <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                                id="delete-form-{{ $product->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="deleteSingleImage({{ $product->id }})"
                                                    class="flex w-full items-center gap-2 rounded-lg px-2 py-2 text-md openModal text-center justify-center text-red-700 hover:bg-red-50">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>
        <div class=" mt-3">
            {{ $data->links('vendor.pagination.tailwind') }}
        </div>

    </div>
@endsection
