@extends('layouts.app')

@section('title', '')

@section('contents')
<form action="{{ route('users.edit.store', ['id' => $data->id]) }} " method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Hapus</h6> <!-- Mengubah "Update" menjadi "Hapus" -->
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$data->name}}" class="form-control" id="email" name="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" value="{{$data->email}}" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="status">Role</label>
                        <select class="form-control" value="{{$data->role}}" id="status" name="role">
                            <option value="admin">admin</option>
                            <option value="users">users</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button> <!-- Mengubah "Simpan" menjadi "Hapus" -->
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
