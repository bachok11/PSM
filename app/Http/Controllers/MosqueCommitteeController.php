<?php

namespace App\Http\Controllers;

use App\MosqueCommittee;
use App\tbl_daerah;
use App\tbl_mukim;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MosqueCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $branchId = getNewBranchID();
        // $companyId = getCompanyID();
        // $users = User::get();
        $mosque_data = MosqueCommittee::get();

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

        // return view('mosque_committee.add');
        return view('mosque_committee.add',compact('mukim','daerah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'firstname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'lastname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'no_ic' => 'required|digits:12|integer',
            'email' => 'required|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'mobile_no' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'gender' => 'required',            
            'address' => 'required|string',
            'daerah' => 'required',
            'mukim' => 'required',
            'role' => 'required',
            'mosque_name' => 'required|string',
            'account_no' => 'nullable',    
            'appointment_letter' => 'nullable',
        ]);
            $mosqueCommittee = new MosqueCommittee;  
            $mosqueCommittee->firstname = trim($request->firstname);
            $mosqueCommittee->lastname = trim($request->lastname);
            $mosqueCommittee->no_ic = $request->no_ic;
            $mosqueCommittee->email = trim($request->email);
            $mosqueCommittee->mobile_no = $request->mobile_no;
            $mosqueCommittee->gender = $request->gender;
            $mosqueCommittee->address = trim($request->address);
            $mosqueCommittee->daerahID = $request->daerah;
            $mosqueCommittee->mukimID = $request->mukim;
            $mosqueCommittee->roleID = $request->role;
            $mosqueCommittee->mosque_name = trim($request->mosque_name);
            $mosqueCommittee->account_no = $request->account_no;
            $mosqueCommittee->appointment_letter = $request->appointment_letter;
            $mosqueCommittee->image = 'avtar.png';

            if (!$mosqueCommittee->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }
            return redirect('/mosque_committee/list')->with('message','Mosque Committee Details Successfully Added');
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
		$mosqueCommittee_data = MosqueCommittee::where('id','=',$id)->first();
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
            'firstname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'lastname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'no_ic' => 'required|digits:12|integer',
            'email' => 'required|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'mobile_no' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'address' => 'required|string',
            'daerah' => 'required',
            'mukim' => 'required',
            'mosque_name' => 'nullable|string',
            'account_no' => 'nullable',    
            'appointment_letter' => 'nullable',
        ]);

            $mosqueCommittee = MosqueCommittee::find($id);
            $mosqueCommittee->firstname = trim($request->firstname);
            $mosqueCommittee->lastname = trim($request->lastname);
            $mosqueCommittee->no_ic = $request->no_ic;
            $mosqueCommittee->email = trim($request->email);
            $mosqueCommittee->mobile_no = $request->mobile_no;
            $mosqueCommittee->address = trim($request->address);
            $mosqueCommittee->daerahID = $request->daerah;
            $mosqueCommittee->mukimID = $request->mukim;
            $mosqueCommittee->mosque_name = trim($request->mosque_name);
            $mosqueCommittee->account_no = $request->account_no;
            $mosqueCommittee->appointment_letter = $request->appointment_letter;
            // $mosqueCommittee->save();

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
