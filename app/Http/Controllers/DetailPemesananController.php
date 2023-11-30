<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Menu;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPemesananController extends Controller
{
    public function index()
    {
        $orders = DetailPemesanan::join('menu', 'detail_pemesanan.menu_id', '=', 'menu.id')
            ->select('detail_pemesanan.pemesanan_id', DB::raw('SUM(menu.harga * detail_pemesanan.jumlah) as total_bayar'))
            ->groupBy('detail_pemesanan.pemesanan_id')
            ->get();

        return view('order.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = DetailPemesanan::join('menu', 'detail_pemesanan.menu_id', '=', 'menu.id')
            ->select('pemesanan_id', DB::raw('SUM(menu.harga * detail_pemesanan.jumlah) as total_bayar'))
            ->where('pemesanan_id', $id)
            ->groupBy('pemesanan_id')
            ->get();

        $menu   = Menu::join('detail_pemesanan', 'menu.id', '=', 'detail_pemesanan.menu_id')->where('detail_pemesanan.pemesanan_id', $id)->get();
        return view('order.detail', compact('order', 'menu'));
    }

    public function confirm($id) 
    {
        $data = Pemesanan::find($id);
        $data->status = 'Diverifikasi';
        $data->save();
        return redirect("/order")->with('status', "berhasil menambahkan pesanan baru");
    }
}
