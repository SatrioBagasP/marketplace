<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .r {
            background-color: #fb5533;
        }

        .b {
            background-color: #ffffff;
        }

        .icon {

            max-height: 100px;
        }

        .product-img {
            aspect-ratio: 1/1;
            object-fit: contain;

        }

        .hov:hover {
            cursor: pointer;
            transition: all 0.1s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        }

        a {
            text-decoration: none;
        }

        .card:hover {
            transition: all 0.1s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.01);
        }

        .logo-footer {
            aspect-ratio: 1/1;
            max-height: 300px;
        }

        .cart {
            cursor: pointer;
            color: white;
            width: 40px;
        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: #f4f4f4f4;
        }

        .image {
            aspect-ratio: 1/1;
            width: 100%;
        }

        .modal-dialog {
            max-width: 100%;
            margin: 0;
        }

        .modal-content {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: none;
            border: none;
        }

        .modal-content img {
            max-height: 100vh;
            max-width: 100%;
        }

        .harga {
            color: #ee4d2d;
            font-weight: bold;
            font-size: 24px;
        }

        .icon-user {
            width: 90px;
            border-radius: 50%;
        }

        .cart-image {
            aspect-ratio: 1/1;
            width: 100px;
        }

        .text-footer {
            text-decoration: none;
            color: white;
        }

        .konten {
            min-height: 50vh;
        }

        .min-card {
            height: 60px;
            font-size: 18px;
        }
        .harga
        {
            font-size: 14px;
        }
    </style>
    <title>Document</title>
</head>
{{-- <form action="/blog" method="get">
    @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
    @if (request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">
    @endif
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Judul" name="search"
            value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Cari</button>
    </div>
</form> --}}

<body class="bg-body-tertiary">
    <nav class="r">
        <div class="container">
            <div class="row">
                <div class="col-2 d-flex align-items-center">

                </div>
                <div class="col-8 d-flex">

                </div>
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Wellcome, {{Auth::user()->name}}!
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i
                                                    class="bi bi-box-arrow-right"></i>Logout</button>
                                        </form>
                                    </li>
                                    <li><a class="dropdown-item" href="/dashboard">Profile</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="login">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <div class="container p-3">
            <div class="row">
                <div class="col-2 d-flex align-items-center">
                    <div class="logo">
                        <a href="/" class="navbar-brand">Navbar</a>
                    </div>
                </div>
                <div class="col-8 d-flex">
                    <form class="d-flex overflow-hidden w-100" action="/" role="search" method="get">
                        @csrf
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('toko'))
                            <input type="hidden" name="toko" value="{{ request('toko') }}">
                        @endif
                        <div class="input-group">
                            <input class="form-control" name="search" type="search"
                                placeholder="{{ request()->has('toko') ? 'Cari yang ada di toko ini' : 'Cari Product'}}" aria-label="Search">
                            <div class="ms-1">
                                <button class="b btn btn-outline-success t" type="submit">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-end">
                    @auth
                        <a href="" class="position-relative">
                            <svg class="cart" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                            </svg>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-danger">
                                50
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    @endauth

                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('isi')

    <!-- Footer -->
    <footer class="b mt-5 text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Footer text</h5>

                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                        voluptatem veniam, est atque cumque eum delectus sint!
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Footer text</h5>

                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                        voluptatem veniam, est atque cumque eum delectus sint!
                    </p>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="r text-footer text-center p-3">
            © 2020 Copyright:
            <a class="text-footer" href="">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

       {{-- Sweet --}}
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       @if (session()->has('datachange'))
       <script>
           document.addEventListener('DOMContentLoaded', function() {
               Swal.fire('Success!', '{{ session('masuk') }}', 'success');
           });
       </script>
   @endif
   @if (session()->has('masuk'))
   <script>
       document.addEventListener('DOMContentLoaded', function() {
           Swal.fire('Success!', '{{ session('masuk') }}', 'success');
       });
   </script>
@endif

</html>
