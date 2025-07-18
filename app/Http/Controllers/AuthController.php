<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function loginPost(Request $request){
        $email = htmlspecialchars($request->email);
        $password = htmlspecialchars($request->password);

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect('/')->with('error', 'Email tidak terdaftar');
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/transaksi');
        } else {
            return redirect('/')->with('error', 'Password salah');

        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function user()
    {
        $user = User::all();
        return view('admin.pengguna.data_pengguna', compact('user'));
    }

    public function tambah_pengguna()
    {
        return view('admin.pengguna.tambah_pengguna');
    }
    function proses_tambah_pengguna(Request $request)
    {
        $nama = $request->input('nama');
        $email = htmlspecialchars($request->input('email'));
        $password = htmlspecialchars($request->input('password'));

        if (User::where('email', $email)->exists()) {
            return redirect('/tambah_pengguna')->with('error', 'Email sudah terdaftar');
        }
        $HasedPassword = Hash::make($password);

        $user = new User;
        $user->name = $nama;
        $user->email = $email;
        $user->password = $HasedPassword;
        $user->save();

        if ($user) {
            return redirect('/pengguna')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/tambah_pengguna')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit_pengguna($id)
    {
        $user = User::where('id_user', $id)->first();
        return view('admin.pengguna.edit_pengguna', compact('user'));
    }

    public function hapus_pengguna(Request $request)
    {
        $id = $request->input('id_user');
        $user = User::where('id_user', $id)->first();
        $user->delete();
        if ($user) {
            return redirect('/pengguna')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/pengguna')->with('error', 'Data gagal dihapus');
        }
    }
}
