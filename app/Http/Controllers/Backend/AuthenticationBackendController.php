<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationBackendController extends Controller
{
    public function index(){
        return view('page.backend.auth.index');
    }

    public function login(Request $request){
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ],[
            'email.required'    =>'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($infologin)){
            //jika sukses
            return 'sukses';
        } else {
            //jika gagal
            return 'gagal';
        }
    }
}
