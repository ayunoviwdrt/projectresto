@extends('layouts.app')

@section('title', 'Pemesanan')

@section('contents')
<form action="{{ route('pemesanan.tambah.simpan') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row my-3">
                    @foreach ($menu as $item)
                    <div class="col-md-4">
                        <div class="d-flex flex-column">
                            <label for="menu{{$item->id}}">{{$item->nama}}</label>
                            <img class="my-2" src="{{ url('storage/' . $item->gambar) }}" width="100px" height="100px" alt="">
                            <input type="number" class="form-control" id="menu{{$item->id}}" name="menu[{{$item->id}}]" value="0">
                            <input type="hidden" name="menu_id[{{$item->id}}]" value="{{$item->id}}">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="date" class="form-control" id="waktu" name="waktu">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="status_dipesan" name="status" value="Dipesan">
                        <label class="form-check-label" for="status_dipesan">Dipesan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Pelanggan</label>
                    <input type="text" class="form-control" id="pelanggan" name="pelanggan">
                </div>
                <div class="form-group">
                    <label for="status">Meja</label>
                    <select class="form-control" id="status" name="meja">
                        <option value="1">Meja 1</option>
                        <option value="2">Meja 2</option>
                        <option value="3">Meja 3</option>
                        <option value="4">Meja 4</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection