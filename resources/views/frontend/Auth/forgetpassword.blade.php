@extends('frontend._layout._master')

@section('body')
    <!-- component -->
    <div class=" px-20 max-lg:px-10 max-md:px-5 mx-auto max-w-screen-2xl">
        <!-- Container -->
        @include("admin.message.index")
        <div class="">
            <div class="flex w-full">
                <!-- Row -->
                <div class="w-full  flex">
                    <!-- Col -->
                    <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg">
                        <img src="{{ asset('images/forget.jpg') }}" alt="forgetpassword"
                        class="h-full object-cover rounded-l-xl">
                    </div>
                    <!-- Col -->
                    <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <div class="px-8 mb-4 text-center">
                            <h3 class="pt-4 mb-2 text-2xl text-[#f15a28]">Forgot Your Password?</h3>
                            <p class="mb-4 text-sm text-gray-700">
                                We get it, stuff happens. Just enter your email address below and we'll send you OTP to reset your password!
                            </p>
                        </div>
                        <form method="POST" action="{{ route('checkemail') }}"
                            class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Email
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="email" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter Email Address..." />
                                @error('email')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-6 text-center">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                    Reset Password
                                </button>
                            </div>
                            <hr class="mb-6 border-t" />
                            <div class="text-center">
                                <a class="inline-block text-sm text-[#7065d4] align-baseline hover:text-blue-800"
                                href="{{ route('register') }}">
                                    Create an Account!
                                </a>
                            </div>
                            <div class="text-center">
                                <a class="inline-block text-sm text-[#7065d4] align-baseline hover:text-blue-800"
                                href="{{route('login')}}">
                                    Already have an account? Login!
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
