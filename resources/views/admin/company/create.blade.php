@extends('admin._layouts.master')

@section('body')
    {{-- <div class="rounded-tl-3xl p-2  shadow text-2xl text-textcolor w-full">Add Company Pages</div> --}}
    <div class="flex gap-4  items-center">
        <a href="{{ route('company.index') }}">

            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="text-xl font-bold">Add Pages</div>
    </div>

    <form method="post" action="{{ route('company.store') }} ">
        @csrf
        <div class="p-5 ">
            <div class="flex flex-col ">
                <div>
                    <label class="text-sm font-semibold w-full" htmlFor="">
                        Title
                    </label>
                    <div>
                        <input
                            class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4]"
                            placeholder="Type title here" type="text" name="title" value="{{ old('title') }}" />
                        @error('title')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- email  --}}
                {{-- <div>
                    <label class="text-sm font-semibold w-full" htmlFor="">
                        Email
                    </label>
                    <div>
                        <input
                            class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4]"
                            placeholder="Type contact email here" type="email" name="email"
                            value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}

                            </div>
                        @enderror
                    </div>
                </div> --}}
                {{-- phone number  --}}
                {{-- <div>
                    <label class="text-sm font-semibold w-full" htmlFor="">
                        Phone Number
                    </label>
                    <div>
                        <input
                            class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4]"
                            placeholder="Type contact number here" type="text" name="phone_number"
                            value="{{ old('phone_number') }}" />
                        @error('phone_number')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}

                            </div>
                        @enderror
                    </div>
                </div> --}}
                {{-- Address  --}}
                {{-- <div>
                    <label class="text-sm font-semibold w-full" htmlFor="">
                        Address
                    </label>
                    <div>
                        <input
                            class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4]"
                            placeholder="Type address here" type="text" name="address" value="{{ old('address') }}" />
                        @error('address')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}

                            </div>
                        @enderror
                    </div>
                </div> --}}


                <div class="text-sm font-semibold w-full mt-4">
                    Description
                </div>
                <textarea id="editor" class="tinymce block w-full mt-2 rounded-md" name="description" rows="6">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                        * {{ $message }}
                    </div>
                @enderror


                <div class="">
                    <button
                        class="border mt-5 border-black text-black px-10 py-2 rounded-md mr-2 bg-white hover:bg-black hover:text-white">
                        Submit
                    </button>
                </div>

            </div>
        </div>
    </form>
@endsection
