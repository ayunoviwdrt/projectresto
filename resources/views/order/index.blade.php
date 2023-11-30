@extends('layouts.app')

@section('title', ' Order')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            {{ $row->pemesanan->pelanggan }}
                        </td>
                        <td>
                            Rp. {{ number_format($row->total_bayar, 0, ',', '.') }}
                        </td>
                        @if ($row->pemesanan->status == "Dipesan")
                        <td class="text-danger">
                            {{ $row->pemesanan->status }}
                        </td>
                        @else
                        <td class="text-success">
                            {{ $row->pemesanan->status }}
                        </td>
                        @endif
                        <td>
                            <a href="{{ route('order_detail', $row->pemesanan->id )}}" class="btn btn-warning btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Edit">
                               Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
