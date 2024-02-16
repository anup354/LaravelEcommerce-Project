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
            @include('frontend.homepage.bestselller')
            @include('frontend.homepage.newarrival')
            @include('frontend.homepage.blog')
            @include('frontend.homepage.faq')
        </div>


    </div>
@endsection
