<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertemuan;
use App\Deskripsi;

class DeskripsiController extends Controller
{
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
}
