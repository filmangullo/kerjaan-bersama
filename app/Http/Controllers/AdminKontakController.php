<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Kontak;

class AdminKontakController extends Controller
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
        $kontaks  = Kontak::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.kontak.index',
        [
            'kontaks'     => $kontaks
        ])->render();
    }
}
