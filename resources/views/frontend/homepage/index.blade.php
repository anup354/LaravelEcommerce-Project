@extends('frontend._layout._master')

@section('body')
    <div>
        @include('admin.message.index')

        @include('frontend.homepage.slider')
        <div class="max-md:mx-4 mx-10 max-md:px-0 px-16">
            {{-- @include('frontend.homepage.brand') --}}
            @include('frontend.homepage.brandslide')
            @include('frontend.homepage.popularcategory')
            @include('frontend.homepage.trendingproduct')
        </div>
        @include('frontend.homepage.parallax')
        <div class="max-md:mx-4 my-4 mx-10 max-md:px-0 px-16">
            @include('frontend.homepage.bestselller')
            @include('frontend.homepage.newarrival')
        </div>
        @include('frontend.homepage.banner')
        <div class="max-md:mx-4 my-4 mx-10 max-md:px-0 px-16">
            @include('frontend.homepage.blog')
            @include('frontend.homepage.faq')
        </div>
        <div class="-mb-14 ">

            @include('frontend.homepage.secondparallax')
        </div>


    </div>
@endsection
