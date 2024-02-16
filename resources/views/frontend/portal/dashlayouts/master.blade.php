<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="icon" href="{{ asset('uploads/favicon.ico') }}" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <meta name="referrer" content="always">
    <script src="{{ asset('js/main.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('css/main.js') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: '.tinymce',
            branding: false,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen", "insertdatetime media table paste codesample",
                "mytoc"
            ],
            toolbar: "fullscreen code preview | tableofcontents | undo redo | bold italic underline strikethrough | fontselect styleselect fontsizeselect  forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link image  | mytoc",
            font_formats: "Segoe UI=Segoe UI;",
            plugins: 'advlist autolink lists link image charmap preview searchreplace visualblocks code codesample fullscreen insertdatetime media table mytoc',
            // external_plugins: {
            //     'mytoc': '{{ asset('tinymce/plugins/mytoc/plugin.min.js') }}'
            // },
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 96px",
            remove_script_host: false,
            paste_data_images: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    // if (file) {
                    //     var maxSize = 2 * 1024 * 1024;
                    //     if (file.size > maxSize) {
                    //         alert('Selected image is too large. Please choose an image smaller than 2MB.');
                    //         return;
                    //     }
                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };
                // }

                input.click();
            },

        });
    </script>


    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            var old = document.getElementsByClassName('oldimage')[0];
            old.classList.add("hidden");
        };
    </script>


    <script>
        function deleteSingleImage(imageId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this Property!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + imageId).submit();
                }
            });
        }
    </script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#fff',
                    }
                },
                screens: {
                    'xs': '320px',
                    'sm': '640px',
                    'md': '768px',
                    'lg': '1024px',
                    'xl': '1280px',
                    '2xl': '1536px',
                    '1299px': '1299px',
                },
            };
        };
    </script>

</head>

{{-- <body>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen  font-roboto">

        @include('frontend.portal.dashlayouts.sidebar')
        <div class="flex-1 flex  flex-col overflow-hidden">
            @include('frontend.portal.dashlayouts.header')
            <main class="flex-1 overflow-x-hidden overflow-y-auto ">
                <div class="container mx-auto px-6 py-8">
                    @yield('body')
                </div>
            </main>
        </div>
    </div>
</body> --}}

<body>

    {{-- <div class="">
        <div class="sticky top-0 z-[88]">
            @include('frontend._layout.navbar')

            @include('frontend._layout._linknav')





        </div>
        <div class="z-10">

            @include('frontend.portal.dashlayouts.sidebar')
        </div>
        <div class="">
            <div class="main-body max-sm:mx-5 mx-20 my-10 ">
                @yield('body')
            </div>
        </div>
        <div class="mt-14 border z-[88]">
            @include('frontend._layout._footer')
        </div>
    </div> --}}

    <div class="body-content" x-data="{ open: true }">

        @include('frontend.portal.dashlayouts.header')
        @include('frontend.portal.dashlayouts.sidebar')


        {{-- <main :class="sidebarOpen ? 'ml-0 sm:ml-64' : ''" class="flex-1 overflow-x-hidden overflow-y-auto mt-10 mb-2"> --}}
            <div x-bind:class="! open ? 'ml-0' : 'ml-[280px]'">
                @yield('body')
            </div>
        {{-- </main> --}}
    </div>
</body>

</html>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
