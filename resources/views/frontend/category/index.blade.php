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
                        @foreach ($allcategories as $key => $category)
                            <a href="{{ route('getbycategory', ['category' => $category->slug . '?0da2qwz=' . $category->category_id]) }}"
                                class="shadow-lg px-5 py-1 rounded-lg bg-white flex flex-col items-center  hover:scale-90 shadowy transition duration-100 cursor-pointer">
                                @include('frontend.components.categorycomponent', [
                                    'category' => $category,
                                ])
                            </a>
                        @endforeach
                    </div>
                    <div class=" mt-3">
                        {{ $allcategories->appends($params)->links('vendor.pagination.daleybhai-tailwind') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
