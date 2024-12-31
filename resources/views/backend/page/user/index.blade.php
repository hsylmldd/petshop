@extends('backend.layout.main')
@section('content')
<div class="page-body">
    <div class="card row">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>{{ $title }}</h3>
                <div class="">
                    <a href="/dashboard/user/create" class="btn btn-sm btn-primary rounded">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>kota</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->kota }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="/dashboard/user/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>

                                    <form action="/dashboard/user/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin Mau Hapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
