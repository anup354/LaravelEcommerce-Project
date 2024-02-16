<div class="w-full">
    <div class="text-center ">
        <div class="block ">
            <div class="relative overflow-hidden">
                <div class=" overflow-hidden">
                    <img class="object-cover w-full mx-auto transition-all rounded max-sm:h-24 h-32 bo hover:scale-110"
                        src="{{ asset('uploads/' . $category->image) }}" alt="">
                </div>
            </div>
            <h3 class="mb-2 text-[#f15a28]  text-sm font-bold ">
                {{ $category->categoryname }}
            </h3>
        </div>
    </div>
</div>
