<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/dashboard/home');
    }

    public function dashboard()
    {
        $logged_in = Auth::user()->role_id;
        $recent_user = null;

        if (getUsersRole($logged_in) == 'Super Admin' || getUsersRole($logged_in) == 'Admin')
        {
            // $recent_user = User::where('')
            $recent_user = User::where('role_id', 4)
                                // ->groupBy('id','desc')
                                ->take(5)
                                ->get();
        }
        else
        {
            $recent_user = User::where('id', Auth::User()->id)
                                ->get();
        }

        return view('/dashboard/home')->with(['recent_user' => $recent_user]);
    }
}
