@extends('dashboard.layout')
@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Product</h1>
    </div>
    <a href="/dashboard/create" class="btn btn-primary">Tambah Product</a>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $index => $data)
                    <tr>
                        <td>
                            {{ $product->firstItem() + $index }}
                        </td>
                        <td>
                            {{ $data->nama_product }}
                        </td>
                        <td>
                            {{ $data->category->nama }}
                        </td>
                        <td>
                            <a href="/singleproduct/{{ $data->id }}" class="badge btn-info"> <span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/edit/{{ $data->id }}" class="badge btn-warning"> <span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/product/{{ $data->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="badge btn-danger border-0" onclick="return confirm('apakah anda yakin?')"
                                    type="submit"><span data-feather="trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $product->links() }}
        </div>

    </div>
@endsection
