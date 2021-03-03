<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class ProfilController extends Controller
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

    public function index()
    {
        return view('profil.index');
    }

    public function update(Request $request, $id)
    {
        $query  = User::findOrFail($id);

        $query->name    = $request->name;
        $query->email   = $request->email;
        $query->phone   = $request->phone;
        if($request->password != null) {
            $query->password    = Hash::make($request->password);
        }

        if($query->save())
        {
            return redirect()->route('profil', Auth::user()->id);
        }
    }
}
