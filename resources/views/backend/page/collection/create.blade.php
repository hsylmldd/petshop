@extends('backend.layout.main')
@section('content')
<div class="page-body">
    <div class="card row">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>{{ $title }}</h3>
            </div>
        </div>
        {{-- @dd($errors) --}}
        <div class="card-body">
            <form action="/dashboard/collection" method="POST" class="row" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-4 col-12 mb-5">
                    <label for="image">Image</label>
                    <div class="bordered shadow">
                        <img src="{{ asset('img-default/default.jpg') }}" alt="Image Preview" class="img-fluid foto-preview" id="foto-preview">
                    </div>
                    <input type="file" name="image" id="image" class="form-control my-3" onchange="previewFoto()">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-8 col-12">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Jantan</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Betina</option>
                        </select>
                        @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="neutered">Sterilisasi</label>
                        <select name="neutered" id="neutered" class="form-control @error('neutered') is-invalid @enderror">
                            <option value="yes" {{ old('neutered') == 'yes' ? 'selected' : '' }}>Ya</option>
                            <option value="no" {{ old('neutered') == 'no' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @error('neutered')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Usia</label>
                        <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}">
                        @error('age')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="ckeditor" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
