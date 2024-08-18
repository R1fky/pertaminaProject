<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Tugas;
use App\Models\User;

use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TkjpController extends Controller
{
    public function show()
    {
        return view(
            'dataTkjp',
            [
                'users' => User::all(),
                'roles' => Role::all(),
                'title' => 'Daftar TKJP'
            ]
        );
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'required|mimes:png,jpg,jpeg,jfif',
            'password' => 'required|string|min:8|',
            'bagian' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);


        $image = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'images/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($image));

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->bagian = $request->bagian;
        $user->role_id = $request->role_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->image = $filename;
        $user->save();

        if ($user->save()) {
            Session::flash('success', 'Data berhasil ditambahkan!');
            return redirect()->route('daftartkjp');
        }
    }

    //delete
    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('daftartkjp')->with('danger', 'data berhasil dihapus');
    }

    public function edit(Request $request, User $user)
    {

        $user->update($request->all());

        return redirect()->route('daftartkjp')->with('success', 'data berhasil diUpdate');
    }

    //membuat halaman profil
    public function profilShow()
    {
        return view('profile', [
            'title' => 'profil',
        ]);
    }

    public function updateProfil(User $user)
    {

        return view('profil.ubahUser', [
            'title' => 'ubah profil',
            'user' => $user
        ]);
    }

    public function updateEmail(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user->update([
            $user->email = $request->email,
        ]);
        $user->save();
        return redirect('/profil')->with('success', 'Email Anda Berhasil Di Ubah');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:8|',
        ]);

        $user->update([
            $user->password = bcrypt($request->password)
        ]);
        $user->save();
        return redirect('/profil')->with('success', 'Password Anda Berhasil Di Ubah');
    }

    public function deleteAccount(User $user)
    {
        $user->delete();

        return redirect()->route('login');
    }
}
