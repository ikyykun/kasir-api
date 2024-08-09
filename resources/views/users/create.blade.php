@extends('../layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data User') }}</div>
                <form class="m-3" action="/data-users" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama</label>
                      <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput2">Email</label>
                      <input name="email" type="email" class="form-control" id="exampleFormControlInput2">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput3">Password</label>
                      <input name="password" type="password" class="form-control" id="exampleFormControlInput3">
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
