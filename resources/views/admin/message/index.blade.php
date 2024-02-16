{{-- @if (Session::has('message'))
<div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert" style="height: 50px;">
    <p>{{ Session::get('message') }}</p>
    <button type="button" class="absolute top-0 right-0 mt-1 mr-2" data-dismiss="alert" aria-label="Close">
        <span class="text-blue-700">&times;</span>
    </button>
</div>
@endif
@if (Session::has('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" style="height: 50px;">
    <p>{{ Session::get('success') }}</p>
    <button type="button" class="absolute top-0 right-0 mt-1 mr-2" data-dismiss="alert" aria-label="Close">
        <span class="text-green-700">&times;</span>
    </button>
</div>
@endif
@if (Session::has('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" style="height: 50px;">
    <p>{{ Session::get('error') }}</p>
    <button type="button" class="absolute top-0 right-0 mt-1 mr-2" data-dismiss="alert" aria-label="Close">
        <span class="text-red-700">&times;</span>
    </button>
</div>
@endif --}}
<style>
    .animation-container {
        position: relative;
        animation: slideInFromRight 3s ease-in-out forwards;
    }

    @keyframes slideInFromRight {
        0% {
            opacity: 0;
            transform: translateX(100%);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>
@if (Session::has('success'))
    <div class="alert alert-danger mb-4 ">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert"
            style="height: 50px;">
            <p>{{ Session::get('success') }}</p>
            <button type="button" class="absolute top-0 right-0 mt-1 mr-2 close-button" data-dismiss="alert"
                aria-label="Close">
                <span class="text-green-700">&times;</span>
            </button>
        </div>
    </div>
@endif


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
@if (Session::has('poperror'))
    <script>
       
        Toast.fire({
            icon: "error",
            title: "{{ Session::get('poperror') }}"
        })
    </script>
@endif
@if (Session::has('popsuccess'))
    <script>
        Toast.fire({
            icon: "success",
            title: "{{ Session::get('popsuccess') }}"
        })
    </script>
@endif
@if (Session::has('message'))
    <div class="alert alert-danger mb-4">
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert"
            style="height: 50px;">
            <p>{{ Session::get('message') }}</p>
            <button type="button" class="absolute top-0 right-0 mt-1 mr-2 close-button" data-dismiss="alert"
                aria-label="Close">
                <span class="text-blue-700">&times;</span>
            </button>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger mb-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"
            style="height: 50px;">
            <p>{{ Session::get('error') }}</p>
            <button type="button" class="absolute top-0 right-0 mt-1 mr-2 close-button" data-dismiss="alert"
                aria-label="Close">
                <span class="text-red-700">&times;</span>
            </button>
        </div>
    </div>
@endif

@if (Session::has('loginpopup'))
    <div class="animation-container z-[999] ">
        <div
            class="flex  alert alert-danger bg-green-300 items-start justify-between max-w-sm p-3 space-x-4 rounded-md absolute top-0 right-0 mt-2 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                    d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                    stroke-width="0" fill="currentColor"></path>
            </svg>
            <div class="flex flex-col flex-1 px-2 space-y-1">
                {{-- <span class="text-sm font-semibold">Delectus?</span> --}}
                <p>{{ Session::get('loginpopup') }}</p>
            </div>
            <button type="button" title="Close snackbar" data-dismiss="alert" aria-label="Close" class="close-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                    class="flex-shrink-0 w-4 h-4 my-1">
                    <polygon
                        points="427.314 107.313 404.686 84.687 256 233.373 107.314 84.687 84.686 107.313 233.373 256 84.686 404.687 107.314 427.313 256 278.627 404.686 427.313 427.314 404.687 278.627 256 427.314 107.313">
                    </polygon>
                </svg>
            </button>
        </div>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var closeButton = document.querySelector('.close-button');
        var alertBox = document.querySelector('.alert');

        if (closeButton) {
            closeButton.addEventListener('click', function() {
                hideAlert();
            });
        }

        // setTimeout(function() {
        //     hideAlert();
        // }, 2000);

        function hideAlert() {
            alertBox.remove();
        }
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var closeButton = document.querySelector('.close-button');

        if (closeButton) {
            closeButton.addEventListener('click', function() {
                var alertBox = this.closest('.alert');
                alertBox.remove(); // Remove the alert box from the DOM
            });
        }
    });
</script> --}}
