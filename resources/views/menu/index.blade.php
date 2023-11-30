@extends('layouts.app')

@section('title', 'Menu')

@section('contents')
<section class="pt-2 pb-2">
    <div class="card-body">
        <a href="{{ route('menu.tambah') }}" class="btn btn-primary mb-3">Tambah Menu</a>
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <table id="menuCart" class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:35%">Nama Menu</th>
                                <th style="width:12%">Harga</th>
                                <th style="width:8%"></th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $item)
                            <tr>
                                <td data-th="Nama Menu">
                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                            <img src=" {{ url('storage/' . $item->gambar) }} " alt="" width="100%" class="img-fluid d-none d-md-block rounded mb-2 shadow">
                                        </div>
                                        <div class="col-md-9 text-left mt-sm-2">
                                            <h5>{{$item->nama}}</h5>
                                            <p class="font-weight-light">{{$item->deskripsi}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Harga">Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td data-th="Status">
                                    @if ($item->status == 1)
                                    <p class="text-success">AVAILABLE</p>
                                    @else
                                    <p class="text-danger">STOK HABIS</p>
                                    @endif
                                </td>
                                <td class="actions" data-th="">
                                    <div class="text-right">
                                        <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-warning btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('menu.hapus', $item->id) }}" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="row mt-4 d-flex">
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="{{ route('users') }}">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </div>

           
</section>
@endsection