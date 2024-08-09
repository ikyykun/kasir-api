@extends('../layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data User') }}</div>
                <form class="m-3" action="/data-users/{{ $users->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama</label>
                      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{$users->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput2">Email</label>
                      <input name="email" type="email" class="form-control" id="exampleFormControlInput2" value="{{$users->email}}">
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="w-100 btn btn-success">Edit Data</button>
                    </div>

                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
