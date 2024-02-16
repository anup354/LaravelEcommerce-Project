<!-- component -->
<!-- This is an example component -->
@extends('admin._layouts.master')

@section('body')
    <div class="relative w-full ">
        <div class="p-4">
            @include('admin.message.index')

            <div class="flex justify-between my-5 ">

                <p class="mb-2 text-lg font-bold">Attribute </p>
                <a class="bg-[#4456a6] text-white h-10 p-2 text-sm flex gap-2 items-center font-main rounded-lg"
                    href="{{ route('attributes.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus pt-1 " width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Add Attribute
                </a>
            </div>

            <form id="attribute-search" action="{{ route('filterattributegroup') }} "
                method="POST">
                @csrf
                <label for="status" class="text-md font-semibold">Filter by Attribute Group : </label>
                <select id="attribute-select" name="groupid" class="rounded-lg bg-[#4456a6] p-1 px-3 text-white">
                    <option value="0">All</option>
                    @foreach ($attributeGroups as $attributeGroup)
                        <option value="{{ $attributeGroup->id }}"
                            {{ $attributeGroup->id == $attrbutegroup_id ? 'selected' : '' }}>
                            {{ $attributeGroup->attribute_group_name }}
                        </option>
                    @endforeach
                </select>
            </form>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const statusSelect = document.getElementById("attribute-select");
                    const statusForm = document.getElementById("attribute-search");

                    statusSelect.addEventListener("change", function() {
                        statusForm.submit();
                    });
                });
            </script>

            {{-- <select id="attribute_group_id" name="attribute_group_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#7065d4] focus:border-[#7065d4] block w-full p-2.5 ">
                <option disabled selected>All</option>
                @foreach ($attributeGroups as $attributeGroup)
                    <option value="{{ $attributeGroup->id }}">
                        {{ $attributeGroup->attribute_group_name }}</option>
                @endforeach
            </select> --}}










            <!-- component -->
            <div class='product-table bg-white p-3 rounded-lg mt-10 font-main  shadow'>
                <div class="relative overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="font-normal p-10">
                            <tr class="">
                                <th class="p-2 font-semibold">
                                    Attribute Title</th>
                                <th class="font-semibold">
                                    Attribute Group</th>
                                <th class="font-semibold">
                                    Sort Order</th>
                                <th class="font-semibold">
                                    Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @foreach ($attributes as $attribute)
                                <tr class=" ">
                                    <td class="">{{ $attribute->attribute_name }}</td>
                                    <td class="">{{ $attribute->getGroup->attribute_group_name }}</td>
                                    <td class="">{{ $attribute->sort_order }}</td>
                                    <td class="">
                                        <div class="flex p-2 justify-center">

                                            <a href="{{ route('attributes.edit', $attribute->id) }}"
                                                class="bg-[#266688] py-1 px-2 mx-2 text-white flex rounded-md">Edit</a>
                                            {{-- <form action="{{ route('attributes.destroy', $attribute->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500  py-1 px-2 mx-2 flex text-white rounded-md">Delete</button>
                                            </form> --}}

                                            <form method="POST" action="{{ route('attributes.destroy', $attribute->id) }}"
                                                id="delete-form-{{ $attribute->id }}">
                                                @csrf
                                                @method('delete')

                                                <button type="button" onclick="deleteSingleImage({{ $attribute->id }})"
                                                    class="bg-red-500  py-1 px-2 mx-2 flex text-white rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>
                                                </button>
                                            </form>


                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class=" mt-3">
            {{ $attributes->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
