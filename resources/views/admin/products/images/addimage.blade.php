@extends('admin._layouts.master')

@section('page_title', 'Add Product Image')
@section('product_select', 'bg-[#F1612D] text-white')
@section('body')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>


    <div class="container p-4">
        @include('admin.message.index')

        <div class="flex gap-4 items-center">
            <a href="{{ route('product.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
            </a>
            <div class="text-xl font-bold">Add Product Images</div>
        </div>
        <div class="p-2 mt-10 rounded-md">

            <form method="post" action="{{ route('productImage', $product->id) }}" class="dropzone" id="myDropzone">
                @csrf
            </form>

        </div>
        <br>

        <div class="flex flex-wrap gap-3 p-4">
            @foreach ($productImages as $key => $img)
                <blockquote class="w-32 h-auto flex-wrap">
                    <img alt="productimage" src="{{ asset('/uploads/' . $img->images) }}"
                        class="aspect-square border w-full hover:text-black rounded-t-xl object-contain" />

                    <form action="{{ route('deleteImage', $img->id) }} " method="POST" id="delete-form-{{ $img->id }}">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="filefrom" value="insidedropzone"/>
                        <button type="button" onclick="deleteSingleImage({{ $img->id }})"
                            class="border bg-red-600 cursor-pointer openModal hover:bg-red-500 text-white text-center w-full">
                            Delete
                        </button>
                    </form>


                </blockquote>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.openModal').on('click', function(e) {
                            $('#interestModal').removeClass('invisible');
                        });
                        $('.closeModal').on('click', function(e) {
                            $('#interestModal').addClass('invisible');
                        });
                    });
                </script>
            @endforeach
        </div>
    </div>

    <script>
        Dropzone.options.myDropzone = {
            // Configuration options go here
            maxFilesize: 500000,
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
        };
    </script>
@endsection
<script>
    function deleteSingleImage(imageId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this image!',
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
