<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kontak.index')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = New Kontak();

        $query->name    = $request->name;
        $query->email   = $request->email;
        $query->telepon = $request->telepon;
        $query->subject = $request->subject;
        $query->message = $request->message;

        if($query->save()) {
            return redirect()->route('kontak.index')->with(['success' => 'Pesan anda berhasil di kirim, harap untuk melakukan pengecekkan selama 1 x 24 jam, jika belum berhasil harap menghubungi melalui pesan suara...']);;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
