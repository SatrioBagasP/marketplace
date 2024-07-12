<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="/css/style.css">

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    {{-- Toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    <title>Login</title>
</head>

<body>

    <div class="container">
        @yield('isi') {{-- Di isi dari nama section masing2 view, disamakan aja biar enak --}}
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- Sweet --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Toastr --}}
    <!-- Memuat jQuery terlebih dahulu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Memuat Toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (session()->has('masuk'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire('Success!', '{{ session('masuk') }}', 'success');
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire('Success!', '{{ session('error') }}', 'error');
            });
        </script>
    @endif
    @if (session()->has('datachange'))
       <script>
           document.addEventListener('DOMContentLoaded', function() {
               Swal.fire('Success!', '{{ session('datachange') }}', 'success');
           });
       </script>
   @endif
    {{-- @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toastr.success('{{ session('success') }}', 'Success');
            });
        </script>
    @endif --}}


</body>

</html>
