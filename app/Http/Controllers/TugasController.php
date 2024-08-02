<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function show() {
        $tugass = Tugas::all();
        return view('kategoriKerja.health', compact('tugass'));
    }
}
