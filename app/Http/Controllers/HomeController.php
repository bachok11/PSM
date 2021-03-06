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
        $recent_user = $recent_mosque_committee = $recent_hafiz = $recent_quran_teacher  = null;

        if (getUsersRole($logged_in) == 'Super Admin' || getUsersRole($logged_in) == 'Admin' || getUsersRole($logged_in) == 'Staff HQ' || getUsersRole($logged_in) == 'Staff PKD')
        {
            // $recent_user = User::where('')
            $recent_mosque_committee = User::where('role_id', 5)
                                            ->orWhere('role_id', 6)
                                            ->orWhere('role_id', 7)
                                            ->orderBy('created_at', 'desc')
                                            ->take(5)
                                            ->get();
            $recent_hafiz = User::where('role_id', 8)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
            $recent_quran_teacher = User::where('role_id', 9)
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
        }
        else
        {
            $recent_user = User::where('id', Auth::User()->id)
                                ->get();
        }

        return view('/dashboard/home')->with(['recent_user' => $recent_user, 
                                            'recent_mosque_committee' => $recent_mosque_committee, 
                                            'recent_hafiz' => $recent_hafiz, 
                                            'recent_quran_teacher' => $recent_quran_teacher]);
    }
}
