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
                Waktu Transaksi : {{ $data->created_at }}
                <table id="" class="table table-bordered">
                    <thead>
                        <th>NO</th>
                        <th>Produk</th>
                        <th>Harga</th>
                    </thead>
                    <tbody>
                        @php
                            $produks = json_decode($data->produks);
                        @endphp

                        @foreach ($produks as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->produk }}</td>
                            <td>Rp. {{ number_format($item->harga,2,'.')  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th colspan="2" class="text-center"> TOTAL HARGA </th>
                        <td > Rp. {{ number_format($data->total_harga,2,'.') }}</td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
