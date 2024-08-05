<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\PicCategory;
use Illuminate\Http\Request;
use App\Models\CategoryTugas;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class TugasController extends Controller
{
    public function show()
    {
        $tugass = Tugas::all();
        $categorys = CategoryTugas::all();
        $pics = PicCategory::all();
        return view(
            'kalenderKerja',
            compact('tugass', 'categorys', 'pics')
        );
    }

    public function add(Request $request)
    {
        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'frekuensi' => 'required|string|max:10',
            'bulan' => 'required',
            'category_id' => 'required|integer',
            'pic_id' => 'required|integer',
            'status' => 'required|string|max:10',
            'deskripsi' => 'required|string|max:255',
        ]);
        $tugas = new Tugas();
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->frekuensi = $request->frekuensi;
        $tugas->bulan = $request->bulan;
        $tugas->category_id = $request->category_id;
        $tugas->pic_id = $request->pic_id;
        $tugas->status = $request->status;
        $tugas->deskripsi = $request->deskripsi;

        $tugas->save();

        if ($tugas->save()) {
            Session::flash('success', 'Tugas berhasil ditambahkan!');
            return redirect()->route('daftartugas');
        }
    }
}
