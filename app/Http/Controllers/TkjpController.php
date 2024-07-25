<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class TkjpController extends Controller
{
    public function show()
    {
        $datatkjp = new User();
        return view('dataTkjp', [
            'datatkjp' => User::all()
        ]);
    }
}
