@extends('admin._layouts.master')
@section('page_title', 'Admin - Settings')
@section('settings_select', 'bg-[#4456a6] text-white')
@section('body')
    <div class="px-3 bg-background w-full">
        @include('admin.message.index')
        <div class="flex justify-between">
            <div class="text-2xl font-bold">Settings</div>
            {{-- <a href='{{ route('banner.create') }}'
                        class='bg-[#4456a6] text-white h-10 p-2 text-sm flex items-center font-main rounded-lg'>
                        <span class='material-symbols-outlined text-sm mr-2'>add</span>
                        <span>Add Banner</span>
                    </a> --}}
        </div>
        <div class='product-table bg-white p-3 rounded-lg mt-4 font-main font-light shadow'>
            {{-- <div class="rounded border w-1/2 mx-auto mt-4"> --}}
            <!-- Tabs -->
            <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b">
                <li class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l -mb-px"><a
                        id="default-tab" href="#first">Details</a></li>
                <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#second">Tax / Delivery Charges</a></li>
                {{-- <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#third">Other</a></li> --}}
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-4">

                    <form class="w-full mt-5" method="post"
                        action="{{ route('settingdetails') }}">
                        @csrf
                        @method('post')
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Email
                                </label>
                                <input
                                    class="  border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-none"
                                    id="grid-first-name" type="email" value="{{ $setting->email }}" name="email">

                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Contact Number
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-last-name" type="number" value="{{ $setting->contact_number }}"
                                    name="contact_number">
                            </div>
                            {{-- <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Store Address
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-last-name" type="text"
                                    value="{{$setting->address}}"
                                    name="store_address">
                            </div> --}}
                        </div>
                        {{-- <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Password
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-password" type="password" placeholder="******************">
                                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                            </div>
                        </div> --}}
                        <hr class="pt-3">
                        <p class="block tracking-wide text-gray-800 font-bold mb-5">Social Links</p>

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-city">
                                    Facebook
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-city" type="text" value="{{ $setting->facebook }}" name="facebook">
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-city">
                                    Instagram
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-city" type="text" value="{{ $setting->instagram }}" name="instagram">
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-zip">
                                    TikTok
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-zip" type="text"value="{{ $setting->tiktok }}" name="tiktok">
                            </div>


                        </div>
                        <button type="submit"
                            class="border mt-3 hover:border-[#4456a6] px-10 py-1 rounded-md mr-2 hover:text-[#4456a6] hover:bg-white bg-[#4456a6] text-white text-xl font-bold">
                            Save
                        </button>
                    </form>
                </div>
                <div id="second" class="hidden p-4">
                    <form class="w-full mt-5" method="POST" action="{{ route('deliverycharge') }}">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Inside Valley
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-first-name" type="number" value="{{ $setting->delivery_insidevalley }}"
                                    name="delivery_insidevalley">
                                {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Outside Valley
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-last-name" type="number" value="{{ $setting->delivery_outsidevalley }}"
                                    name="delivery_outsidevalley">
                            </div>

                            <div class="w-full md:w-1/2 px-3 mt-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Tax
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-last-name" type="text" value="{{ $setting->tax }}" name="tax">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mt-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="max-amount">
                                    Max Amount
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="max-amount" type="text" value="{{ $setting->tax }}" name="tax">
                            </div>
                        </div>

                        {{-- <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Estimated Delivery Time (in days)
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text" value="{{ $settings->delivery_time }}"
                                    name="delivery_time">

                            </div>

                        </div> --}}
                        <button type="submit"
                            class="border mt-3 hover:border-[#4456a6] px-10 py-1 rounded-md mr-2 hover:text-[#4456a6] hover:bg-white bg-[#4456a6] text-white text-xl font-bold">
                            Save
                        </button>
                    </form>
                </div>
                {{-- <div id="third" class="hidden p-4">
                    Other Settings
                </div> --}}

            </div>
            {{-- </div> --}}
        </div>

    </div>
    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                    tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l",
                        "-mb-px", "bg-white");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px",
                    "bg-white");
            });
        });
    </script>
@endsection
