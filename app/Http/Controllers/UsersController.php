<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::get();

        return view('users.index', ['user' => $users]);
    }
    public function tambah()
    {
        return view('users.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = new Users();
        $data->name = $request->name;
        $data->role = $request->role;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        $data->save();

        return redirect()->intended('/users');
    }
    public function edit($id)
    {
        $data = Users::find($id);
        return view('users.UpdateForm', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = Users::find($id);
        $data->name = $request->name;
        $data->role = $request->role;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        $data->save();

        return redirect()->intended('/users');
    }
    public function hapus($id)
    {
        // Logika untuk menghapus data dengan ID yang diberikan
        // Misalnya:
        $data = Users::find($id);
        $data->delete();
        

        return redirect()->intended('/users');
    }
}
