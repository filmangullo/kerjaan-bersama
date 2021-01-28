<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\MataPelajaran;
use App\Pertemuan;
use App\Komentar;

class PertemuanController extends Controller
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

    public function index($id)
    {
        $mataPelajaran  = MataPelajaran::where('id', $id)->firstOrFail();
        $pertemuan      = Pertemuan::where('mata_pelajarans_id', $mataPelajaran->id)->orderBy('id')->get();
        return view('pertemuan.index',[
            'mataPelajaran'     => $mataPelajaran,
            'pertemuan'         => $pertemuan
        ])->render();
    }

    public function create($id)
    {
        $mataPelajaran  = MataPelajaran::where('id', $id)->firstOrFail();
        return view('pertemuan.create',[
            'mataPelajaran'     => $mataPelajaran
        ])->render();
    }

    public function store(Request $request, $id)
    {
        $mataPelajaran  = MataPelajaran::where('id', $id)->firstOrFail();
        $pertemuan      = new Pertemuan ();

        $pertemuan->mata_pelajarans_id      = $mataPelajaran->id;
        $pertemuan->user_id                 = Auth::user()->id;
        $pertemuan->nama                    = $request->nama;

        if($pertemuan->save())
        {
            return redirect()->route('pertemuan.index', $mataPelajaran->id);
        }
    }

    public function show($id) 
    {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        return view('pertemuan.show', [
            'pertemuan'     => $pertemuan
        ])->render();
    }

    public function komentarCreate($id) {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        return view('komentar.index', [
            'pertemuan'     => $pertemuan
        ])->render();
    }

    public function komentarStore(Request $request, $id) {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        $path = Storage::putFile('public', $request->file('file'));
        $komentar      = new Komentar();
        $komentar->pertemuan_id    = $pertemuan->id;
        $komentar->file            = $path;
        $komentar->komentar        = $request->komentar;
        $komentar->user_id         = Auth::user()->id;
        if($komentar->save()) 
        {
            return redirect()->route('pertemuan.show', $pertemuan->id);
        }
    }
}
