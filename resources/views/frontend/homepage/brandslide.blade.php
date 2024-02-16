<!-- For Owl Carousel -->
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            items: 5,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            dots: true,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    });
</script>

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


    </div>

    <div class="owl-carousel owl-theme ">
        @foreach ($brands as $key => $brand)
            <a href="{{ route('getbybrand', $brand->slug) }}">
                <div class="ml-2">
                    <div class="p-4 text-center bg-white rounded  ">
                        <div class="block " href="#">
                            <div class="relative overflow-hidden">
                                <div class=" overflow-hidden">
                                    <img class="object-cover  mx-auto transition-all rounded h-32 bo hover:scale-110"
                                        src="{{ asset('uploads/' . $brand->image) }}" alt="">
                                </div>
                            </div>

                            <h3 class="mb-2 text-sm font-bold "> {{ $brand->brandname }} </h3>

                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        @foreach ($brands as $key => $brand)
        <a href="{{ route('getbybrand', $brand->slug) }}">

            <div class="ml-2">
                <div class="p-4 text-center bg-white rounded  ">
                    <div class="block " href="#">
                        <div class="relative overflow-hidden">
                            <div class=" overflow-hidden">
                                <img class="object-cover  mx-auto transition-all rounded h-32 bo hover:scale-110"
                                    src="{{ asset('uploads/' . $brand->image) }}" alt="">
                            </div>
                        </div>

                        <h3 class="mb-2 text-sm font-bold "> {{ $brand->brandname }} </h3>

                    </div>
                </div>
            </div>
        </a>
        @endforeach


    </div>



</div>
