<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('favicon/favicon-32x32.png') }}">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="referrer" content="always">
    {{-- <link rel="canonical" href="{{ $page->getUrl() }}">

        <meta name="description" content="{{ $page->description }}">

        <title>{{ $page->title }}</title> --}}
    <title>Admin</title>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('css/main.js') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <script>
        function checkOnlyOne(checkbox) {
            var checkboxes = document.getElementsByName(checkbox.name);
            checkboxes.forEach(function(currentCheckbox) {
                if (currentCheckbox !== checkbox)
                    currentCheckbox.checked = false;
            });
        }
    </script>

    <script src="{{ asset('tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: '.tinymce',
            maxContentSize: 157286400,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste codesample"
            ],
            toolbar: "fullscreen code preview | undo redo | fontselect styleselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample action section button",
            toolbar: 'fullscreen code preview | undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | numlist bullist | forecolor backcolor removeformat | image media link',
            font_formats: "Segoe UI=Segoe UI;",
            plugins: 'advlist autolink lists link image charmap preview searchreplace visualblocks code codesample fullscreen insertdatetime media table',
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 96px",
            height: 300,
            remove_script_host: false,


            paste_data_images: true,
            file_picker_types: 'file image video media',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');

                // input.setAttribute('accept', 'image/*');
                input.setAttribute('accept', 'image/*,video/*');
                input.onchange = function() {
                    var file = this.files[0];

                    if (file) {

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
                }

                input.click();
            },
            setup: function(editor) {
            editor.on('paste', function(e) {
                var clipboardData = e.clipboardData || window.clipboardData;
                var pastedData = clipboardData.getData('text/plain');

                // Check if the pasted content is a video URL
                if (isVideoURL(pastedData)) {
                    // Handle the video URL as needed
                    console.log('Pasted Video URL:', pastedData);
                }
            });
        }
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
            background-color: #1789c7;
        }
    </style>
</head>

<body>
    <div x-cloak x-data="{ sidebarOpen: true }" class="font-roboto flex min-h-screen">
        <div class="fixed w-full top-0 z-[999] bg-white">
            @include('admin._layouts.header')
        </div>
        @include('admin._layouts.sidebar')
        <main :class="sidebarOpen ? 'ml-64' : 'ml-0'"
            class="flex-1 overflow-x-hidden overflow-y-auto mt-10 mb-2 w-full bg-slate-50">
            <div class=" px-6 w-full max-sm:px-4 py-8  mt-7">
                @yield('body')
            </div>
        </main>
    </div>
    {{-- <div x-data="{ sidebarOpen: false }" class="flex h-screen  font-roboto">
        @include('admin._layouts.test')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('admin._layouts.testhead')
            <main class="flex-1 overflow-x-hidden overflow-y-auto ">

                <div class="container mx-auto px-6 py-4">
                    @yield('body')
                </div>
            </main>
        </div>
    </div> --}}
</body>
<script>
    function deleteSingleImage(imageId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this !',
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

</html>
