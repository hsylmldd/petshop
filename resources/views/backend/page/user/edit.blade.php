@extends('backend.layout.main')
@section('content')
<div class="page-body">
    <div class="card row">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Edit User</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/dashboard/user/{{ $data->id }}" method="POST" class="row">
                @csrf
                @method('PUT')
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $data->name) }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $data->email) }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="password">Password <small>(Kosongkan jika tidak ingin mengubah)</small></label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" name="kota" id="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota', $data->kota) }}">
                        @error('kota')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="d-flex mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
