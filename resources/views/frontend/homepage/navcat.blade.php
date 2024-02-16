<div class="mx-auto text-[#4456a6] max-sm:hidden  max-w-screen-2xlxl:px-10 2xl:px-24 w-full ">
    <div class="flex gap-2 w-full  items-center ">
        @foreach (getCategories(0) as $key => $category)
            <div class="group hoverable cursor-pointer border-l ">
                <div class="flex items-center justify-between space-x-5 text-white px-2">
                    <a href="
                    {{ route('getbycategory', ['category' => $category->slug . '?0da2qwz=' . $category->category_id]) }}
                    "
                        class="menu-hover my-1 text-base font-medium ">
                        {{ $category->categoryname }}
                    </a>
                    <span>
                        <style>
                            .svg-white {
                                fill: white;
                            }
                        </style>
                        @if (getCategories($category->id)->count() > 0)
                            <svg xmlns="http://www.w3.org/2000/svg" height="0.75em"
                                class="svg-white rotate-0 group-hover:rotate-180 duration-500" viewBox="0 0 512 512">
                                <path
                                    d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                            </svg>
                        @endif

                    </span>
                    {{-- group-hover:visible' : '' }} invisible absolute  z-50 grid grid-cols-2 mx-auto max-w-screen-2xl md:grid-cols-3 lg:grid-cols-5  bg-white  text-[#4456a6] left-16 rounded   border px-12  shadow-xl  py-1  --}}
                </div>
                <div
                    class=" {{ getCategories($category->id)->count() > 0 ? ' group-hover:visible' : '' }} invisible absolute py-4  z-50 grid grid-cols-2 left-16  md:grid-cols-3 lg:grid-cols-5  bg-white  text-[#4456a6]  rounded   border px-12  shadow-xl   w-[90%]">
                    @foreach (getCategories($category->id) as $key => $subcategory)
                        <div class="flex float-left flex-col flex-wrap ">
                            <a href="
                            {{ route('getbycategory', ['category' => $subcategory->slug . '?0da2qwz=' . $subcategory->category_id]) }}
                            "
                                class="px-3 py-1 block text-[#f15a28] w-full border-gray-100 font-semibold">
                                {{ $subcategory->categoryname }}
                            </a>


                            @foreach (getCategories($subcategory->id) as $key => $twosubcategory)
                                <a href="
                                {{ route('getbycategory', ['category' => $twosubcategory->slug . '?0da2qwz=' . $twosubcategory->category_id]) }}
                                "
                                    class="px-3 text-md block  w-full border-gray-100  font-semibold  text-gray-600  ">
                                    {{ $twosubcategory->categoryname }}</a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</div>
