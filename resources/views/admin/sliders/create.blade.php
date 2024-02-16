@extends('admin._layouts.master')

@section('page_title', 'Add Banner')
@section('banner_select', 'bg-[#F1612D] text-white')
@section('body')
    <div class="flex gap-2 items-center">
        <a href="{{ route('banner.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </a>
        <div class="text-xl font-bold">Add Banner</div>
    </div>
    <div class="mt-30 bg-white w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-6  mt-3">
                <div class="flex flex-col">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" htmlFor="">
                            Banner name
                        </label>
                        <div>
                            <input
                                class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                                name="title" placeholder="Type Banner name here" type="text"
                                value="{{ old('title') }}" />
                            @error('title')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}

                                </div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block my-2 text-sm font-medium text-gray-900 " htmlFor="">
                            Banner order
                        </label>
                        <div>
                            <input
                                class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                                name="banner_order" placeholder="Type banner order here" type="text"
                                value="{{ old('banner_order') }}" />
                            @error('banner_order')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- image --}}
                    <div class="mt-3">
                        <label class='text-sm font-semibold'>Image</label>
                        <div
                            class='text-sm p-2 form-control border-2 border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                            <input type="file" name="banner_image" onchange="loadFile(event)" />
                        </div>
                        <img id="output" style="width: 70px; margin-bottom: 2px;" />

                        @error('banner_image')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
