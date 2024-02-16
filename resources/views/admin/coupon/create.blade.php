@extends('admin._layouts.master')

@section('body')
    <div class=" w-full bg-white p-10 ">

        <p class="mb-10 text-lg font-bold">Add Coupon</p>
        <form action="{{ route('coupon.store') }}" method="post">
            @csrf
            <div class="gap-6 mb-6 w-full ">
                <div>
                    <label for="title" class="block mb-2 text-sm  font-medium text-gray-900  ">
                        Title</label>
                    <input name="title" type="text" id="title"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5 @error('title') border-red-500 @enderror "
                        value="{{ old('title') }}" placeholder="">
                    @error('title')
                        <div class="invalid-feedback text-red-400 text-sm ">* {{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="discount_amount" class="block mb-2 text-sm  font-medium text-gray-900">Discount Percentage</label>
                    <input name="discount_amount" type="number" id="discount_amount"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5 @error('discount_amount') border-red-500 @enderror "
                        value="{{ old('discount_amount') }}" placeholder="">
                    @error('discount_amount')
                        <div class="invalid-feedback text-red-400 text-sm">* {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex gap-x-3">
                <button type="submit"
                    class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">Submit</button>
                <a href="{{ route('coupon.index') }}"
                    class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">Back</a>
            </div>

        </form>
    </div>
@endsection
