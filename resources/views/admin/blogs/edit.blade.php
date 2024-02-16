@extends('admin._layouts.master')
@section('body')
    <div class="flex gap-4">
        <a href="{{ route('blogs.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Blog </div>
    </div>

    <div class=" mt-30 bg-white w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('blogs.update', $blog->id) }}
        " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-6  mt-3">
                <div class="flex flex-col ">
                    <div>
                        <label class="text-sm font-semibold w-full" htmlFor="">
                            Title
                        </label>

                        <div>
                            <input
                                class="text-xs border focus:outline-none text-black border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="title" placeholder="Enter Title Here" type="text" value="{{ old('title',$blog->title) }}" />
                            @error('title')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div class="mt-3">
                        <label class='text-sm font-semibold'>Blog Image</label>
                        <div class='text-sm p-2 form-control border border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                            <input type="file" name="featured_image" id="image"
                                class="image focus:border-[#7065d4] hover:border-[#7065d4]" onchange="loadFile(event)" />
                        </div>
                        <img class="myoldimage" src="{{ asset('/uploads/' . $blog->featured_image) }}" alt="Card"
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

                        @error('featured_image')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div>
                        <label class="text-sm font-semibold w-full" htmlFor="">
                            Reading Time <span class="font-normal italic">( in minutes)</span>
                        </label>

                        <div>
                            <input
                                class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                name="reading_time" placeholder="Enter Reading time Here" type="text" value="{{ old('reading_time',$blog->reading_time) }}" />
                            @error('reading_time')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> --}}

                    <div class=" text-md font-semibold w-full mt-4">
                        Description
                    </div>
                    <textarea class="tinymce border block w-full mt-1 rounded-md focus:border-[#7065d4] hover:border-[#7065d4]"
                        name="description" rows="6">{{ old('description',$blog->description ) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                            * {{ $message }}
                        </div>
                    @enderror
                    <div>
                        <button
                        class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">
                            Edit
                        </button>
                    </div>
                </div>
            </div>



        </form>
    </div>
@endsection
