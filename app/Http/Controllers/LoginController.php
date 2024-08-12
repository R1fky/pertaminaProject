<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function loginproses(Request $request)
    {
        $credit = $request->validate([
            'email' => 'required',
            'password' => 'required|string|min:8'
        ]);

        $user = new User();

        $user->email = $request->email;
        $user->password = $request->password;

        if (Auth::attempt($credit)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Anda berhasil Login');
        }

        Session::flash('error', 'Username dan Password tidak terdaftar');
        return back();
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
