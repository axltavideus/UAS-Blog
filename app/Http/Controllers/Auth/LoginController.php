<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home'); // Mengarahkan ke halaman home setelah login berhasil
        }

        return redirect()->route('home')->with('error', 'Login failed. Please check your credentials.'); // Mengarahkan kembali ke halaman home jika login gagal
    }
}
