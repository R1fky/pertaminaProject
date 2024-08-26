<?php

namespace App\Http\Controllers;

use App\Mail\TugasNotif;
use App\Models\User;
use App\Models\Bulan;
use App\Models\Tugas;
use App\Models\PicCategory;
use Illuminate\Http\Request;
use App\Models\CategoryTugas;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class TugasController extends Controller
{

    public function tampil(Request $request)
    {
        $search = $request->input('search');

        $tugass = Tugas::when($search, function ($query) use ($search) {
            $query->where('nama_tugas', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        })->get();

        $bulans = Bulan::all();
        $pics = PicCategory::all();
        $categorys = CategoryTugas::all();
        $users = User::all();

        if ($tugass->isEmpty()) {
            $message = 'Tidak ada tugas yang ditemukan dengan kata kunci "' . $search . '"';
        } else {
            $message = '';
        }

        return view('daftarkerja', [
            'tugass' => $tugass,
            'bulans' => $bulans,
            'pics' => $pics,
            'categorys' => $categorys,
            'users' => $users,
            'title' => 'daftarkerja',
            'message' => $message
        ]);

        // return view('daftarkerja', [
        //     'tugass' => Tugas::all(),
        //     'bulans' => Bulan::all(),
        //     'pics' => PicCategory::all(),
        //     'categorys' => CategoryTugas::all(),
        //     'users' => User::all(),
        //     'title' => 'daftarkerja'
        // ]);
    }

    public function show(Bulan $bulan)
    {
        return view(
            'kalenderKerja',
            [
                'tugass' => $bulan->tugas,
                'categorys' => CategoryTugas::all(),
                'pics' => PicCategory::all(),
                'bulans' => Bulan::all(),
                'users' => User::all(),
                'title' => 'Daftar Kerja Bulan'
            ]
        );
    }

    public function add(Request $request)
    {
        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'frekuensi' => 'required|string|max:10',
            'bulan_id' => 'required',
            'category_id' => 'required|integer',
            'pic_id' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
        ]);

        $tugas = new Tugas();
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->frekuensi = $request->frekuensi;
        $tugas->bulan_id = $request->bulan_id;
        $tugas->category_id = $request->category_id;
        $tugas->pic_id = $request->pic_id;
        $tugas->status = 'belum';
        $tugas->user_id = $request->user_id;
        $tugas->deskripsi = $request->deskripsi;
        $tugas->save();

        if ($tugas->save()) {
            $user = $tugas->user;
            Mail::to($user->email)->send(new TugasNotif);
            Session::flash('success', 'Tugas berhasil ditambahkan!');
            return redirect()->route('daftarkerja');
        }
    }

    public function delete(Tugas $tugas)
    {
        if ($tugas->document) {
            Storage::disk('public')->delete('document/' . $tugas->document);
        }
        $tugas->delete();

        return redirect()->route('daftarkerja')->with('danger', 'Data Berhasil Dihapus');
    }

    public function edit(Request $request, Tugas $tugas)
    {

        $tugas->update($request->all());

        return redirect()->route('daftarkerja')->with('success', 'Data Berhasil Diedit');
    }

    //untuk menambahkan kinerja progres tugas
    public function update(Request $request, Tugas $tugas)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:10240',

        ]);

        $pdf_file = $request->file('pdf_file');
        $filename = date('Y-m-d') . $pdf_file->getClientOriginalName();
        $path = 'document/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($pdf_file));

        $tugas->document = $filename;


        $tugas->update([
            $tugas->status = 'progress',
            $tugas->deskripsi = $request->deskripsi,
            $tugas->user_id = $request->user_id
        ]);
        $tugas->save();
        return redirect('home')->with('success', 'Berhasil Upload Progres Tugas');
    }

    public function updateProgres(Request $request, Tugas $tugas)
    {
        if ($request->input('action') === 'terima') {
            $tugas->update(['status' => 'Approve']);
            return redirect('daftarkerja')->with('success', 'Pekerjaan telah Di Approve!');
        } elseif ($request->input('action') === 'complite') {
            $tugas->update(['status' => 'Complite']);
            return redirect('daftarkerja')->with('success', 'Pekerjaan Complite');
        }
    }
}
