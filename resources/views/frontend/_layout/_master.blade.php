<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('favicon/favicon-32x32.png') }}">


    @php
        $segment = request()->segment(1);
        if (Request::segment(1)) {
            $meta = getMetas(Request::segment(1), Request::segment(2));
        } else {
            $meta = (object) [
                'title' => 'Home',
                'description' => 'Homepage of Zupish',
                'featured_image' => 'portrait-handsome.jpg',
            ];
        }
    @endphp
    @if ($meta)
        {{-- og --}}
        <meta name="og:title" content="{{ $meta->title }}" />
        <meta name="og:description" content="{{ Str::limit(strip_tags($meta->description, 50)) }}" />
        <meta property="og:image"
            content="{{ 'https://Zupish.com/demo/public/uploads/' . $meta->featured_image }}" />

        <meta name="title" content="{{ $meta->title }}" />
        <meta name="description" content="{{ Str::limit(strip_tags($meta->description, 50)) }}" />

        <meta property="twitter:url" content="{{ 'https://Zupish.com/demo/public/' }}" />
        <meta property="twitter:title" content="{{ $meta->title }}" />
        <meta property="twitter:description" content="{{ Str::limit(strip_tags($meta->description, 50)) }}" />
        <meta property="twitter:image"
            content="{{ 'https://Zupish.com/demo/public/public/uploads/' . $meta->featured_image }}">

        <title>
            {{ $meta->title . ' | Zupish' }}
        </title>
    @endif







    {{-- toastr --}}

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" /> --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <style>
        /* Custom scrollbar styles */

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #e67c35;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #e67c35;
        }

        ::-webkit-scrollbar-track {
            background-color: #fff;
        }
    </style>

    {{-- autocomplete --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const searchInput = $('#search');
            const resultsList = $('#results');
            searchInput.on('input', function() {
                let searchTerm = $(this).val();

                $.ajax({
                    url: "{{ route('autocomplete') }}",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        term: searchTerm
                    }, // Use 'term' as the parameter name
                    success: function(data) {
                        resultsList.empty();
                        if (data.length > 0) {
                            data.forEach(function(item) {
                                resultsList.append(`
                            <li class="result-item p-2" data-product-slug="${item.product_slug}">${item.product_name}</li>
                            `);
                            });
                            // Show the results
                            resultsList.show();
                        } else {
                            // Display a "No product found" message
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
            // Handle item selection (redirect to the product page)
            resultsList.on('click', '.result-item', function() {
                const productSlug = $(this).data('product-slug');
                if (productSlug) {
                    window.location.href = `{{ url('/product') }}/` +
                        productSlug; // Update the URL structure
                }
            });
            // Use mousedown event on document to detect clicks outside the input and the dropdown
            $(document).on('mousedown', function(event) {
                // Check if the click target is not the search input or the results list
                if (!searchInput.is(event.target) && !resultsList.is(event.target) && resultsList.has(event
                        .target).length === 0) {
                    resultsList.hide();
                }
            });
        });
    </script>

    <style>
        #mbresults {
            display: none;
            position: absolute;
            height: auto;
            max-height: 150px;
            width: 100%;
            overflow-y: auto;
            z-index: 999;

        }

        #results {
            display: none;
            position: absolute;
            height: auto;
            max-height: 150px;
            width: 100%;
            overflow-y: auto;
            z-index: 999;

        }

        .result-item {
            padding: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .result-item:hover {
            background-color: #F2F2F2;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #55ac23 !important;
        }

        .colored-toast.swal2-icon-error {

            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
        })
        // const Toast = Swal.mixin({
        //     toast: true,
        //     position: "top-end",
        //     showConfirmButton: false,
        //     timer: 3000,
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //         toast.onmouseenter = Swal.stopTimer;
        //         toast.onmouseleave = Swal.resumeTimer;
        //     }
        // });
    </script>

    <link rel="stylesheet" href="{{ asset('uikit/uikit.min.css') }}" />
    {{-- <link rel="shortcut icon" href="{{ asset('uikit/uikit.min.css') }}"> --}}


</head>

<body>

    <div class="bg-[#ebecf0]/20">
        <div>
            <!-- Messenger Chat plugin Code -->
            <div id="fb-root"></div>

            <!-- Your Chat plugin code -->
            <div id="fb-customer-chat" class="fb-customerchat">
            </div>


            <script>
                var chatbox = document.getElementById('fb-customer-chat');
                chatbox.setAttribute("page_id", "174755272381524");
                chatbox.setAttribute("attribution", "biz_inbox");
            </script>

            <!-- Your SDK code -->
            <script>
                window.fbAsyncInit = function() {
                    FB.init({
                        xfbml: true,
                        version: 'v18.0'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
        </div>

        <div class="sticky top-0 z-[88]  bg-white">
            @include('frontend._layout.navbar')
            <div class="bg-[#f15a28]">

                <div class="mx-16 ">
                    @include('frontend._layout.menunav')
                </div>
            </div>




        </div>
        <div class="mx-auto max-w-screen-2xl max-md:px-3 ">
            <div class="main-body">
                @yield('body')
            </div>
        </div>
        <div class="mt-14 border bg-white">
            @include('frontend._layout._footer')
        </div>
        @include('frontend._layout.mobilenav')
    </div>

</body>
{{-- scripts --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
<style>
    .colored-toast.swal2-icon-success {
        background-color: #55ac23 !important;
    }

    .colored-toast.swal2-icon-error {

        background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
        color: white;
    }

    .colored-toast .swal2-close {
        color: white;
    }

    .colored-toast .swal2-html-container {
        color: white;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
    })
</script>

<script>
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-bottom-right",
    };
    // for add cart from singlepage
    $('.add-to-cart').on('submit', function(e) {
        e.preventDefault();
        const formData = $(this).serialize();
        const url = "{{ route('cart.store') }}";
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            success: function(data) {
                console.log("Success");
                Toast.fire({
                    icon: "success",
                    title: "Product added to cart"
                })
                // toastr.success("Product added to cart");
                $('#cartCount').html(data);
            },
            error: function(xhr, status, error) {
                console.log("Error", error);
                Toast.fire({
                    icon: "error",
                    title: "An error occurred while adding the product to the cart."
                })
                // toastr.error("An error occurred while adding the product to the cart.");
            }
        });
    });





    // for add cart
    $('.alert-button').click(function(e) {
        e.preventDefault();


        var productId = $(this).attr('productId');
        $.ajax({
            type: 'GET',
            url: "{{ url('/addCart') }}/" + productId,
            success: function(data) {
                Toast.fire({
                    icon: "success",
                    title: "Product added to cart"
                })
                // toastr.success("Product added to cart");

                $('#cartCount').html(data)
            }
        });
    });


    //add quantity
    $(document).on('click', '.add-quantity', function(e) {
        e.preventDefault();
        var productIds = $(this).attr('value');
        $.ajax({
            type: 'GET',
            url: "{{ url('/countAdd') }}/" + productIds,
            success: function(data) {
                $('#cartDatas').html(data)
            }
        });
    });

    //sub quantity
    $(document).on('click', '.sub-quantity', function(e) {
        e.preventDefault();
        var productIds = $(this).attr('values');
        $.ajax({
            type: 'GET',
            url: "{{ url('/subCount') }}/" + productIds,
            success: function(data) {
                $('#cartDatas').html(data)
            }
        });
    });

    // clear cart
    $(document).on('click', '.clearall', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: "{{ url('/clearallcart') }}",
            success: function(data) {
                $('#cartDatas').html(data)
                $('#cartCount').html($('#data').val())
                Toast.fire({
                    icon: "success",
                    title: "Cart Clear"
                })
                // toastr.success("Cart Clear");

            }
        });
    });
    // clear single
    $(document).on('click', '.clearSingle', function(e) {
        console.log("clear")
        e.preventDefault();
        var productIds = $(this).attr('singleId');
        $.ajax({
            type: 'GET',
            url: "{{ url('/clearcart') }}/" + productIds,
            success: function(data) {
                $('#cartDatas').html(data)
                $('#cartCount').html($('#data').val())
                Toast.fire({
                    icon: "success",
                    title: "Product removed from cart"
                })
                // toastr.success("Product removed from cart");
            }
        });
    });

    // for add wishlist
    $('.product-wishlist').click(function(e) {
        e.preventDefault();
        var productId = $(this).attr('wishlistproductId');
        var svgIcon = $(this).find('.wishlist-icon');
        console.log("pro", productId)
        $.ajax({
            type: 'GET',
            url: "{{ url('/addwishlist') }}/" + productId,
            success: function(response) {
                console.log(response)
                if (response.requiresAuth) {
                    Toast.fire({
                        icon: "error",
                        title: response.message
                    })
                    // toastr.error(response.message);

                    // location.href = "{{ route('login') }}";
                } else if (response.cartsaved) {
                    Toast.fire({
                        icon: "success",
                        title: response.message
                    })
                    // toastr.success(response.message);
                } else {
                    Toast.fire({
                        icon: "success",
                        title: "Product added to wishlist"
                    })
                    // toastr.success("Product added to wishlist");
                    // svgIcon.html(
                    //     '<svg xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 512 512">' +
                    //     '<path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" style="fill: #4456a6;" />' +
                    //     '</svg>'
                    // );

                    $('#wishlists').html(response)
                }
            }
        });
    });
    // for remove wishlist
    $('.remove-product-wishlist').click(function(e) {
        e.preventDefault();
        var productId = $(this).attr('removewishlistproductId');
        // var svgIcon = $(this).find('.wishlist-icon');
        console.log("pro", productId)
        $.ajax({
            type: 'GET',
            url: "{{ url('/removewishlist') }}/" + productId,
            success: function(response) {
                console.log(response)
                Toast.fire({
                    icon: "success",
                    title: "Product reomve from wishlist"
                })
                // toastr.success("Product reomve from wishlist");
                // svgIcon.html(
                //     '<svg xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 512 512">' +
                //     '<path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" style="fill: #4456a6;" />' +
                //     '</svg>'
                // );

                $('#wishlists').html(response)
            }
        });
    });

    // for add likes blogs
    $('.likeblog').click(function(e) {
        e.preventDefault();
        var blogId = $(this).attr('likeblogid');

        console.log("pro", blogId)
        $.ajax({
            type: 'GET',
            url: "{{ url('/likeblog') }}/" + blogId,
            success: function(response) {
                if (response.success) {
                    Toast.fire({
                        icon: "success",
                        title: response.message
                    })
                    // toastr.success(response.message);
                    var $likes = document.getElementById('likedblogcount');
                    if (!$likes.innerText) {
                        $likes.innerText = 1;
                    } else {
                        $likes.innerText = parseInt($likes.innerText) + 1;
                    }
                }
            }
        });
    });
</script>

</html>
