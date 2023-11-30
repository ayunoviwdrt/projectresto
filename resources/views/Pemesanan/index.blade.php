@extends('layouts.app')

@section('title', ' Pemesanan')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('pemesanan.tambah') }}" class="btn btn-primary mb-3">Tambah Pemesanan</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Pelanggan</th>
                        <th>Meja</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanan as $row)
                    <tr>
                        <td>{{ $row->waktu }}</td>
                        @if ($row->status == "Dipesan")
                        <td class="text-danger">
                            {{ $row->status }}
                        </td>
                        @else
                        <td class="text-success">
                            {{ $row->status }}
                        </td>
                        @endif
                        <td>{{ $row->pelanggan }}</td>
                        <td>{{ $row->meja }}</td>
                        <td>
                            <a href="{{ route('pemesanan.edit', $row->id) }}" class="btn btn-warning btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('pemesanan.hapus', $row->id) }}" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Hapus">
                                <i class="fas fa-trash"></i>
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