<?php

namespace App\Http\Controllers;

use App\Hafiz;
use App\tbl_daerah;
use App\tbl_mukim;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HafizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $hafiz_data = Hafiz::where('pass_test','=',1)->get();
        $hafiz_data = User::where([['pass_test', 1], ['role_id', 9]])
            ->get();

        return view('hafiz.list', compact('hafiz_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daerah = tbl_daerah::get();
        $mukim = tbl_mukim::get();

        // return view('mosque_committee.add');
        return view('hafiz.add', compact('mukim', 'daerah'));
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
            'gender' => 'required',
            'address' => 'required|string',
            'daerah' => 'required',
            'mukim' => 'required',
        ]);

        $password = '0123456789';
        $hashedPassword = Hash::make($password);

        $hafiz = new User;
        $hafiz->name = trim($request->name);
        $hafiz->lastname = trim($request->lastname);
        $hafiz->no_ic = $request->no_ic;
        $hafiz->email = trim($request->email);
        $hafiz->mobile_no = $request->mobile_no;
        $hafiz->gender = $request->gender;
        $hafiz->address = trim($request->address);
        $hafiz->daerahID = $request->daerah;
        $hafiz->mukimID = $request->mukim;
        $hafiz->account_no = $request->account_no;
        $hafiz->id_juzuk = $request->no_juzuk;
        $hafiz->pass_test = Hafiz::$pass_test;
        $hafiz->password = $hashedPassword;
        $hafiz->image = 'avtar.png';



        if (!empty(Input::hasFile('appointment_letter'))) {
            $file = Input::file('appointment_letter');
            $filename = $file->getClientOriginalName();
            $file->move(public_path() . '/appointment_letter/', $file->getClientOriginalName());
            $hafiz->appointment_letter = $filename;
        } else {
            $hafiz->appointment_letter = null;
        }

        $hafiz->save();

        // throw new Exception('Throw exception test'); //enable this to test exceptions
        if (!$hafiz->save()) { // save() returns a boolean
            throw new Exception("Could not save data, Please contact us if it happens again.");
        }
        return redirect('/appointment/add')->with('message', 'Hafiz Details Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $hafiz
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $hafiz_data = User::where('id', '=', $id)->first();
        return view('hafiz.view', compact('hafiz_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $hafiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daerah = tbl_daerah::get();
        $hafiz_data = User::where('id', '=', $id)->first();
        $mukim = [];

        if (!empty($hafiz_data)) {
            if (!empty($hafiz_data->daerahID)) {
                $mukim = tbl_mukim::where('daerahID', '=', $hafiz_data->daerahID)->get();
            }
        }
        return view('hafiz.edit')->with([
            'daerah' => $daerah,
            'hafiz_data' => $hafiz_data,
            'mukim' => $mukim
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $hafiz
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'lastname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'no_ic' => 'required|digits:12|integer',
            'email' => 'required|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'mobile_no' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'address' => 'required|string',
            'daerah' => 'required',
            'mukim' => 'required',
            'account_no' => 'nullable',
            'no_juzuk' => 'nullable',
        ]);

        try {
            $hafiz = User::find($id);
            $hafiz->firstname = trim($request->firstname);
            $hafiz->lastname = trim($request->lastname);
            $hafiz->no_ic = $request->no_ic;
            $hafiz->email = trim($request->email);
            $hafiz->mobile_no = $request->mobile_no;
            $hafiz->address = trim($request->address);
            $hafiz->daerahID = $request->daerah;
            $hafiz->mukimID = $request->mukim;
            $hafiz->account_no = $request->account_no;
            $hafiz->no_juzuk = $request->no_juzuk;

            // throw new Exception('Throw exception test'); //enable this to test exceptions
            if (!$hafiz->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }

            return redirect('/hafiz/list')->with('message', 'Hafiz Details Successfully Updated');
        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hafiz  $hafiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hafiz_data = User::where('id', '=', $id)->delete();        //TODO: Buat soft_delete (https://laravel.com/docs/5.8/eloquent#soft-deleting)
        return redirect('/hafiz/list')->with('message', 'Successfully Deleted');
    }
}
