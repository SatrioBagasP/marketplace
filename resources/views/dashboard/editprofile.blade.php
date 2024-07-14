@extends('dashboard.layout')
@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Profile Shop</h1>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <form action="/dashboard/editprofile" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="oldimg" value="{{ $toko->image }}">
                <div class="mb-3 ">
                    <label for="nama" class="form-label">Nama Toko</label>
                    <input value="{{ $toko->nama }}" type="text"
                        class="form-control @error('nama')
                    is-invalid
                @enderror"
                        id="nama" name="nama">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 ">
                    <label for="notlpn" class="form-label">Nomor Telpon</label>
                    <input value="{{ $toko->notlpn }}" type="text"
                        class="form-control @error('notlpn')
                    is-invalid
                @enderror"
                        id="notlpn" name="notlpn">
                    @error('notlpn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    @if ($toko->image)
                        Profile Lama
                        <img src="{{ asset('storage/' . $toko->image) }}">
                    @endif
                    <img class="img-preview img-fluid" style="display: none;">
                    <label for="image" class="form-label">Upload Gambar Profile Toko</label>
                    <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image"
                        name="image" type="file" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 ">
                    <label for="desc" class="form-label">Deskripsi Toko</label>
                    @error('desc')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <input id="desc" type="hidden" name="desc" value="{{ $toko->desc }}">
                    <trix-editor input="desc"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
@endsection
