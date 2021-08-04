<?php

namespace App\Http\Controllers;

use App\Mail\UserApprovalMail;
use App\User;
use App\Role;
use App\Role_user;
use App\tbl_daerah;
use App\tbl_mukim;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $daerah = tbl_daerah::get();
        $mukim = tbl_mukim::get();

        return view('users.register', compact('roles', 'mukim', 'daerah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'lastname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'no_ic' => 'required|digits:12|integer',
            'email' => 'required|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'mobile_no' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'address' => 'required|string',
            'gender' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
        ]);

        if ($request->hasFile('image')) {
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
        }

        try {
            $users = new User;
            $users->name = trim($request->name);
            $users->lastname = trim($request->lastname);
            $users->no_ic = $request->no_ic;
            $users->email = trim($request->email);
            $users->mobile_no = $request->mobile_no;
            $users->address = trim($request->address);
            $users->gender = $request->gender;
            $users->password = bcrypt($request->password);
            $users->role = getRoleName($request->role);
            $users->role_id = $request->role;

            if (!empty(Input::hasFile('image'))) {
                $file = Input::file('image');
                $filename = $file->getClientOriginalName();
                $file->move(public_path() . '/users/', $file->getClientOriginalName());
                $users->image = $filename;
            } else {
                $users->image = 'avtar.png';
            }

            if ($users->save()) {
                $currentUserID = $users->id;
                $role_user_table = new Role_user;
                $role_user_table->user_id = $currentUserID;
                $role_user_table->role_id = $users->role_id;
                $role_user_table->save();
            }

            $email_admin = User::whereHas('roles', function ($query) {
                $query->where('role_name', '=', 'Super Admin');
            })
                ->orwhereHas('roles', function ($query) {
                    $query->where('role_name', '=', 'Admin');
                })
                ->get('email');

            $data = array(
                'name' => $users->name,
                'email' => $users->email,
                'password' => $users->password,
            );

            Mail::to($email_admin)->send(new UserApprovalMail($data));

            return redirect('/login')->with('message', 'User Successfully Added');
            
        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
