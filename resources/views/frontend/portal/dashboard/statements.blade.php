@extends('frontend.portal._layouts.master')

@section('body')

    <!-- Static sidebar for desktop -->
    <div class=" md:flex md:flex-shrink-0 ">
        {{-- @include('frontend.portal.dashboard.user_sidebar') --}}
        <div class="flex flex-col  flex-1 overflow-hidden">
            <div class="flex  flex-shrink-0 ">

                <div class="flex flex-col  flex-1 overflow-hidden">
                    <div class="flex-1 relative flex-shrink-0 overflow-y-auto focus:outline-none">
                        <div class="py-6">

                            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                                <h1 class="text-2xl font-semibold text-gray-900">Transaction Statements</h1>
                                <div class="text-center text-gray-500 px-2 py-10">Coming soon ...</div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
