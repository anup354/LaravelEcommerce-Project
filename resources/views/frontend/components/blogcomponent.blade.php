<!-- Blog item 1 -->
<div class=" overflow-hidden bg-white  ">
    <img src="{{ asset('/uploads/' . $allBlog->featured_image) }}" class="aspect-video w-full object-cover"
        alt="blog_image" />
    <div class="p-3.5">
        <div class="flex flex-wrap justify-between">
            <p class="mb-1 text-sm font-semibold text-gray-600">Published :
                <time>{{ $blog->created_at->format('jS M Y') }}
                </time></p>
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
        </div>
        <h3 class="text-xl font-medium text-[#f15a28]">{{ $allBlog->title }}</h3>
        <p class="mt-1  text-gray-500  "> {!! Str::limit(strip_tags($allBlog->description), 70) !!}</p>

    </div>
</div>
