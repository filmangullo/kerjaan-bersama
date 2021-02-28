<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\TugasKumpul;
use App\Pertemuan;
use App\Tugas;

class TugasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        return view('tugas.create', [
            'pertemuan'     => $pertemuan
        ])->render();
    }

    public function store(Request $request, $id) {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();

        $path = Storage::putFile('public', $request->file('file'));
        $tugas      = new Tugas();
        $tugas->deadline        = $request->deadline;
        $tugas->pertemuan_id    = $pertemuan->id;
        $tugas->keterangan      = $request->keterangan;
        $tugas->file            = substr($path,7);
        if ($request->hasFile('file')) {
            $tugas->nama = $request->file('file')->getClientOriginalName();
        }

        if($tugas->save())
        {
            return redirect()->route('pertemuan.show', $pertemuan->id);
        }
    }

    public function destroy($id)
    {
        $query = Tugas::where('id', $id)->firstOrFail();
        $pertemuanId = $query->pertemuan_id;

        if($query->delete())
        {
            return redirect()->route('pertemuan.show', $pertemuanId);
        }
    }

    public function createKumpul($id)
    {
        $tugas      = Tugas::where('id', $id)->firstOrFail();

        return view('tugas-kumpul.create', [
            'tugas'     => $tugas,
            'pertemuan' => Pertemuan::where('id', $tugas->pertemuan_id)->firstOrFail()
        ])->render();
    }

    public function storeKumpul(Request $request, $id)
    {
        $tugas     = Tugas::where('id', $id)->firstOrFail();

        $path = Storage::putFile('public', $request->file('file'));
        $tugasKumpul      = new TugasKumpul();
        $tugasKumpul->user_id         = Auth::user()->id;
        $tugasKumpul->tugas_id        = $tugas->id;
        $tugasKumpul->keterangan      = $request->keterangan;
        $tugasKumpul->file            = substr($path,7);
        if ($request->hasFile('file')) {
            $tugasKumpul->nama = $request->file('file')->getClientOriginalName();
        }

        if($tugasKumpul->save())
        {
            return redirect()->route('pertemuan.show', $tugas->pertemuan_id);
        }
    }

    public function showKumpul($id)
    {
        $tugasKumpul = TugasKumpul::where('id', $id)->firstOrFail();
        $tugas       = Tugas::where('id', $tugasKumpul->tugas_id)->firstOrFail();
        return view('tugas-kumpul.show',[
            'tugasKumpul'       => $tugasKumpul,
            'pertemuan'         => Pertemuan::where('id', $tugas->pertemuan_id)->firstOrFail()
        ])->render();
    }

    public function nilaiKumpul(Request $request,$id)
    {
        $tugasKumpul = TugasKumpul::where('id', $id)->firstOrFail();
        $tugas       = Tugas::where('id', $tugasKumpul->tugas_id)->firstOrFail();

        $tugasKumpul->nilai       = $request->nilai;

        if ($tugasKumpul->save())
        {
            return redirect()->route('tugasKumpul.create', $tugasKumpul->tugas_id);
        }


    }
}
