@extends('../layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="/data-barang/create" class="btn btn-success btn-labeled">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Tambah
                    </a>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>name</th>
                            <th>jenis</th>
                            <th>harga</th>
                            <th>deskripsi</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\Barang::all() as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->jenis }}</td>
                                    <td>{{ $u->harga }}</td>
                                    <td>{{ $u->deskripsi }}</td>
                                    <td>
                                        <a href="data-barang/{{ $u->id }}/edit" class="btn btn-warning btn-labeled">
                                            <span class="btn-label">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                            Edit
                                        </a>
                                        |
                                        <form action="{{ '/data-barang/' . $u->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-labeled">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                Delete
                                            </button>
                                        </form>                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
