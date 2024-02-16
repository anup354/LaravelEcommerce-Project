@extends('frontend._layout._master')

@section('body')
    <div class="px-20 py-5 max-lg:px-10 max-sm:px-5">

        <div class="flex bg-white  shadow-xl rounded-xl">

            <section class="flex-1">

                <div class="hidden lg:relative md:block h-full">
                    <img src="{{ asset('images/fashion-design-concept.jpg') }}" alt=""
                        class="h-full object-cover rounded-l-xl">
                </div>
            </section>

            <main class="md:flex-1  md:p-6 p-3 max-sm:mx-5 max-md:w-full">
                <div class="max-md:w-full">

                    <div class="pb-8 max-sm:text-center">
                        <h1 class="text-3xl font-semibold text-[#f15a28]  ">Change your password</h1>
                        {{-- <p class="text-gray-500 font-medium py-2">Please Login to your account</p> --}}
                    </div>
                    @include('admin.message.index')


                    <form action=" {{ route('changepassword', $checkotp->membercode) }}" method="POST">
                        @csrf
                        <div class="mt-1"> <label for="" class="text-sm font-medium text-gray-700">New
                                Password</label> <br>
                            <input type="newpassword" name="newpassword"
                                class="mt-1 w-full p-2 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">

                            @error('newpassword')
                                <div class="invalid-feedback text-sm text-[#f15a28] " style="display: block;">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>
                        <div class="mt-5"> <label for="" class="text-sm font-medium text-gray-700">Confirm
                                Password</label> <br>
                            <input type="confirmpassword" name="confirmpassword"
                                class="mt-1 w-full p-2 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">

                            @error('confirmpassword')
                                <div class="invalid-feedback text-sm text-[#f15a28] " style="display: block;">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>

                        <button
                            class=" mt-5  rounded-md border border-red-500 bg-red-500 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#F1612D] w-full focus:outline-none focus:ring active:text-[#7065d4]">
                            Change Password
                        </button>

                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
