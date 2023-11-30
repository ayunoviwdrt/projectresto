<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Menu;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pesan = Pemesanan::get();
        return view('pemesanan.index', ['pemesanan' => $pesan]);
    }

    public function tambah()
    {
        $menu = Menu::where('status', 1)->get();
        return view('pemesanan.form', compact('menu'));
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'waktu' => 'required|date',
            'status' => 'required|string',
            'pelanggan' => 'required|string',
            'meja' => 'required|string',
            'menu.*' => 'required',
            'menu_id.*' => 'required'
        ]);
        
        $data = new Pemesanan();
        $data->waktu = $request->waktu;
        $data->status = $request->status;
        $data->pelanggan = $request->pelanggan;
        $data->meja = $request->meja;
        $data->save();
        
        if ($data) {
            foreach ($request->menu_id as $key => $item) {
                $cari_menu = Menu::find($item);
        
                if ($cari_menu) {
                    $menu = new DetailPemesanan();
                    $menu->pemesanan_id = $data->id;
                    $menu->menu_id = $item;
                    $jumlahMenu = $request->menu[$key];
                    $menu->jumlah = $jumlahMenu;
                    $menu->total_bayar = $cari_menu->harga * $jumlahMenu;
                    $menu->save();
                }
            }
        }
        

        return redirect("/order")->with('status', "berhasil menambahkan pesanan baru");
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::find($id);
        return view('pemesanan.UpdateForm', compact('pemesanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'waktu' => 'required|date',
            'status' => 'required|string',
            'pelanggan' => 'required|string',
            'meja' => 'required|string',
        ]);

        $data = Pemesanan::find($id);
        $data->waktu = $request->waktu;
        $data->status = $request->status;
        $data->pelanggan = $request->pelanggan;
        $data->meja = $request->meja;
        $data->save();
        return redirect("/pemesanan")->with('status', "berhasil menambahkan pesanan baru");
    }
    public function hapus($id)
    {
        $data = Pemesanan::find($id);
        $data->delete();

        return redirect()->intended('/pemesanan');
    }
}
