@extends('frontend._layout._master')

@section('body')
    <div class="mx-auto max-w-screen-2xl max-sm:mx-8 max-md:px-0 px-16">
        <form action="{{ route('searchblog') }}" method="GET" class="flex justify-between flex-wrap mt-3 ">
            <div class="text-2xl text-[#4456a6]">
                {{ $title }}
            </div>
            <div class="flex gap-2 mt-2">
                <div>
                    <input
                        class="text-xs border border-gray-300 p-3 focus:outline-none rounded focus:border-[#646368] hover:border-[#646368] w-full"
                        name="searchterm" placeholder="search" type="text"
                        value="{{ old('searchterm', $searchterm) }}" />
                </div>
                <button type="submit"
                    class="border  border-[#4456a6] px-4 py-1 rounded-md mr-2 text-[#4456a6] bg-white hover:bg-[#4456a6] hover:text-white">

                    <div>Search</div>
                </button>
            </div>
        </form>
        @if ($searchterm)
            <div class=" inline-flex items-center text-sm font-medium text-gray-600">
                {{ Breadcrumbs::render('single', $searchterm) }}
            </div>
        @endif

        <div class="max-w-screel-2xl  ">
            @if ($message == 'No blogs found')
                <div class="text-center text-[#4456a6] mt-10 underline">

                    {{ $message }}
                </div>
            @else
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($blogs as $key => $blog)
                    <a href="{{ route('showblog', $blog->slug) }}"
                        class="rounded-lg  max-md:mt-8 mt-6 bg-white shadow transition hover:translate-y-2 hover:shadow-lg">
                        @include('frontend.components.blogcomponent', ['allBlog' => $blog])

                    </a>
                @endforeach

                {{-- <a href="{{route("showblog")}}
                        "
                            class="rounded-lg  max-md:mt-8 mt-6  shadow transition hover:translate-y-2 hover:shadow-lg">

                            @include('frontend.components.blogcomponent')
                        </a>
                        <a href="{{route("showblog")}}

                        "
                            class="rounded-lg  max-md:mt-8 mt-6  shadow transition hover:translate-y-2 hover:shadow-lg">

                            @include('frontend.components.blogcomponent')
                        </a>
                        <a href="{{route("showblog")}}

                        "
                            class="rounded-lg  max-md:mt-8 mt-6  shadow transition hover:translate-y-2 hover:shadow-lg">

                            @include('frontend.components.blogcomponent')
                        </a>
                        <a href="{{route("showblog")}}

                        "
                            class="rounded-lg  max-md:mt-8 mt-6  shadow transition hover:translate-y-2 hover:shadow-lg">

                            @include('frontend.components.blogcomponent')
                        </a> --}}

            </div>

            {{-- <div class=" mt-3">
                    {{ $blogs->links('vendor.pagination.tailwind') }}
                </div> --}}
            @endif
        </div>
    </div>
@endsection
