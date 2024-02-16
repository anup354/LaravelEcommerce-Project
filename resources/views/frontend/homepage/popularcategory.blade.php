<div class="flex flex-col justify-center items-center ">
    <div class="w-full  flex flex-col gap-5">
        <div class="font-medium  text-2xl leading-8 text-webblack text-center uppercase">
            <span class="inline-block text-[#f15a28] py-5 relative">
                Most Popular Categories
                <span class="absolute w-2/5  bottom-0 left-[30%] border-b-4 border-[#f15a28] rounded-3xl"></span>
            </span>
        </div>

        <div class="grid grid-cols-6 max-lg:grid-cols-4 max-md:grid-cols-3 max-sm:grid-cols-2 sm:gap-6 gap-2 pt-10">
            @foreach ($categories as $key => $category)
                <a href="{{ route('getbycategory', ['category' => $category->slug . '?0da2qwz=' . $category->category_id]) }}"
                    class="shadow-lg h-[30vh] px-5 py-1 rounded-lg bg-white flex flex-col items-center  hover:scale-90 shadowy transition duration-100 cursor-pointer">

                    @include("frontend.components.categorycomponent")
                    {{-- <div class="w-full">
                        <div class="text-center ">
                            <div class="block " href="#">
                                <div class="relative overflow-hidden">
                                    <div class=" overflow-hidden">
                                        <img class="object-cover w-full mx-auto transition-all rounded h-32 bo hover:scale-110"
                                            src="{{ asset('uploads/' . $category->image) }}" alt="">
                                    </div>
                                </div>

                                <h3 class="mb-2 text-[#f15a28]  text-sm font-bold "> {{ $category->categoryname }} </h3>

                            </div>
                        </div>
                    </div> --}}

                </a>
            @endforeach


        </div>

        <div class="flex justify-center items-center my-10">
            <a href="{{route("allcategories")}}"
                class="bg-[#f15a28] max-sm:text-sm font-medium text-white px-6 py-2 rounded-md hover:bg-white hover:text-[#f15a28] border-[#f15a28] border cursor-pointer">VIEW
                MORE</a>
        </div>
    </div>
</div>
