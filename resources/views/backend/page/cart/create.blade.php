@extends('backend.layout.main')
@section('content')
<div class="page-body">
    <div class="card row">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>{{ $title }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="/dashboard/blog" method="POST" class="row" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="col-lg-4 col-12 mb-5">
                    <label for="image">IMAGE</label>
                    <div class="bordered shadow">
                        <img src="{{ asset('img-default/default.jpg') }}" alt="Image Preview" class="img-fluid foto-preview" id="foto-preview">
                    </div>
                    <input type="file" name="image" id="image" class="form-control my-3" onchange="previewFoto()">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-4 col-12 mb-5">
                    <label for="image">IMAGE DISPLAY</label>
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
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea id="ckeditor" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary align-end">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
