<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if(Auth::attempt($infoLogin)) {
            return redirect('/home');
        } else {
            return redirect('/')->withErrors('email dan password salah');
        }
    }
}
