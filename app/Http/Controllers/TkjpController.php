<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Session;

class TkjpController extends Controller
{
    public function show()
    {
        $users = User::all();
        $roles = Role::all();
        return view(
            'dataTkjp',
            compact('users', 'roles')
        );
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
            'bagian' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->bagian = $request->bagian;
        $user->role_id = $request->role_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        $user->save();

        if ($user->save()) {
            Session::flash('success', 'Data berhasil ditambahkan!');
            return redirect()->route('daftartkjp');
        }
    }
}
