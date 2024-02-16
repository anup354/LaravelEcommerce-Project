@extends('admin._layouts.master')

@section('body')
    {{-- @php
dd(Auth::guard('user_profiles')->user()->email)
@endphp --}}
    <div class="px-5 w-full">

        @include('admin.message.index')

        <div class="flex justify-between">
            <div class="text-2xl font-bold"> Blogs</div>
            <div class="flex">
                <a href='{{ route('blogs.create') }} '
                    class=' bg-[#4456a6] text-white h-10 p-2 text-sm flex gap-2 items-center rounded-lg'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z" />
                    </svg>
                    <span>Add Blogs</span>
                </a>
            </div>
        </div>
        <div class=" py-3">
            <div class="mt-1">
                {{-- -mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto z-[0] max-h-screen overflow-y-auto --}}
                <div class="bg-white p-3 product-tablerounded-lg mt-10 relative  shadow ">
                    <div class=" overflow-x-auto ">
                        {{-- max-h-screen min-w-full shadow rounded-lg z-[0] overflow-y-hidden --}}
                        <table class="min-w-full  divide-y divide-gray-200">
                            <thead class="">
                                <tr>
                                    <th class="px-5 py-3  text-left   font-semibold   ">
                                        Title</th>
                                    {{-- <th
                                    class="px-5 py-3  text-left   font-semibold   ">
                                    Description</th> --}}
                                    <th class="px-5 py-3  text-left   font-semibold   ">
                                        Image</th>
                                    <th class="px-5 py-3  text-left   font-semibold   ">
                                        Created at</th>
                                    {{-- <th
                                        class="px-5 py-3  text-left   font-semibold   ">
                                        Updated at</th> --}}
                                    {{-- <th
                                        class="px-5 py-3  text-left   font-semibold   ">
                                        Status</th> --}}
                                    <th class="px-5 py-3  text-left   font-semibold   ">
                                        Actions</th>
                                </tr>
                            </thead>


                            @foreach ($blogs as $key => $blog)
                                <tbody class="bg-white divide-y divide-gray-200 ">
                                    <tr>
                                        <td class="px-5 py-3  ">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $blog->title }}</p>
                                        </td>

                                        <td class="p-2" style="width: 100px;">
                                            <img class="w-full h-full "
                                                src="{{ asset('/uploads/' . $blog->featured_image) }}" alt="Card"
                                                style="width: 70px;">
                                        </td>

                                        <td class="px-5 py-3  text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $blog->created_at->format('jS M Y') }}
                                            </p>
                                        </td>
                                        {{-- <td class="px-5 py-3 border-b  text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ date('jS M Y', strtotime($blog->updated_at)) }}
                                            </p>
                                        </td> --}}
                                        {{-- <td class="px-5 py-3 border-b  text-sm">
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span class="relative">
                                                    @if ($blog->status == '1')
                                                        <span
                                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                            <span aria-hidden
                                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                            <span class="relative">Active</span>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                            <span aria-hidden
                                                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                            <span class="relative">Inactive</span>
                                                        </span>
                                                    @endif
                                                </span>
                                            </span>
                                        </td> --}}

                                        <td class="z-[999]">
                                            <div x-data="{ isActive: false }" class="">
                                                <div
                                                    class="inline-flex items-center overflow-hidden font-normal rounded-md border bg-white">
                                                    <button x-on:click="isActive = !isActive"
                                                        class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                                        <span class="sr-only">Menu</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-dots-vertical"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div class="z-[999] absolute end-0  mt-2 mr-32 w-36 divide-y font-semibold divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                                                    role="menu" x-cloak x-transition x-show="isActive"
                                                    x-on:click.away="isActive = false"
                                                    x-on:keydown.escape.window="isActive = false">
                                                    <div class="">

                                                        <a href="{{ route('blogs.edit', $blog->id) }}"
                                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-sky-500 rounded-md hover:text-white">Edit
                                                        </a>



                                                    </div>
                                                    <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}"
                                                        id="delete-form-{{ $blog->id }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button"
                                                            onclick="deleteSingleImage({{ $blog->id }})"
                                                            class="flex w-full items-center gap-2   px-2 py-2 text-md openModal text-center text-red-700 hover:bg-red-50">
                                                            <span class="pl-2">
                                                                Delete
                                                            </span>
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
                <div class="z-0 mt-3">
                    {{ $blogs->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
