@extends('admin._layouts.master')

@section('page_title', 'Category')
@section('category_select', 'bg-[#4456a6] text-white')
@section('body')
    <div class="px-5 bg-background w-full">
        @include('admin.message.index')
        <div class="flex justify-between">
            @if (request('category'))
                <div class="text-2xl font-bold">Sub Categories</div>

                <div class='flex '>
                    <a href='{{ route('category.create', ['category' => request('category')]) }}'
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

                        <span>Add SubCategory</span>
                    </a>
                    {{-- <a href='{{ route('category.create') }}'
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

                        <span>Add Category</span>
                    </a> --}}
                </div>
            @else
                <div class="text-2xl font-bold">Categories</div>
                <div class='flex'>
                    <a href='{{ route('category.create') }}'
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

                        <span>Add Category</span>
                    </a>
                </div>
            @endif
        </div>

        @if (request('category'))
            <div class="flex text-gray-500 mb-5">
                <div class="breadcrumbs">
                    <ul class="flex">
                        <li> <a href="{{ route('category.index') }}">Category</a>
                        </li>
                        @foreach ($breadcrumbs as $breadcrumb)
                            <span class="separator mx-2">></span>
                            <li>
                                <a href="{{ route('category.index', ['category' => $breadcrumb->id]) }}">{{ $breadcrumb->categoryname }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class='product-table bg-white p-3 rounded-lg mt-10 font-main  shadow'>

            <div class="relative overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="font-normal p-10">
                        <tr class="">
                            <th scope="col " class="p-2 font-semibold ">
                                Category Name
                            </th>
                            <th scope="col" class="font-semibold ">
                                Category Order
                            </th>
                            <th scope="col" class="font-semibold ">
                                Featured
                            </th>
                            {{-- <th scope="col" class="font-semibold ">
                                Show in Home
                            </th>
                            <th scope="col" class="font-semibold ">
                                Image
                            </th> --}}
                            <th scope="col" class="font-semibold ">
                                Created At
                            </th>
                            <th scope="col" class="font-semibold ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    @foreach ($categories as $key => $category)
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            <tr>
                                <td class="">
                                    <div>{{ $category->categoryname }}</div>
                                </td>
                                <td class="">
                                    <div>{{ $category->category_order }}</div>
                                </td>

                                <td class="">
                                    <div>{{ $category->featured ? 'Yes' : 'No' }}</div>
                                </td>
                                {{-- <td class="">
                                    <div>{{ $category->in_menu ? 'Yes' : 'No' }}</div>
                                </td>
                                <td class="p-2" style="width: 100px;">
                                    <img class="" src="{{ asset('/images/' . $category->featured_image) }}"
                                        alt="Card" style="width: 70px;">
                                </td> --}}
                                <td>
                                    @if ($category->created_at)
                                        <div>{{ $category->created_at->format('F j, Y') }}</div>
                                    @else
                                        <div>-</div>
                                    @endif
                                </td>


                                <td>
                                    <div class="flex p-2 justify-center">

                                        <a href={{ route('category.index', ['category' => $category->id]) }}>
                                            <div class="bg-[#6B9E41] py-2 px-2 mx-2 text-white rounded-md">
                                                Sub Category
                                            </div>
                                        </a>
                                        <a href="{{ route('category.edit', ['category' => $category->id]) }}">
                                            <div class="bg-[#266688] py-1 px-2 mx-2 text-white flex rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                    </path>
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>

                                            </div>
                                        </a>


                                        <form method="POST" action="{{ route('category.destroy', $category->id) }}"
                                            id="delete-form-{{ $category->id }}">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="parent_id" value="{{ $category->parent_id }}">

                                            <button type="button" onclick="deleteSingleImage({{ $category->id }})"
                                                class="bg-red-500  py-1 px-2 mx-2 flex text-white rounded-md">
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
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="z-0 mt-3">
            {{ $categories->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
