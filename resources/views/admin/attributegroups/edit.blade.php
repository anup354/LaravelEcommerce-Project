<!-- component -->
<!-- This is an example component -->
@extends('admin._layouts.master')

@section('body')
    <div class=" w-full bg-white p-10 ">

        <p class="mb-10 text-lg font-bold">Edit Attribute Group</p>
        <form action="{{ route('attributegroups.update', $attributegroup->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="gap-6 mb-6 w-full ">
                <div>
                    <label for="attribute_group_name" class="block mb-2 text-sm  font-medium text-gray-900  ">Attribute Group
                        Title</label>
                    <input name="attribute_group_name" type="text" id="attribute_group_name"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                        value="{{ old('attribute_group_name', $attributegroup->attribute_group_name) }}" placeholder="">
                    @error('attribute_group_name')
                    <div class="invalid-feedback text-red-400 text-sm ">* {{ $message }}</div>

                    @enderror
                </div>
                <div class="mt-4">
                    <label for="sort_order" class="block mb-2 text-sm  font-medium text-gray-900">Sort Order</label>
                    <input name="sort_order" type="number" id="sort_order"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5     "
                        value="{{ old('sort_order', $attributegroup->sort_order) }}" placeholder="">
                    @error('sort_order')
                    <div class="invalid-feedback text-red-400 text-sm ">* {{ $message }}</div>

                    @enderror
                </div>

            </div>

            <div class="flex gap-x-3">
                <button type="submit"
                class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">Submit</button>
                <a href="{{route('attributegroups.index')}}"
                class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">Back</a>
            </div>
        </form>
    </div>
@endsection
