<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertemuan;
use App\Deskripsi;

class DeskripsiController extends Controller
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
        return view('deskripsi.create', [
            'pertemuan'     => $pertemuan
        ])->render();
    }

    public function store(Request $request, $id)
    {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        $deskripsi      = new Deskripsi();
        $deskripsi->pertemuan_id    = $pertemuan->id;
        $deskripsi->text            = $request->text;
        if($deskripsi->save()) 
        {
            return redirect()->route('pertemuan.show', $pertemuan->id);
        }
    }

    public function softDestroy($id)
    {
        $query = Deskripsi::where('id', $id)->firstOrFail();
        $pertemuanId = $query->pertemuan_id;

        if($query->delete())
        {
            return redirect()->route('pertemuan.show', $pertemuanId);
        }
    }
}
