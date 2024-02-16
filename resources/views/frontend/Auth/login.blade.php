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
                        <h1 class="text-3xl font-semibold text-[#f15a28]  ">Welcome Back</h1>
                        <p class="text-gray-500 font-medium py-2">Please Login to your account</p>
                    </div>
                    @include('admin.message.index')


                    <form action=" {{ route('customerlogin') }}" method="POST">
                        {{-- @include('admin.includes.messages') --}}

                        @csrf
                        @method('post')
                        <div class=""><label for="" class="text-sm font-medium text-gray-700">Email</label>
                            <br>
                            <input type="email" name="email"
                                class="mt-1 w-full p-2 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                            @error('email')
                                <div class="invalid-feedback text-sm text-[#f15a28] " style="display: block;">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>
                        <div class="mt-5"> <label for=""
                                class="text-sm font-medium text-gray-700">Password</label> <br>
                            <input type="password" name="password"
                                class="mt-1 w-full p-2 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">

                            @error('password')
                                <div class="invalid-feedback text-sm text-[#f15a28] " style="display: block;">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>

                        <div class="flex justify-between mt-5">
                            <div class="flex gap-2">
                                <input type="checkbox">
                                <span class="text-sm text-gray-700 ">Remember Me</span>
                            </div>
                            <a href="{{ route('forgotpassword') }}">
                                <div class="font-medium text-[#f15a28]  ">Forgot Password ? </div>
                            </a>
                        </div>
                        <button
                            class=" mt-5  rounded-md border border-red-500 bg-red-500 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#F1612D] w-full focus:outline-none focus:ring active:text-[#7065d4]">
                            Login
                        </button>
                        <div class="relative my-6">
                            <span class="block w-full h-px bg-gray-300"></span>
                            <p class="inline-block w-fit text-sm bg-white px-2 mb-5 absolute -top-2 inset-x-0 mx-auto">Or
                                continue with</p>
                        </div>
                        <div class=" text-sm font-medium ">
                            <a href="{{ route('google.login') }}">
                                <div
                                    class="w-full flex items-center justify-center gap-x-3 py-2.5 border rounded-lg hover:bg-gray-50 duration-150 active:bg-gray-100">
                                    <svg class="w-5 h-5" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_17_40)">
                                            <path
                                                d="M47.532 24.5528C47.532 22.9214 47.3997 21.2811 47.1175 19.6761H24.48V28.9181H37.4434C36.9055 31.8988 35.177 34.5356 32.6461 36.2111V42.2078H40.3801C44.9217 38.0278 47.532 31.8547 47.532 24.5528Z"
                                                fill="#4285F4" />
                                            <path
                                                d="M24.48 48.0016C30.9529 48.0016 36.4116 45.8764 40.3888 42.2078L32.6549 36.2111C30.5031 37.675 27.7252 38.5039 24.4888 38.5039C18.2275 38.5039 12.9187 34.2798 11.0139 28.6006H3.03296V34.7825C7.10718 42.8868 15.4056 48.0016 24.48 48.0016Z"
                                                fill="#34A853" />
                                            <path
                                                d="M11.0051 28.6006C9.99973 25.6199 9.99973 22.3922 11.0051 19.4115V13.2296H3.03298C-0.371021 20.0112 -0.371021 28.0009 3.03298 34.7825L11.0051 28.6006Z"
                                                fill="#FBBC04" />
                                            <path
                                                d="M24.48 9.49932C27.9016 9.44641 31.2086 10.7339 33.6866 13.0973L40.5387 6.24523C36.2 2.17101 30.4414 -0.068932 24.48 0.00161733C15.4055 0.00161733 7.10718 5.11644 3.03296 13.2296L11.005 19.4115C12.901 13.7235 18.2187 9.49932 24.48 9.49932Z"
                                                fill="#EA4335" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_17_40">
                                                <rect width="48" height="48" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Continue with Google
                                </div>
                            </a>
                            {{-- <button
                                class="w-full flex items-center justify-center gap-x-3 py-2.5 border rounded-lg hover:bg-gray-50 duration-150 active:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"
                                    class="fb">
                                    <style>
                                        .fb {
                                            fill: #6184c2
                                        }
                                    </style>
                                    <path
                                        d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                                </svg>
                                Continue with Facebook
                            </button> --}}
                        </div>
                        <div class=" text-gray-700 mt-5 text-center flex flex-col justify-center item-center">
                            <div>
                                Don't have an account ?
                            </div>

                            <a href="{{ route('register') }}">
                                <div class="font-medium text-[#f15a28] my-2">Register for free</div>
                            </a>
                        </div>
                    </form>


                </div>
            </main>
        </div>
    </div>
@endsection
