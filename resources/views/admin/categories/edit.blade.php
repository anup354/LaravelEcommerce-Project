@extends('admin._layouts.master')

@section('page_title', 'Edit Category')
@section('category_select', 'bg-[#F1612D] text-white')
@section('body')
    <div class="flex gap-4 items-center">
        <a href="{{ route('category.index', ['category' => $category->parent_id]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Category</div>
    </div>
    <div class="mt-30 bg-white w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="p-6  mt-3">
                <div class="flex flex-col">
                    <div>
                        <label class="block my-2 text-sm font-medium text-gray-900" for="categoryname">
                            Category name
                        </label>
                        <div>
                            <input
                                class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                                name="categoryname" id="categoryname" placeholder="Type category name here" type="text"
                                value="{{ $category->categoryname }}" />
                            @error('categoryname')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- image --}}

                    <div class="mt-3">
                        <label class='text-sm font-semibold'>Featured Image</label>
                        <div
                            class='text-sm p-2 form-control border-2 border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                            <input type="file" name="image" onchange="loadFile(event)" />
                        </div>

                        <img class="myoldimage" src="{{ asset('/uploads/' . $category->image) }}" alt="Card"
                            style="width: 70px;margin-bottom:2px;">
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

                        @error('image')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div>
                        <label class="block my-2 text-sm font-medium text-gray-900" for="category_order">
                            Category order
                        </label>
                        <div>
                            <input
                                class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                                name="category_order" id="category_order" placeholder="Type category order here"
                                type="text" value="{{ $category->category_order }}" />
                            @error('category_order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- image --}}
                    {{-- <div class="mt-3">

                        <label class='text-sm font-semibold'> Image</label>
                        <div
                            class='text-sm p-2 form-control border-2 border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                            <input type="file" name="featured_image" />
                            <img class="" src="{{ asset('/images/' . $category->featured_image) }}" alt="Card"
                                style="width: 70px;margin-bottom:2px;">

                        </div>
                        @error('featured_image')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="text-sm font-semibold">Show in Menu</label>
                        <div class="flex mt-2">
                            <div class="ml-4">
                                <input type="radio" name="in_menu" value="1" {{ $category->in_menu ? 'checked' : '' }}>
                                <span class="ml-1">Yes</span>
                            </div>
                            <div class="ml-4">
                                <input type="radio" name="in_menu" value="0" {{ !$category->in_menu ? 'checked' : '' }}>
                                <span class="ml-1">No</span>
                            </div>
                        </div>

                    </div> --}}

                    <div class="mt-2">
                        <label class="text-sm font-semibold">Featured <span class="underline font-normal italic">(show in
                                homepage)</span></label>
                        <div class="flex mt-2">
                            <div class="ml-4">
                                <input type="radio" name="featured" value="1"
                                    {{ $category->featured ? 'checked' : '' }}>
                                <span class="ml-1">Yes</span>
                            </div>
                            <div class="ml-4">
                                <input type="radio" name="featured" value="0"
                                    {{ !$category->featured ? 'checked' : '' }}>
                                <span class="ml-1">No</span>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="parent_id" value="{{ $category->parent_id }}">
                    <div>
                        <button type="submit"
                            class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
