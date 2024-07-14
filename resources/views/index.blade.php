@extends('layout.main')
{{-- {{ dd($product->first()->category->nama) }} --}}
@section('isi')
    <!-- Kategori -->
    @if ($product->count())
        @if (!request()->has('toko'))
            <div class="kategori mt-5 p">
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
                            <img class="icon-user w-100" src="{{ asset('storage/' . $product->first()->toko->image) }}"
                                class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-md-10">
                            <div class="nama-toko">
                                <h5 class="p-0 m-0">
                                    {{ $product->first()->toko->nama }}
                                </h5>
                                <br>
                                {!! $product->first()->toko->desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Product -->
        <div class="product mt-4 h">
            <div class="container">
                <div class="row ">
                    @foreach ($product as $data)
                        <div class="p-1 col-6 col-sm-4 col-xl-2 d-flex justify-content-center  ">
                            <a href="/singleproduct/{{ $data->id }}">
                                <div class="card">
                                    <img class="product-img w-100" src="{{ asset('storage/' . $data->image) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title min-card">{{ Str::limit($data->nama_product, 25) }}</h5>
                                        <p class="card-text harga">Rp {{ number_format($data->harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {{ $product->links() }}
                </div>


            </div>
        </div>
    @else
        <div class="container h">
            <h1>
                Hasil Tidak ditemukan, mohon coba kata kunci yang lain
            </h1>
        </div>
    @endif
@endsection
