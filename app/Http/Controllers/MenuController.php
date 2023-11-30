<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::get();

        return view('menu.index', ['menu' => $menu]);
    }

    public function tambah()
    {
        $menu = Menu::all();
        return view('menu.form', compact('menu'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric', 
            'status' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new Menu();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->status = $request->status;

        // Unggah gambar dan simpan path gambar ke dalam model
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
            $data->gambar = $gambarPath;
        }
        $data->save();
        return redirect("/menu")->with('status', "berhasil menambahkan menu baru");
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menu.UpdateForm', compact('menu'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric', 
            'status' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = Menu::find($id) ;
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->status = $request->status;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
            $data->gambar = $gambarPath;
        }
        $data->save();
        return redirect("/menu")->with('status', "berhasil menambahkan menu baru");
    }
    public function hapus($id)
    {
        $data = Menu::find($id);
        $data->delete();

        return redirect()->intended('/menu');
    }
}