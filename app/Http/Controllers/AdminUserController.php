<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminUserController extends Controller
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
        $users  = User::orderBy('created_at', 'DESC')->paginate(10);;
        return view('admin.user.index',
        [
            'users'     => $users
        ])->render();
    }

    public function approve($id)
    {
        $user   = User::findOrFail($id);

        $user->role_approve     = true;

        if($user->save())
        {
            return redirect()->back()->with(['success' => $user->name.' Berhasil di Approve']);;
        }
    }

    public function unapprove($id)
    {
        $user   = User::findOrFail($id);

        $user->role_approve     = false;

        if($user->save())
        {
            return redirect()->back()->with(['success' => $user->name.' Berhasil di Unapprove']);;
        }
    }
}
