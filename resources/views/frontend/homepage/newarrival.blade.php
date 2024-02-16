<section class="flex items-center  font-poppins mx-auto max-w-screen-2xl ">
    <div class="justify-center flex-1  ">
        <div class="flex justify-between">
            <h2 class="pb-2 text-xl font-bold text-left text-[#4456a6] md:text-3xl ">
                New Arrivals
            </h2>
            <a href="
            {{ route('newarrival') }}
            " class="px-4 py-2 flex text-[#f15a28] items-center hover:underline ">
                View All
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M13 18l6 -6"></path>
                    <path d="M13 6l6 6"></path>
                </svg>
            </a>
        </div>
        <div class="w-20 mb-6 border-b border-red-700 "></div>
        <div class="grid gap-4 mb-11 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 ">
            @foreach ($latestproducts as $key => $product)
                <a href="
                {{ route('product.singlepage', $product->slug) }}
                " class="border rounded-md bg-white">
                    @include('frontend.components.productcomponent', ['product' => $product])
                </a>
            @endforeach
        </div>

    </div>
</section>
