<?php

namespace App\Http\Controllers;

use App\Mail\UserApprovedMail;
use App\MosqueCommittee;
use App\tbl_daerah;
use App\tbl_mosque;
use App\tbl_mukim;
use App\User;
use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


class MosqueCommitteeController extends Controller
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

        if(getUsersRole(Auth::user()->role_id) == 'Super Admin' || getUsersRole(Auth::user()->role_id) == 'Admin' || getUsersRole(Auth::user()->role_id) == 'Staff HQ' || getUsersRole(Auth::user()->role_id) == 'Staff PKD')
        {
            $mosque_data = MosqueCommittee::where([['role_id', 5],['pass_test', 1]])
                    ->orWhere([['role_id', 6],['pass_test', 1]])
                    ->orWhere([['role_id', 7],['pass_test', 1]])
                    ->get();
        }
        else if(getUsersRole(Auth::user()->role_id) == 'Imam' || getUsersRole(Auth::user()->role_id) == 'Bilal' || getUsersRole(Auth::user()->role_id) == 'Kariah')
        {
            $mosque_data = MosqueCommittee::where([['id',Auth::user()->id],['role_id', Auth::user()->role_id]])
                    ->get();
        }
        

        // $mosque_data = User::whereHas('','','')->get();

		return view('mosque_committee.list',compact('mosque_data'));
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
        $mosque = tbl_mosque::get();

        // return view('mosque_committee.add');
        return view('mosque_committee.add',compact('mukim','daerah','mosque'));
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
            'role' => 'required',
            'mosque' => 'required',
        ]);

        if ($request->hasFile('appointment_letter')) {
            request()->validate([
                'appointment_letter' => 'file|image|max:5000',
            ]);
        }

        try{
            $mosqueCommittee = new MosqueCommittee;
            $mosqueCommittee->name = trim($request->name);
            $mosqueCommittee->lastname = trim($request->lastname);
            $mosqueCommittee->no_ic = $request->no_ic;
            $mosqueCommittee->email = trim($request->email);
            $mosqueCommittee->mobile_no = $request->mobile_no;
            $mosqueCommittee->gender = $request->gender;
            $mosqueCommittee->address = trim($request->address);
            $mosqueCommittee->daerahID = $request->daerah;
            $mosqueCommittee->mukimID = $request->mukim;
            $mosqueCommittee->role = getRoleName($request->role);
            $mosqueCommittee->role_id = $request->role;
            $mosqueCommittee->account_no = $request->account_no;
            $mosqueCommittee->mosqueID = $request->mosque;

            if (!empty(Input::hasFile('appointment_letter'))) {
                $file = Input::file('appointment_letter');
                $filename = $file->getClientOriginalName();
                $file->move(public_path() . '/appointment_letter/', $file->getClientOriginalName());
                $mosqueCommittee->appointment_letter = $filename;
            } else {
                $mosqueCommittee->appointment_letter = null;
            }

            $mosqueCommittee->save();

            if (!$mosqueCommittee->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }
            return redirect('/mosque_committee/list')->with('message','Mosque Committee Details Successfully Added');
        }
        catch(Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $mosqueCommittee_data = MosqueCommittee::where('id','=',$id)->first();

        return view('mosque_committee.view',compact('mosqueCommittee_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daerah = tbl_daerah::get();
		$mosqueCommittee_data = MosqueCommittee::where('id','=',$id)
                                    ->first();
        $mukim = [];

		if(!empty($mosqueCommittee_data)) {
			if(!empty($mosqueCommittee_data->daerahID)) {
				$mukim = tbl_mukim::where('daerahID', '=', $mosqueCommittee_data->daerahID)->get();
			}
		}
		// return view('mosque_committee.edit',compact('daerah','mosqueCommittee_data','mukim'));
		return view('mosque_committee.edit')->with(['daerah' => $daerah,
                                                    'mosqueCommittee_data' => $mosqueCommittee_data,
                                                    'mukim' => $mukim]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'lastname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'no_ic' => 'required|digits:12|integer',
            'email' => 'required|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'mobile_no' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'address' => 'required|string',
            'daerah' => 'required',
            'mukim' => 'required',
        ]);
            $mosqueCommittee = MosqueCommittee::find($id);
            $mosqueCommittee->name = trim($request->name);
            $mosqueCommittee->lastname = trim($request->lastname);
            $mosqueCommittee->no_ic = $request->no_ic;
            $mosqueCommittee->email = trim($request->email);
            $mosqueCommittee->mobile_no = $request->mobile_no;
            $mosqueCommittee->address = trim($request->address);
            $mosqueCommittee->daerahID = $request->daerah;
            $mosqueCommittee->mukimID = $request->mukim;
            $mosqueCommittee->account_no = $request->account_no;
            $mosqueCommittee->appointment_letter = $request->appointment_letter;
            $mosqueCommittee->is_approved = $request->is_approved;
            $mosqueCommittee->save();

            $email_admin = User::whereHas('roles', function ($query) {
                $query->where('role_name', '=', 'Super Admin');
            })
                ->orwhereHas('roles', function ($query) {
                    $query->where('role_name', '=', 'Admin');
                })
                ->get('email');

            $data = array(
                'name' => $mosqueCommittee->name,
                'email' => $mosqueCommittee->email,
                'password' => $mosqueCommittee->password,
            );

            Mail::to($email_admin)->send(new UserApprovedMail($data));

            if (!$mosqueCommittee->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }
            return redirect('/mosque_committee/list')->with('message','Mosque Committee Details Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mosqueCommittee_data = MosqueCommittee::where('id','=',$id)->delete();        //TODO: Buat soft_delete (https://laravel.com/docs/5.8/eloquent#soft-deleting)
        return redirect('/mosque_committee/list')->with('message','MosqueCommittee Successfully Deleted');
    }
}
