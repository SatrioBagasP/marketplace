@extends('dashboard.layout')
@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Profile</h1>
    </div>
    <a href="/dashboard/editprofile" class="btn btn-primary">Edit Profile</a>
    <div class="konten">
        <div class="logo-shop d-flex justify-content-center">
            <img src="{{ asset('storage/' . $toko->image) }}" class="profile card-img-top">
        </div>
        <br>
        <div class="desc-shop d-flex justify-content-center">
            <div class="text-center desc">{!! $toko->desc !!}</div>
        </div>

    </div>
@endsection
