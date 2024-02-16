<div x-clock x-data="{ sidebarOpen = true }">
    <div x-cloak x-show="sidebarOpen" class="hidden lg:block fixed inset-0 z-20 transition-opacity pointer-events-none">
    </div>

    <!-- Overlay for Small Screens -->
    <div x-cloak x-show="sidebarOpen" @click="sidebarOpen = false"
        class="block lg:hidden fixed inset-0 z-10 bg-black opacity-50"></div>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <div x-data="handleSwipe()" x-cloak
        :class="sidebarOpen ? 'translate-x-0 ease-out w-64 lg:w-64' : '-translate-x-full ease-in'"
        @touchstart="touchStart" @touchend="touchEnd"
        class="fixed inset-y-0 left-0 z-30 overflow-y-auto transition duration-300 transform bg-white border"
        style="height: calc(100% - [footer-height]px);">
        <div>
            <nav class="mt-24">
                <a class="{{ request()->segment(2) == 'dashboard' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }} "
                    href="{{ route('admin.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4h6v6h-6z"></path>
                        <path d="M14 4h6v6h-6z"></path>
                        <path d="M4 14h6v6h-6z"></path>
                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    </svg>

                    <span class="mx-3">Dashboard</span>
                </a>

                <a class="{{ request()->segment(2) == 'blogs' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="
                    {{ route('blogs.index') }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-blogger"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8 21h8a5 5 0 0 0 5 -5v-3a3 3 0 0 0 -3 -3h-1v-2a5 5 0 0 0 -5 -5h-4a5 5 0 0 0 -5 5v8a5 5 0 0 0 5 5z" />
                        <path
                            d="M7 7m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h3a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-3a1.5 1.5 0 0 1 -1.5 -1.5z" />
                        <path
                            d="M7 14m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h7a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-7a1.5 1.5 0 0 1 -1.5 -1.5z" />
                    </svg>

                    <span class="mx-3">Blogs</span>
                </a>

                <a class="{{ request()->segment(2) == 'faqs' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="
                    {{ route('faqs.index') }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-hexagon-filled"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M10.425 1.414a3.33 3.33 0 0 1 3.026 -.097l.19 .097l6.775 3.995l.096 .063l.092 .077l.107 .075a3.224 3.224 0 0 1 1.266 2.188l.018 .202l.005 .204v7.284c0 1.106 -.57 2.129 -1.454 2.693l-.17 .1l-6.803 4.302c-.918 .504 -2.019 .535 -3.004 .068l-.196 -.1l-6.695 -4.237a3.225 3.225 0 0 1 -1.671 -2.619l-.007 -.207v-7.285c0 -1.106 .57 -2.128 1.476 -2.705l6.95 -4.098zm1.575 13.586a1 1 0 0 0 -.993 .883l-.007 .117l.007 .127a1 1 0 0 0 1.986 0l.007 -.117l-.007 -.127a1 1 0 0 0 -.993 -.883zm1.368 -6.673a2.98 2.98 0 0 0 -3.631 .728a1 1 0 0 0 1.44 1.383l.171 -.18a.98 .98 0 0 1 1.11 -.15a1 1 0 0 1 -.34 1.886l-.232 .012a1 1 0 0 0 .111 1.994a3 3 0 0 0 1.371 -5.673z"
                            stroke-width="0" fill="currentColor" />
                    </svg>

                    <span class="mx-3">Faq</span>
                </a>

                <a class="{{ request()->segment(2) == 'product' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('product.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                    </svg>
                    <span class="mx-3">Products</span>
                </a>

                <a class="{{ request()->segment(2) == 'salesreport' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('salesreport') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M9 17v-5" />
                        <path d="M12 17v-1" />
                        <path d="M15 17v-3" />
                    </svg>
                    <span class="mx-3">Sales Report</span>
                </a>



                <a href="{{ route('attributegroups.index') }}"
                    class="{{ request()->segment(2) == 'attributegroups' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }} ">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-box-multiple transition duration-75" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                        </path>
                        <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Attribute Groups</span>
                </a>


                <a href="{{ route('attributes.index') }}"
                    class="{{ request()->segment(2) == 'attributes' || request()->segment(2) == 'attribute' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-box-multiple transition duration-75" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                        </path>
                        <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Attribute </span>
                </a>



                <a class="{{ request()->segment(2) == 'category' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('category.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 4h6v6h-6z"></path>
                        <path d="M4 14h6v6h-6z"></path>
                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        <path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    </svg>
                    <span class="mx-3">Category</span>
                </a>

                <a class="{{ request()->segment(2) == 'rating' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="
                    {{ route('rating.index') }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M7.425 9.475L11.15 3.4q.15-.25.375-.363T12 2.925q.25 0 .475.113t.375.362l3.725 6.075q.15.25.15.525t-.125.5q-.125.225-.35.363t-.525.137h-7.45q-.3 0-.525-.138T7.4 10.5q-.125-.225-.125-.5t.15-.525ZM17.5 22q-1.875 0-3.188-1.313T13 17.5q0-1.875 1.313-3.188T17.5 13q1.875 0 3.188 1.313T22 17.5q0 1.875-1.313 3.188T17.5 22ZM3 20.5v-6q0-.425.288-.713T4 13.5h6q.425 0 .713.288T11 14.5v6q0 .425-.288.713T10 21.5H4q-.425 0-.713-.288T3 20.5Zm14.5-.5q1.05 0 1.775-.725T20 17.5q0-1.05-.725-1.775T17.5 15q-1.05 0-1.775.725T15 17.5q0 1.05.725 1.775T17.5 20ZM5 19.5h4v-4H5v4ZM10.05 9h3.9L12 5.85L10.05 9ZM12 9Zm-3 6.5Zm8.5 2Z" />
                    </svg>
                    <span class="mx-3">Rating</span>
                </a>

                <a class="{{ request()->segment(2) == 'brand' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('brand.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-ansible"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9.647 12.294l6.353 3.706l-4 -9l-4 9"></path>
                    </svg>
                    <span class="mx-3">Brand</span>
                </a>

                <a class="{{ request()->segment(2) == 'coupon' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('coupon.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gift" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 8m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                        <path d="M12 8l0 13" />
                        <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                        <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                    </svg>
                    <span class="mx-3">Coupon</span>
                </a>

                {{-- <a class="{{ request()->segment(2) == 'banner' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('banner.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8h.01"></path>
                        <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z">
                        </path>
                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                    </svg>
                    <span class="mx-3">Home Banner</span>
                </a> --}}

                {{-- <a class="{{ request()->segment(2) == 'company' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('company.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                        </path>
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                        <path d="M9 12h6"></path>
                        <path d="M9 16h6"></path>
                    </svg>
                    <span class="mx-3">Pages</span>
                </a> --}}

                {{-- order --}}

                <a class="{{ request()->segment(2) == 'order' ? ' bg-sky-500 text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="{{ route('getorder') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6 13c-2.21 0-4 1.79-4 4s1.79 4 4 4s4-1.79 4-4s-1.79-4-4-4m0 6c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2M6 3C3.79 3 2 4.79 2 7s1.79 4 4 4s4-1.79 4-4s-1.79-4-4-4m6 2h10v2H12V5m0 14v-2h10v2H12m0-8h10v2H12v-2Z" />
                    </svg>
                    <span class="mx-3">Order</span>
                </a>
                {{-- users --}}



                {{-- company dropdown --}}

                <div id="dropdownDefaultButton"
                    class="{{ request()->segment(2) == 'setting' ? ' bg-sky-500 text-white flex items-center px-6 py-1  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-sky-500 hover:text-white flex items-center px-6 py-1  text-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                        width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                        </path>
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                    </svg>
                    <div class="flex justify-between w-full items-center mx-3 cursor-pointer">

                        <span>Setting</span>
                        <div>
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 mx-5  my-2 hidden bg-white border divide-y  divide-gray-100 rounded-lg shadow ">
                    <a href="{{ route('pages.index') }} "
                        class="{{ request()->segment(2) == 'setting' ? ' bg-sky-500 cursor-pointer text-white flex items-center px-2 py-2 flex-1 mt-2 item ' : 'flex-1 cursor-pointer mt-2 item hover:bg-sky-500 hover:text-white flex items-center  py-2 px-2 text-gray-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                            </path>
                            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                            </path>
                            <path d="M9 12h6"></path>
                            <path d="M9 16h6"></path>
                        </svg>
                        <span class="mx-3">Page</span>
                    </a>

                    {{-- <a href=""
                        class="{{ request()->segment(2) == 'abc' ? ' bg-sky-500 text-white flex items-center py-2 flex-1 mt-2  px-2 item ' : ' flex-1 mt-2 item px-2 hover:bg-sky-500 hover:text-white flex items-center  py-2  text-gray-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                stroke-width="0" fill="currentColor"></path>
                        </svg>
                        <span class="mx-3">FavIcon</span>
                    </a> --}}

                    <a href="
                    {{ route('admin.setting') }}
                    "
                        class="{{ request()->segment(2) == 'setting' ? ' bg-sky-500 text-white flex items-center py-2 flex-1 mt-2 px-2 item ' : ' flex-1 mt-2 px-2 item hover:bg-sky-500 hover:text-white flex items-center  py-2  text-gray-600' }}">
                        <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-social"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M19 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M12 14m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                <path d="M12 7l0 4"></path>
                                <path d="M6.7 17.8l2.8 -2"></path>
                                <path d="M17.3 17.8l-2.8 -2"></path>
                            </svg></i>
                        <span class="mx-3">Setting</span>
                    </a>
                </div>


            </nav>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<script>
    function handleSwipe() {
        let startX;

        return {
            touchStart(e) {
                startX = e.touches[0].clientX;
            },
            touchEnd(e) {
                const endX = e.changedTouches[0].clientX;
                const threshold = 50;

                if (startX - endX > threshold) {
                    this.sidebarOpen = false;
                }
            }
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.getElementById("dropdownDefaultButton");
        const dropdownMenu = document.getElementById("dropdown");

        dropdownButton.addEventListener("click", function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle("hidden");
        });

        // Hide the dropdown when clicking outside of it
        document.addEventListener("click", function(event) {
            if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>
