@extends('layout.main')
{{-- {{ dd($product->first()->category->nama) }} --}}
@section('isi')
    <!-- Kategori -->
    @if (!request()->has('toko=*'))
        <div class="kategori mt-5">
            <div class="container b">
                <h5 class="p-2">
                    Kategori
                    @if (request()->has('category'))
                        : {{ $product->first()->category->nama }}
                    @endif
                </h5>
                <div class="row">
                    @foreach ($category as $data)
                        <div class="col-3 hov border p-2">
                            <a href="?category={{ $data->nama }}">
                                <div class="img d-flex justify-content-center">
                                    <img class="icon" src="/img/{{ $data->image }}" alt="">
                                </div>
                                <div class="category w-100 text-center text-black">
                                    {{ $data->nama }}
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    @if (request()->has('toko'))
        <div class="toko mt-5">
            <div class="container b p-3">
                <div class="row">
                    <div class="col-md-1 col-3">
                        <img class="icon-user w-100" src="IMG_3214.JPG" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col-md-10">
                        <div class="nama-toko">
                            <h5 class="p-0 m-0">
                                Avian Store
                            </h5>
                            <br>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam beatae quisquam corporis harum
                                reprehenderit dignissimos rem assumenda perspiciatis aliquid, cupiditate sed magnam iure,
                                quasi necessitatibus, consectetur accusantium! Obcaecati, sit delectus?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Product -->
    <div class="product mt-4">
        <div class="container">
            <div class="row ">
                @foreach ($product as $data)
                    <div class="p-1 col-6 col-sm-4 col-xl-2 d-flex justify-content-center  ">
                        <a href="/singleproduct/{{ $data->id }}">
                            <div class="card">
                                <img class="product-img w-100" src="/img/dummy.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title min-card">{{ Str::limit($data->nama_product, 25) }}</h5>
                                    <p class="card-text">Rp {{ number_format($data->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <center>
                <div class="a">
                    {{ $product->links() }}
                </div>
            </center>

        </div>
    </div>
@endsection
