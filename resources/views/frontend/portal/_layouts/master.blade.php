<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('uploads/favicon.ico') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="referrer" content="always">
    {{-- <link rel="canonical" href="{{ $page->getUrl() }}">

        <meta name="description" content="{{ $page->description }}">

        <title>{{ $page->title }}</title> --}}
    <title>{{ Auth::guard('customer_registrations')->user()->name }}</title>


    {{-- for mobile view search --}}
    {{-- <script>
        $(document).ready(function() {
            const searchInput = $('#mbsearch');
            const resultsList = $('#mbresults');
            searchInput.on('input', function() {
                let searchTerm = $(this).val();

                $.ajax({
                    url: "{{ route('autocomplete') }}",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        term: searchTerm
                    },
                    success: function(data) {
                        resultsList.empty();
                        if (data.length > 0) {
                            data.forEach(function(item) {
                                resultsList.append(`
                        <li class="result-item p-2" data-product-slug="${item.product_slug}">${item.product_name}</li>
                        `);
                            });

                            resultsList.show();
                        } else {

                            resultsList.append(
                                '<li class="result-item p-2">No product found</li>');
                            resultsList.show();
                        }
                    }
                });
                if (searchTerm === '') {
                    resultsList.hide();
                }
            });

            resultsList.on('click', '.result-item', function() {
                const productSlug = $(this).data('product-slug');
                if (productSlug) {
                    window.location.href = `/product/${productSlug}`;
                }
            });

            $(document).on('mousedown', function(event) {

                if (!searchInput.is(event.target) && !resultsList.is(event.target) && resultsList.has(event
                        .target).length === 0) {
                    resultsList.hide();
                }
            });
        });
    </script> --}}
</head>

<body>
    <div>
        <div class="sticky top-0 z-[999]">

            @include('frontend._layout.navbar')
            <div class="bg-[#f15a28]">
                <div class="mx-16">
                    @include('frontend.homepage.navcat')
                </div>
            </div>
        </div>
        <div class="">
            <div class="overflow-y-scroll bg-white">
                @include('frontend.portal._layouts.sidebar')
            </div>
            <main class="flex-1 p-6 ml-60 overflow-x-hidden overflow-y-scroll max-h-screen mb-2">
                @yield('body')
            </main>
        </div>
    </div>

</body>


</html>
