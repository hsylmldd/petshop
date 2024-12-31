@extends('backend.layout.main')
@section('content')
<div class="page-body">
    <div class="card row">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>{{ $title }}</h3>
                {{-- <div class="">
                    <a href="/dashboard/blog/create" class="btn btn-sm btn-primary rounded">Tambah</a>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <th>NO</th>
                        <th>Customer</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->user->name }}</td>

                            <td>Rp. {{ number_format($item->total_harga,2,'.')  }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="/dashboard/transaksi/{{ $item->id }}" class="btn btn-success">Detail</a>

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
