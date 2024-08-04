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
    public function show() {
        $tugass = Tugas::all();
        $categorys = CategoryTugas::all();
        $pics = PicCategory::all();
        return view(
            'kalenderKerja',
            compact('tugass', 'categorys', 'pics')
        );
    }

    public function add(Request $request) {
        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'frekuensi' => 'required|string|max:10',
            'document' => 'required|mimes:png,jpg,jpeg,jfif|max:2046',
            'category_id' => 'required|integer',
            'pic_id' => 'required|integer',
            'status' => 'required|string|max:10',
            'deskripsi' => 'required|string|max:50',
        ]);

        $document = $request->file('document');
        $filename = date('Y-m-d').$document->getClientOriginalName();
        $path = 'document/'.$filename;
        Storage::disk('public')->put($path,file_get_contents($document));

        $tugas = new Tugas();
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->frekuensi = $request->frekuensi;
        $tugas->document = $request->document;
        $tugas->category_id = $request->category_id;
        $tugas->pic_id = $request->pic_id;
        $tugas->status = $request->status;
        $tugas->deskripsi = $request->deskripsi;

        $tugas->document = $filename;

        $tugas->save();

        if ($tugas->save()) {
            Session::flash('success', 'Tugas berhasil ditambahkan!');
            return redirect()->route('daftartugas');
        }

    }
}
