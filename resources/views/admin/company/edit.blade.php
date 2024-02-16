@extends('admin._layouts.master')

@section('body')
    <div class="flex items-center gap-4">
        <a href="{{ route('company.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="text-xl font-bold">Edit {{ $company->title }}</div>
    </div>
    <div class="mt-30 bg-white w-full rounded-lg shadow-lg text-slate-600">

        <form method="post" action="{{ route('company.update', $company->id) }}">
            @csrf
            @method('put')

            <div class="p-6 mt-3 ">
                <div class="flex flex-col ">
                    <div>
                        <label class="text-sm font-semibold w-full" htmlFor="">
                            Title
                        </label>
                        <div>
                            <div>
                                <input
                                    class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4] "
                                    disabled placeholder="Type title here" type="text" name="title"
                                    value="{{ old('title', $company->title) }}" />

                                @error('title')
        <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                            * {{ $message }}
                                        </div>
    @enderror
                            </div>



                        </div>


                        {{-- email  --}}
                        {{-- @if ($company->email)
                        <div>
                            <label class="text-sm font-semibold w-full" htmlFor="">
                                Email
                            </label>
                            <div>
                                <input
                                    class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4]"
                                    placeholder="Type contact email here" type="email" name="email"
                                    value="{{ $company->email }}" />
                                @error('email')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}

                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif --}}

                        {{-- phone number  --}}
                        {{-- @if ($company->phone_number)
                        <div>
                            <label class="text-sm font-semibold w-full" htmlFor="">
                                Phone Number
                            </label>
                            <div>
                                <input
                                    class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4]"
                                    placeholder="Type contact number here" type="text" name="phone_number"
                                    value="{{ $company->phone_number }}" />
                                @error('phone_number')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}

                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif --}}

                        {{-- Address  --}}

                        {{-- @if ($company->address)
                        <div>
                            <label class="text-sm font-semibold w-full" htmlFor="">
                                Address
                            </label>
                            <div>
                                <input
                                    class="text-xs border w-full border-gray-300 p-3 rounded mt-3 focus:border-[#7065d4] hover:border-[#7065d4]"
                                    placeholder="Type address here" type="text" name="address"
                                    value="{{ $company->address }}" />
                                @error('address')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}

                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif --}}


                        <div class="text-sm font-semibold w-full mt-4">
                            Description
                        </div>

                        <textarea id="editor" class="tinymce block w-full mt-2 rounded-md" name="description" rows="6">{{ old('description', $company->description) }}</textarea>
                        @error('description')
        <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
    @enderror


                        <div>
                            <button type="submit"
                                class="border mt-5 border-black text-black px-10 py-2 rounded-md mr-2 bg-white hover:bg-black hover:text-white">
                                Submit
                            </button>
                        </div>

                    </div>
                </div>
        </form>
        </div>
@endsection
