<div class="hidden md:block w-full">
    <nav class=" flex justify-center items-center w-full z-[999]">
        <div
            class="min-[1300px]:w-[1250px] min-[1300px]:px-0 w-full md:px-[2.5rem] px-[1.5rem]  flex items-center gap-[2.5rem] py-[1rem] ">


            <div id="mega-menu" class="items-center flex  justify-center  w-full">
                <ul
                    class="flex justify-between gap-8 flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                    <li>
                        <a class="nav-link transition  {{ request()->is('/') ? 'text-white underline' : 'text-gray-200 hover:text-white border-b border-b-transparent hover:border-b-2 hover:border-white ' }}"
                            href="{{ route('home') }}">HOME</a>
                    </li>
                    {{-- <li>
                   <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                   class="flex items-center justify-between nav-link text-gray-100 transition hover:text-[#ec1464]">
                   CATEGORIES <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                       xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                           stroke-width="2" d="m1 1 4 4 4-4" />
                   </svg>
                      </button>
                  <div id="mega-menu-dropdown" class="absolute z-50 hidden">
                   <div
                       class="p-4 pb-0 text-black md:pb-4 d  w-full ml-28 max-w-4xl shadow-lg  bg-white rounded-lg border">
                       <div class="grid grid-cols-3 w-full gap-5 py-5">
                           @foreach (getCategory() as $category)
                               <a href=""
                                   class="flex gap-2 hover:bg-gray-100 cursor-pointer p-3 rounded-md">
                                   <div class=""><img
                                           src="{{ asset('images/category/' . $category->image) }}"
                                           class="w-24 " alt=""></div>
                                   <div class="">
                                       <div class="text-lg text-[#ec1464]">{{ $category->category_name }}</div>
                                       <div class="text-sm text-gray-600 ">{{ $category->description }}</div>
                                   </div>
                               </a>
                           @endforeach
                       </div>
                   </div>

                 </div>
                  </li> --}}
                    <li class="relative group">
                        <a href="
                        {{-- {{ route('about-us') }} --}}
                        "
                            class="nav-link flex items-center justify-between text-gray-200 transition hover:text-white border-b-2 border-b-transparent hover:border-b-2 hover:border-white  "
                            href="">ABOUT US

                        </a>

                    </li>

                    <li class="relative group">
                        <a class="nav-link flex items-center justify-between text-gray-100 transition hover:text-white border-b-2 border-b-transparent hover:border-b-2 hover:border-white "
                            href="">CATEGORIES
                            <svg class="w-2.5 h-2.5 ms-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </a>
                        <div
                            class="hidden group-hover:block absolute top-6 left-1/2 transform -translate-x-1/2 bg-transparent rounded-md shadow-md">
                            <div class="bg-white mt-4 rounded-md shadow-md p-4">
                                <div class="grid grid-cols-3 gap-6 w-[520px] ">
                                    @foreach (getCategories(0) as $category)
                                        <a href="
                                        {{ route('getbycategory', ['category' => $category->slug . '?0da2qwz=' . $category->category_id])  }}
                                        "
                                            class="text-center cursor-pointer">
                                            <div class="flex flex-col items-center">
                                                <img src="{{ asset('uploads/' . $category->image) }}"
                                                    alt="Category Image" class="w-24 h-16 object-contain ">
                                                <p class="text-gray-800 text-xs mt-2">{{ $category->categoryname }}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="relative group">
                        <a href="
                        {{ route('allblogs') }}
                        "
                            class="nav-link items-center    {{ request()->is('blogs') ? 'text-white underline' : 'text-gray-100 transition hover:text-white border-b-2 border-b-transparent hover:border-b-2 hover:border-white' }}"
                            href="">BLOGS

                        </a>

                    </li>
                    <li>
                        <a class="nav-link  {{ request()->is('contact') ? 'text-white underline' : 'text-gray-100 transition hover:text-white border-b-2 border-b-transparent hover:border-b-2 hover:border-white ' }}"
                            href="
                            {{ route('contactus') }}
                            ">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

