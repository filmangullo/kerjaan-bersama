<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $mataPelajaran = MataPelajaran::all();
        return view('beranda.index', [
            'mataPelajaran'    => $mataPelajaran
        ])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beranda.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = new MataPelajaran();

        $query->nama = $request->nama;
        $query->keterangan  = $request->keterangan;
        $query->user_id     = Auth::user()->id;
        if($query->save()) 
        {
            return redirect()->route('beranda.index');
        }

    }
}
