@extends('layouts.app')

@section('title', ' User')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('users.tambah') }}" class="btn btn-primary mb-3">Tambah User</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $row->id) }}" class="btn btn-warning btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('users.hapus', $row->id) }}" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Hapus">
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