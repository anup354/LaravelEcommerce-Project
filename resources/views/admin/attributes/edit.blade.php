<!-- component -->
<!-- This is an example component -->
@extends('admin._layouts.master')

@section('body')
    <div class=" w-full bg-white p-10 ">

        <p class="mb-10 text-lg font-bold">Edit Attribute</p>
        <form action="{{ route('attributes.update', $attribute->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="gap-6 mb-6 w-full ">
                <div>
                    <label for="attribute_name" class="block mb-2 text-sm  font-medium text-gray-900  ">Attribute
                        Title</label>
                    <input name="attribute_name" type="text" id="attribute_name"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5 @error('attribute_name') border-red-500 @enderror  "
                        value="{{ old('attribute_name', $attribute->attribute_name) }}" placeholder="">
                    @error('attribute_name')
                        <div class="invalid-feedback text-red-400 text-sm ">* {{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="sort_order" class="block mb-2 text-sm  font-medium text-gray-900">Sort Order</label>
                    <input name="sort_order" type="number" id="sort_order"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5"
                        value="{{ old('sort_order', $attribute->sort_order) }}" placeholder="">
                    @error('sort_order')
                    <div class="invalid-feedback text-red-400 text-sm ">* {{ $message }}</div>

                    @enderror
                </div>
                <div class="mt-4">
                    <label for="attribute_group_id" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Attribute Group
                    </label>
                    <select id="attribute_group_id" name="attribute_group_id"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md  focus:ring-[#7065d4] focus:border-[#7065d4] focus:outline-none block w-full p-2.5 ">
                        <option disabled selected>Choose an attribute group</option>
                        @foreach ($attributeGroups as $attributeGroup)
                            <option value="{{ $attributeGroup->id }}"
                                {{ old('attribute_group_id', $attribute->attribute_group_id) == $attributeGroup->id ? 'selected' : '' }}>
                                {{ $attributeGroup->attribute_group_name }}</option>
                        @endforeach
                    </select>
                    @error('attribute_group_id')
                    <div class="invalid-feedback text-red-400 text-sm ">* {{ $message }}</div>

                    @enderror
                </div>
            </div>

            <div class="flex gap-x-3">
                <button type="submit"
                    class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6] ">Submit</button>
                <a href="{{ route('attributes.index') }}"
                    class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6] ">Back</a>
            </div>
        </form>
    </div>
@endsection
