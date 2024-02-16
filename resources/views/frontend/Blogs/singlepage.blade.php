@extends('frontend._layout._master')

@section('body')
@include('admin.message.index')
    <main class="pb-16  lg:pb-24 bg-white max-md:px-0 px-16">
        <div class="flex justify-between px-4 mx-auto max-w-screen-2xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue ">
                <div class="flex font-medium text-gray-600">
                    <div>
                        {{ Breadcrumbs::render('single', $blog->slug) }}
                    </div>
                    {{-- <div>

                        {{ $currentUserLocation }}

                    </div> --}}
                </div>

                <header class="mb-4 lg:mb-6 not-format">
                    {{-- <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 ">Jese Leos</a>
                            <p class="text-base font-light text-gray-500 ">Graphic Designer, educator & CEO Flowbite</p>
                            <p class="text-base font-light text-gray-500 "><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                    </div>
                </address> --}}
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">
                        {{ $blog->title }}</h1>
                </header>

                <p class="lead text-gray-600 font-semibold pb-3 "> PUBLISHED : {{ $blog->created_at->format('jS M Y') }}
                </p>
                {{-- <div class="flex gap-5 w-full my-2">
                    <div class="flex gap-2 items-center w-full ">

                        <div id="likedblogcount" class="bottom-5 left-3.5 text-gray-600 font-semibold text-xl  px-1">
                            {{ $blog->likes }}
                        </div>
                        <div likeblogid="{{ $blog->id }}" class="border likeblog p-2 rounded hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 512 512">
                                <path
                                    d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                            </svg>
                        </div>
                    </div>

                    @if ($blog->views)
                        <div class="flex gap-1 items-center">
                            {{ $blog->views }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div> --}}

                <figure>
                    <img src="{{ asset('/uploads/' . $blog->featured_image) }}" alt="featured_image">
                    {{-- <figcaption>Digital art by Anonymous</figcaption> --}}
                </figure>
                <style>
                    .mylist img {
                        display: flex;
                        flex-direction: row;

                    }
                </style>

                <section class="mylist ">
                    {!! $blog->description !!}
                </section>
                {{-- <div class="flex justify-between items-center my-6">
                    <h2 class="text-lg lg:text-2xl font-bold ">Comments
                </div>
                <form class="mb-6">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">

                        <textarea id="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0  focus:outline-none"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-[#4456a6] rounded-lg  hover:bg-[#1e3d4e]">
                        Post comment
                    </button>
                </form> --}}

                {{-- comments --}}
                {{-- <div x-data="{ open: false }" class="mt-20  pb-32 ">
                    <h4 @click="open = !open" class="cursor-pointer text-lg font-semibold text-gray-700 flex items-center">
                        Show Comments
                        <svg x-show="!open" class="ml-2 w-5 h-5 transform transition-transform duration-300"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg x-show="open" class="ml-2 w-5 h-5 transform rotate-180 transition-transform duration-300"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </h4>

                    <div x-show="open"
                        class="mt-4 transition duration-300 ease-in-out max-h-[450px] overflow-y-scroll  border"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100">

                        @include('frontend.blogs.Comments.commentsDisplay', [
                            'comments' => $blog->comments,
                            'post_id' => $blog->id,
                        ])
                    </div>

                    <h4 class="text-lg font-semibold text-gray-700 mt-6">Add comment</h4>
                    <form method="post" action="{{ route('comments.store') }}" class="mt-2">
                        @csrf
                        <div class="form-group mb-4">
                            <textarea
                                class="form-control w-full p-3 border rounded-md focus:border-sky-400 focus:ring-1 focus:ring-sky-200 transition duration-200"
                                name="body" placeholder="Write your comment..."></textarea>
                            <input type="hidden" name="post_id" value="{{ $blog->id }}" />
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="btn bg-sky-500 hover:bg-sky-600 text-white p-2 px-4 rounded-md transition duration-200">Comment</button>
                        </div>
                    </form>
                </div> --}}
            </article>

        </div>
        <div class="px-4 ">

            <h2 class="mb-8 text-2xl font-bold text--900 ">Related Blogs</h2>

            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">
                @foreach ($allblogs as $key => $blog)
                    <a href="{{ route('showblog', $blog->slug) }}"
                        class="rounded-lg p-1 max-md:mt-8 mt-6  shadow transition hover:translate-y-2 hover:shadow-lg">
                        @include('frontend.components.blogcomponent', ['allBlog' => $blog])
                    </a>
                @endforeach

            </div>
        </div>
    </main>
@endsection
