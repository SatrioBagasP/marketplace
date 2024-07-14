@extends('layout.main')
@section('isi')
    <div class="konten mt-5">
        @foreach ($keranjang as $data)
            <div class="container b p-3 mb-3">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <img class="cart-image" src="{{ asset('storage/' . $data->product->image) }}" alt="">
                    </div>
                    <div class="col-9 col-md-10">
                        <div class="judul mt-3">
                            <h4>
                                {{ $data->product->nama_product }}
                            </h4>
                        </div>
                        <div class="button">
                            <a href="/singleproduct/{{ $data->product->id }}"><button type="button"
                                    class="btn btn-success">Lihat Produk</button></a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
