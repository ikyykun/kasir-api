@extends('../layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Barang') }}</div>
                <form class="m-3" action="/data-barang" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama</label>
                      <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                      <label for="inputType" class="form-label">Pilih Jenis Makanan:</label>
                      <select id="inputType" name="jenis" class="form-select">
                          <option value="makanan">Makanan</option>  
                          <option value="minuman">Minuman</option>
                      </select>
                    </div>
                    <div class="form-group">

                      <label for="exampleFormControlInput3">Harga</label>
                      <input name="harga" type="decimal" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput3">Deskripsi</label>
                      <input name="deskripsi" type="text" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput3">Image</label>
                      <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="exampleFormControlInput3">
                      @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="w-100 btn btn-success">Tambah Data</button>
                    </div>

                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
