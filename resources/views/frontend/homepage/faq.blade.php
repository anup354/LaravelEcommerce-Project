{{-- <div class=" mt-2 mx-auto max-w-screen-2xl">
    <h2 class="text-3xl text-center py-5 font-bold text-[#4456a6] ">
        FAQs
    </h2>
    <ul class=" divide-y max-w-3xl mx-auto shadow shadow-blue-600 rounded-xl">
        @foreach ($faqs as $key => $faq)
            <li>
                <details class="group">
                    <summary
                        class="flex items-center gap-3 px-4 py-3 font-medium marker:content-none hover:cursor-pointer">
                        <svg class="w-5 h-5 text-[#4456a6] transition group-open:rotate-90"
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                            </path>
                        </svg>
                        <span>{{ $faq->title }}</span>
                    </summary>

                    <article class="px-4 pb-4">
                        <p>
                            {!! $faq->description !!}
                        </p>
                    </article>
                </details>
            </li>
        @endforeach
    </ul>
</div> --}}




<div class="space-y-4 py-14 max-lg:px-10 max-sm:px-5">

    <div
        class="flex justify-center items-center font-bold text-4xl max-md:text-2xl max-sm:text-xl text-[#f15a28] md:pb-10">
        Frequently Asked<span class="text-[#4456a6] px-2"> Questions</span> </div>

    @foreach ($faqs as $key => $faq)
        <details class="group border-s-4 border-[#f15a28] bg-gray-50 p-6 [&_summary::-webkit-details-marker]:hidden"
            close>
            <summary class="flex cursor-pointer items-center justify-between gap-1.5">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ $faq->title }}
                </h2>

                <span class="shrink-0 rounded-full bg-white p-1.5 text-gray-900 sm:p-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 shrink-0 transition duration-300 group-open:-rotate-45" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </summary>

            <p class="mt-4 leading-relaxed  text-gray-700">
                {!! $faq->description !!}
            </p>
        </details>
    @endforeach


</div>
