@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if(session('message'))
            <h6 class="alert alert-success">{{ session('message') }},</h6>
        @endif
      
        <div class="row d-flex">
            <div class="col-md-3 flex-fill">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Order</label>
                    <h1>{{ $totalOrder }}</h1>
                    <a href="{{ url('order/index') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3 flex-fill">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Order Hari Ini</label>
                    <h1>{{ $todayOrder }}</h1>
                    <a href="{{ url('order/index') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3 flex-fill">
                <div class="card card-body bg-warning text-white mb-3">
                    <h4>Total Pendapatan</h4>
                    <p>Total Pendapatan: Rp. {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    <a href="{{ url('order/index') }}" class="text-white">Lihat</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($order as $row)
                        <div class="col-md-8">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9 flex-fill">
                <div class="card card-body bg-info text-white mb-3">
                    <h2>Status Menu</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-white">Nama Menu</th>
                                <th class="text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menuStatuses as $menuStatus)
                            <tr>
                                <td class="text-white">{{ $menuStatus->nama }}</td>
                                <td class="text-white">{{ $menuStatus->status == 1 ? 'AVAILABLE' : 'STOK HABIS' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection