<section class="flex items-center  font-poppins  ">
    <div class="justify-center flex-1  py-4 ">
        <div class="">
            <div class="flex justify-between flex-wrap items-center ">
                <h2 class="max-sm:text-lg text-2xl font-bold text-left text-[#4456a6] md:text-2xl ">
                    Related Products
                </h2>
                
            </div>
            <div class="flex py-4">
                <div class="w-[10%] border border-[#f15a28]"></div>
                <div class="w-[90%] border"></div>
            </div>

        </div>
        {{-- <div class="w-20 mb-6 border-b border-red-700 "></div> --}}
        <div class="grid gap-4 mb-11 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($relatedproducts as $key => $product)
                <a href="
                {{ route('product.singlepage', $product->slug) }}
                " class="border rounded-md bg-white">
                    @include('frontend.components.productcomponent', ['product' => $product])
                </a>
            @endforeach
        </div>

    </div>
</section>
