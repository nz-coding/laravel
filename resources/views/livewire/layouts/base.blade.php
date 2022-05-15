<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NzCoding - Laravel</title>

    {{-- Bootstrap Css --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{-- summernote styles --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

    {{-- summernote themes --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/codemirror/theme/monokai.css') }}">

    @livewireStyles
</head>
<style>
    body{
        font-size: 14px;
    }
</style>
<body>
    
    {{ $slot }}


    {{-- Bootstrap Scripts --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Summernote --}}
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Summernote Themes -->
    <script src="{{ asset('assets/admin/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>


    {{-- Toastr Script for Livewire --}}
    <script>
        $(document).ready(function(){
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right"
            }
        });

        window.addEventListener('success', event => {
            toastr.success(event.detail.message);
        });

        window.addEventListener('warning', event => {
            toastr.warning(event.detail.message);
        });

        window.addEventListener('error', event => {
            toastr.error(event.detail.message);
        });
    </script>


    {{-- Sweet Alert Delete Script --}}
    <script>
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteConfirmed')
                    }
            })
        });

        window.addEventListener('studentDeleted', event => {
            Swal.fire(
                'Deleted!',
                'The student has been deleted.',
                'success'
            )
        });
    </script>

    {{-- Connect component files js --}}
    @stack('scripts')

    @livewireScripts
</body>
</html>