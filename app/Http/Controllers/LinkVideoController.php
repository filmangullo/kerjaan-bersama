<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertemuan;
use App\LinkVideo;

class LinkVideoController extends Controller
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
        return view('link-video.create', [
            'pertemuan'     => $pertemuan
        ])->render();
    }

    public function store(Request $request, $id)
    {
        $pertemuan      = Pertemuan::where('id', $id)->firstOrFail();
        $deskripsi      = new LinkVideo();
        $deskripsi->pertemuan_id    = $pertemuan->id;
        $deskripsi->nama            = $request->nama;
        $deskripsi->link            = $request->link;
        if($deskripsi->save()) 
        {
            return redirect()->route('pertemuan.show', $pertemuan->id);
        }
    }

    public function softDestroy($id)
    {
        $query = LinkVideo::where('id', $id)->firstOrFail();
        $pertemuanId = $query->pertemuan_id;

        if($query->delete())
        {
            return redirect()->route('pertemuan.show', $pertemuanId);
        }
    }
}
