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
                        <div class="button d-flex">
                            <a href="/singleproduct/{{ $data->product->id }}"><button type="button"
                                    class="btn btn-success m-1">Lihat Produk</button></a>
                            <form action="/delcart" class="m-1" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->product->id }}">
                                <button type="submit" class="btn btn-danger">Hapus Produk Dari Keranjang</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
