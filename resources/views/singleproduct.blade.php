@extends('layout.main')
@section('isi')
    <!-- Content -->
    <div class="konten mt-5">
        <div class="container b p-3">
            <div class="row">
                <div class="col-md-6">
                    <img id="product-image" class="image" src="/img/dummy.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <div class="judul mt-3">
                        <h4>
                            {{ $product->nama_product }}
                        </h4>
                    </div>
                    <div class="harga bg-body-tertiary mt-3 p-3">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </div>
                    <div class=" mt-3">
                        {!! $product->desc !!}
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, totam maxime. Veniam magni explicabo
                        commodi necessitatibus modi ratione nesciunt velit, harum reprehenderit minus doloribus ipsum autem
                        ab quis optio repellendus!
                    </div>
                    <div class="button mt-4 mb-5">
                        <a href="https://api.whatsapp.com/send?phone=62{{ $product->toko->notlpn }}&text=Halo+saya+ingin+bertanya+mengenai+%3A%0D%0A%0D%0A*{{ $product->nama_product }}*%0D%0A*Harga : *%20Rp {{ number_format($product->harga, 0, ',', '.') }}%0D%0A*Link:*%20http://127.0.0.1:8000/singleproduct/999%0D%0ATerima+Kasih"
                            target="_blank"><button type="button" class="btn btn-success">Beli Melalui
                                Whatsapp</button></a>


                        <button type="button" class="btn btn-success">Tambah Ke Keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toko mt-5">
        <div class="container b p-3">
            <div class="row">
                <div class="col-md-1 col-3">
                    <img class="icon-user w-100" src="/img/dummy.JPG" class="img-thumbnail" alt="...">
                </div>
                <div class="col-md-10">
                    <div class="nama-toko">
                        <h5 class="p-0 m-0">
                            {{ $product->toko->nama }}
                        </h5>
                        <br>
                        <a href="/?toko={{ $product->toko->id }}">
                            <button class="btn btn-primary">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z" />
                                </svg>
                                Kunjungi Toko
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
