@extends('layouts.app')

@section('title', '')

@section('contents')
<form action="{{ route('menu.edit.name'), ['id' => $menu->id]) }} " method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Hapus</h6> 
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" value="{{$menu->nama}}" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="name">Deskripsi</label>
                        <input type="text" value="{{$menu->deskripsi}}" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="name">Harga</label>
                        <input type="number" value="{{$menu->harga}}" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select value="{{$menu->status}}" class="form-control" id="status" name="status">
                            <option value="1">AVAILABLE</option>
                            <option value="0">STOK HABIS</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
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
