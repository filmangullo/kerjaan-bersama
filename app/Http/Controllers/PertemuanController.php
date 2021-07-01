<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\DaftarHadirWaktuTutup;
use App\MataPelajaran;
use App\DaftarHadir;
use App\Pertemuan;
use App\Komentar;
use App\Balasan;
use App\Dokumen;

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

    public function daftarHadir(Request $request, $id) {

        $check = DaftarHadir::where('pertemuan_id', $id)
                            ->where('user_id', Auth::user()->id)
                            ->doesntExist();

        if ($check) {
            $query      = new DaftarHadir();

            $query->pertemuan_id        = $id;
            $query->user_id             = Auth::user()->id;
            $query->keterangan          = $request->keterangan;
            $query->tanggal_dan_jam     = date("Y-m-d H:i:s");
            $query->save();
        }

        return redirect()->route('pertemuan.show', $id);
    }

    public function  exportDaftarHadir($id)
    {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        $daftarHadir    = DaftarHadir::where('pertemuan_id', $pertemuan->id)->get();
        return view('pertemuan.export_daftar_hadir', [
            'pertemuan'     => $pertemuan,
            'daftarHadir'   => $daftarHadir
        ]);
    }

    public function updateWaktuTutupDaftarHadir(Request $request,$id)
    {
        if($query = DaftarHadirWaktuTutup::where('pertemuan_id', $id)->exists())
        {
            $queryy = DaftarHadirWaktuTutup::where('pertemuan_id', $id)->firstOrfail();

            $queryy->tanggal_dan_jam   = $request->tanggal_dan_jam;

            $queryy->save();

        } else
        {
            $querys = DaftarHadirWaktuTutup::create([
                'pertemuan_id'      => $id,
                'tanggal_dan_jam'   => $request->tanggal_dan_jam
            ]);
        }


        return redirect()->back();
    }

    public function dokumenCreate($id)
    {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        return view('dokumen.create', [
            'pertemuan'     => $pertemuan
        ])->render();
    }

    public function dokumenStore(Request $request, $id) {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        $path = Storage::putFile('public', $request->file('file'));
        $dokumen      = new Dokumen();
        $dokumen->pertemuan_id    = $pertemuan->id;
        $dokumen->nama            = $request->nama;
        $dokumen->file            = substr($path,7);
        if($dokumen->save())
        {
            return redirect()->route('pertemuan.show', $pertemuan->id);
        }
    }

    public function komentarCreate($id) {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        return view('komentar.create', [
            'pertemuan'     => $pertemuan
        ])->render();
    }

    public function komentarStore(Request $request, $id) {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();


        $komentar      = new Komentar();
        $komentar->pertemuan_id    = $pertemuan->id;
        if(!empty($request->file('file')))
        {
            $path = Storage::putFile('public', $request->file('file'));
            $komentar->file            = substr($path,7);
        }

        $komentar->komentar        = $request->komentar;
        $komentar->user_id         = Auth::user()->id;
        if($komentar->save())
        {
            return redirect()->route('pertemuan.show', $pertemuan->id);
        }
    }

    public function komentarDestroy($id)
    {
        $query = Komentar::where('id', $id)->firstOrFail();
        $pertemuanId = $query->pertemuan_id;
        if($query->delete())
        {
            return redirect()->route('pertemuan.show', $pertemuanId);
        }
    }

    public function balasanCreate($id) {
        $komentar      = Komentar::where('id', $id)->firstOrFail();
        return view('balasan.create', [
            'komentar'     => $komentar
        ])->render();
    }

    public function balasanStore(Request $request, $id) {
        $komentar      = Komentar::where('id', $id)->firstOrFail();
        // $path = Storage::putFile('public', $request->file('file'));
        $balasan      = new Balasan();
        $balasan->komentar_id     = $komentar->id;
        $balasan->user_id         = Auth::user()->id;
        $balasan->balasan         = $request->balasan;
        // $komentar->file            = substr($path,7);

        if($balasan->save())
        {
            return redirect()->route('pertemuan.show', $komentar->pertemuan_id);
        }
    }

    public function balasanDestroy($id)
    {
        $query = Balasan::where('id', $id)->firstOrFail();
        $pertemuanId = Komentar::where('id', $id)->firstOrFail()->pertemuan_id;

        if($query->delete())
        {
            return redirect()->route('pertemuan.show', $pertemuanId);
        }
    }
}
