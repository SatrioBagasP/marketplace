@extends('dashboard.layout')
@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Produk</h1>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <form action="/dashboard/edit/{{ $product->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="oldimage" value="{{ $product->image }}">
                <div class="mb-3 ">
                    <label for="nama_product" class="form-label">Nama Product</label>
                    <input value="{{ old('nama_product', $product->nama_product) }}" type="text"
                        class="form-control @error('nama_product')
                    is-invalid
                @enderror"
                        id="nama_product" name="nama_product">
                    @error('nama_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 ">
                    <label for="harga" class="form-label">Harga</label>
                    <input value="{{ old('harga', $product->harga) }}" type="text"
                        class="form-control @error('harga')
                    is-invalid
                @enderror"
                        id="harga" name="harga">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 ">
                    <label for="category_id" class="form-label">Category</label>
                    <select
                        class="form-select disabled @error('category_id')
                    is-invalid
                @enderror"
                        name="category_id" id="category_id" required>
                        <option selected disabled>Open this select menu</option>
                        @foreach ($category as $p)
                            @if (old('category_id', $product->category_id) == $p->id)
                                <option value="{{ $p->id }}" selected>{{ $p->nama }}</option>
                            @else
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar</label>
                    @if ($product->image)
                        Profile Lama
                        <img src="{{ asset('storage/' . $product->image) }}">
                    @endif
                    <img class="img-preview img-fluid" style="display: none;">
                    <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image"
                        name="image" type="file" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 ">
                    <label for="desc" class="form-label">Desc Product</label>
                    <input id="desc" type="hidden" name="desc" value="{{ old('desc', $product->desc) }}">
                    <trix-editor input="desc"></trix-editor>
                    @error('desc')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Product</button>
            </form>
        </div>
    </div>
@endsection
