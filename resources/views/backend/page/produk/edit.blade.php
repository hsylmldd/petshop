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
            <form action="/dashboard/produk/{{ $data->id }}" method="POST" class="row" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-12 col-12 row">
                    <div class="form-group col-6">
                        <label for="image">Image</label>
                        <div class="bordered shadow">
                            <img src="{{ $data->image ? Storage::url($data->image) : asset('img-default/default.jpg') }}" alt="Image Preview" class="img-fluid foto-preview" id="foto-preview">
                        </div>
                        <input type="file" name="image" id="image" class="form-control my-3" onchange="previewFoto()">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="image2">Image Display</label>
                        <div class="bordered shadow">
                            <img src="{{ $data->image2 ? Storage::url($data->image2) : asset('img-default/default.jpg') }}" alt="Image Preview" class="img-fluid foto-preview2" id="foto-preview2">
                        </div>
                        <input type="file" name="image2" id="image2" class="form-control my-3" onchange="previewFoto2()">
                        @error('image2')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="form-group">
                        <label for="produk">Nama Produk</label>
                        <input type="text" name="produk" id="produk" class="form-control @error('produk') is-invalid @enderror" value="{{ old('produk', $data->produk) }}">
                        @error('produk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $data->harga) }}">
                        @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea id="ckeditor" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $data->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary align-end">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
