    <div class="py-10">
        <div class="flex justify-between py-3">
            <h2 class="text-2xl font-bold text-left text-[#4456a6] md:text-2xl ">
                Brand
            </h2>
            <a href="{{ route('brands') }}" class="px-4 py-2 flex text-[#f15a28] items-center hover:underline ">

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

            {{-- <a href="#_"
                class="relative inline-flex items-center justify-start px-3 py-1 overflow-hidden font-medium transition-all bg-[#f15a28]  rounded hover:bg-white group">
                <span
                    class="w-48 h-48 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                <span
                    class="relative w-full text-left text-white  transition-colors duration-300 ease-in-out group-hover:text-white">View
                    All</span>
            </a> --}}
        </div>
        <div class="grid  grid-cols-2 gap-4 lg:gap-4 sm:gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
            @foreach ($brands as $key => $brand)
                <a href="
                {{ route('getbybrand', $brand->slug) }}
                ">

                    @include('frontend.components.brandcomponent', ['brand' => $brand])

                    {{-- <div class="w-full">
                        <div class="p-4 text-center bg-white rounded shadow ">
                            <div class="block " href="#">
                                <div class="relative overflow-hidden">
                                    <div class=" overflow-hidden">
                                        <img class="object-cover w-full mx-auto transition-all rounded h-32 bo hover:scale-110"
                                            src="{{ asset('uploads/' . $brand->image) }}" alt="">
                                    </div>
                                </div>

                                <h3 class="mb-2 text-sm font-bold "> {{ $brand->brandname }} </h3>

                            </div>
                        </div>
                    </div> --}}
                </a>
            @endforeach
            {{-- <div class="w-full">
                <div class="p-4 text-center bg-white rounded shadow ">
                    <div class="block mb-2" href="#">
                        <div class="relative overflow-hidden">
                            <div class="mb-5 overflow-hidden">
                                <img class="object-cover w-full mx-auto transition-all rounded h-32 hover:scale-110"
                                    src="https://i.postimg.cc/sgKB6VR6/ryan-plomp-a-Ctb-RTwu-M-unsplash-1.jpg"
                                    alt="">
                            </div>
                        </div>
                        <a href="#">
                            <h3 class="mb-2 text-sm font-bold "> Nike Shoes </h3>
                        </a>

                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="p-4 text-center bg-white rounded shadow ">
                    <div class="block mb-2" href="#">
                        <div class="relative overflow-hidden">
                            <div class="mb-5 overflow-hidden">
                                <img class="object-cover w-full mx-auto transition-all rounded h-32 hover:scale-110"
                                    src="https://i.postimg.cc/x8LtrkfV/kenny-eliason-HIz-Gn9-FZDFU-unsplash.jpg"
                                    alt="">
                            </div>
                        </div>
                        <a href="#">
                            <h3 class="mb-2 text-sm font-bold "> Nikon Lenses </h3>
                        </a>



                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="p-4 text-center bg-white rounded shadow ">
                    <div class="block mb-2" href="#">
                        <div class="relative overflow-hidden">
                            <div class="mb-5 overflow-hidden">
                                <img class="object-cover w-full mx-auto transition-all rounded h-32 hover:scale-110"
                                    src="https://i.postimg.cc/x8LtrkfV/kenny-eliason-HIz-Gn9-FZDFU-unsplash.jpg"
                                    alt="">
                            </div>
                        </div>
                        <a href="#">
                            <h3 class="mb-2 text-sm font-bold "> Nikon Lenses </h3>
                        </a>



                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="p-4 text-center bg-white rounded shadow ">
                    <div class="block mb-2" href="#">
                        <div class="relative overflow-hidden">
                            <div class="mb-5 overflow-hidden">
                                <img class="object-cover w-full mx-auto transition-all rounded h-32 hover:scale-110"
                                    src="https://i.postimg.cc/x8LtrkfV/kenny-eliason-HIz-Gn9-FZDFU-unsplash.jpg"
                                    alt="">
                            </div>
                        </div>
                        <a href="#">
                            <h3 class="mb-2 text-sm font-bold "> Nikon Lenses </h3>
                        </a>



                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="p-4 text-center bg-white rounded shadow ">
                    <div class="block mb-2" href="#">
                        <div class="relative overflow-hidden">
                            <div class="mb-5 overflow-hidden">
                                <img class="object-cover w-full mx-auto transition-all rounded h-32 hover:scale-110"
                                    src="https://i.postimg.cc/x8LtrkfV/kenny-eliason-HIz-Gn9-FZDFU-unsplash.jpg"
                                    alt="">
                            </div>
                        </div>
                        <a href="#">
                            <h3 class="mb-2 text-sm font-bold "> Nikon Lenses </h3>
                        </a>



                    </div>
                </div>
            </div> --}}
        </div>
    </div>
