<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationBackendController extends Controller
{
    public function showLoginForm(){
        // Tampilkan view form login
        return view('page.backend.auth.login');
    }

    public function login(Request $request){
        // Validasi input login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        dd($credentials);
        // Coba login dengan credentials yang diberikan
        if (Auth::attempt($credentials)) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman dashboard atau home
            return redirect()->intended('/adminpanel/hero');
        }

        // Jika gagal login, kembali ke form login dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegisterForm(){
        // Tampilkan view form register
        return view('page.backend.auth.register');
    }

    public function register(Request $request){
        // Validasi input register
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        dd($validatedData);
        // Buat user baru dengan password yang sudah di-hash
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Redirect ke halaman dashboard atau home
        return redirect('/adminpanel/hero');
    }

    public function logout(Request $request){
        Auth::logout();

        // Hapus session dan regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/login');
    }
}
