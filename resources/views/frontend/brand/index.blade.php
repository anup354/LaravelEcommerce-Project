@extends('frontend._layout._master')

@section('body')
    <style>
        .vertical-text {
            transform: rotate(90deg);
        }
    </style>

    <div class="mx-auto max-w-screen-2xl max-md:px-0 px-16 py-4">
        <div class="max-md:mx-7 mx-10">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="flex justify-between flex-wrap items-center  py-2">
                            <div class="flex gap-2">
                                <div class="font-medium text-xl lg:text-2xl text-[#4456a6]  ">
                                    {{ $title }}
                                </div>
                            </div>

                        </div>
                        <div class="flex py-4">
                            <div class="w-[10%] border border-[#4456a6]"></div>
                            <div class="w-[90%] border"></div>
                        </div>
                    </div>

                    <div class="grid  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

                        @foreach ($brands as $key => $brand)
                            <a href="{{ route('getbybrand', $brand->slug) }} ">
                                @include('frontend.components.brandcomponent', ['brand' => $brand])
                            </a>
                        @endforeach

                    </div>
                    <div class=" mt-3">
                        {{ $brands->appends($params)->links('vendor.pagination.daleybhai-tailwind') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
