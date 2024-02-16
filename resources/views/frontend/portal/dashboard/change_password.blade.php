@extends('frontend.portal._layouts.master')

@section('body')
    <!-- Static sidebar for desktop -->
    <div class=" md:flex md:flex-shrink-0 ">
        {{-- @include('frontend.portal.dashboard.user_sidebar') --}}
        <div class="flex flex-col  flex-1 overflow-hidden">
            @include('admin.message.index')
            <div class="flex  flex-shrink-0 ">

                <div class="flex flex-col  flex-1 overflow-hidden">
                    <div class="flex-1 relative flex-shrink-0 overflow-y-auto focus:outline-none">
                        <div class="py-6">

                            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                                <h1 class="text-2xl font-semibold text-gray-900">Change Password</h1>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                                    <div class="mt-2">
                                        <div class="w-full ">
                                            <div class="mt-4">
                                                <form method="POST" id="updateform"
                                                    action="{{ route('user.passwordchange', Auth::guard('customer_registrations')->user()->id) }}">
                                                    @csrf
                                                    @method('post')
                                                    <label class="block mb-2">
                                                        <span class="text-gray-700">Old Password</span>
                                                        <input name="old_password" type="password"
                                                            value="{{ old('old_password') }}"
                                                            class="block w-full mt-1 border h-10 rounded-lg p-2" />
                                                        @error('old_password')
                                                            <p class="text-sm text-red-500">* {{ $message }}</p>
                                                        @enderror
                                                    </label>
                                                    <label class="block mb-2">
                                                        <span class="text-gray-700">New Password</span>
                                                        <input name="new_password" value="{{ old('new_password') }}"
                                                            type="password"
                                                            class="block w-full mt-1 border-gray-300 border h-10 rounded-lg p-2" />
                                                        @error('new_password')
                                                            <p class="text-sm text-red-500">*  {{ $message }}</p>
                                                        @enderror
                                                    </label>
                                                    <label class="block mb-2">
                                                        <span class="text-gray-700">Confirm Password</span>
                                                        <input name="confirm_password" value="{{ old('confirm_password') }}"
                                                            type="password"
                                                            class="block w-full mt-1 border-gray-300 border h-10 rounded-lg p-2" />
                                                        @error('confirm_password')
                                                            <p class="text-sm text-red-500">*  {{ $message }}</p>
                                                        @enderror
                                                    </label>


                                                    <button
                                                        class="bg-[#4456a6] text-white px-4 py-2 rounded">Change</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
