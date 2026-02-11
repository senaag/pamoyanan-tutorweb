<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function autentikasi(Request $request) {
        $kredensial = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan peran
            if (auth()->user()->peran === 'siswa') {
                return redirect()->intended('/dashboardsiswa');
            }
            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Email atau password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
