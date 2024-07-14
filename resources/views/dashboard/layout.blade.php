{{-- @extends('layout.main')
@section('isi')
    Test
@endsection --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard </title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- SweetAllert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }

        .profile {
            width: 300px;
        }

        .desc {
            width: 400px;
        }
    </style>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">ITATS STORE</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link px-3 bg-dark border-0">Logout <span
                            data-feather="log-out"></span></button>
                </form>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }} " aria-current="page"
                                href="/dashboard">
                                <span data-feather="home"></span>
                                My Dashboard
                            </a>
                        </li>
                        @can('shop')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard/profile*') ? 'active' : '' }}"
                                    href="/dashboard/profile">
                                    <span data-feather="file-text"></span>
                                    My Shop Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard/product*') ? 'active' : '' }}"
                                    href="/dashboard/product">
                                    <span data-feather="file-text"></span>
                                    My Product
                                </a>
                            </li>
                        @endcan
                        @can('user')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard/register*') ? 'active' : '' }}"
                                    href="/dashboard/register">
                                    <span data-feather="file-text"></span>
                                    Become Shop Member
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                @yield('isi')

            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- ICON --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    {{-- SweetAlerts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('masuk'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire('Success!', '{{ session('masuk') }}', 'success');
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
    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire('Something Wrong!', '{{ session('error') }}', 'error');
            });
        </script>
    @endif
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>

    <script src="/js/dashboard.js"></script>
</body>

</html>
