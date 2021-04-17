<?php

namespace App\Http\Controllers;

use App\MosqueCommittee;
use App\User;
use Exception;
use Illuminate\Http\Request;

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
        return view('mosque_committee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $this->validate($request, [
            'firstname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'lastname' => 'required|string',
            'no_ic' => 'nullable|digits:12|integer',
            'email' => 'required|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'mobile_no' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'gender' => 'required',            
            'address' => 'required|string',
            'city_id' => 'required',
            'acc_no' => 'nullable|required',    
            'appointment_letter' => 'nullable|required',

            // 'mobile_no_branch' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            // 'country' => 'required',    
            // 'state' => 'required',
            // 'Paypal_Id' => 'nullable|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
        ]);

        try{
            //Set branch details
            // $branchID = getNewBranchID();
            $mosqueCommittee = new MosqueCommittee;  
            $mosqueCommittee->firstname = trim($request->firstname);
            $mosqueCommittee->lastname = trim($request->lastname);
            $mosqueCommittee->no_ic = $request->no_ic;
            $mosqueCommittee->email = trim($request->email);
            $mosqueCommittee->mobile_no = $request->mobile_no;
            $mosqueCommittee->gender = $request->gender;
            $mosqueCommittee->address = trim($request->address);
            $mosqueCommittee->city_id = $request->city_id;
            $mosqueCommittee->acc_no = $request->acc_no;
            $mosqueCommittee->appointment_letter = $request->appointment_letter;
            // $mosqueCommittee->Paypal_Id = trim($request->Paypal_Id);
        
            //throw new Exception('Throw exception test'); //enable this to test exceptions
            if (!$mosqueCommittee->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }

            // $newcompany_id = getNewCompanyID(); //get new company ID
            // return redirect('/branch/add/staff/'.$newcompany_id)->with('message','Branch Successfully Added');
            return redirect('mosque_committee/list')->with('message','Mosque Committee Details Successfully Added');
        }
        catch(Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function show(MosqueCommittee $mosqueCommittee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function edit(MosqueCommittee $mosqueCommittee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MosqueCommittee $mosqueCommittee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function destroy(MosqueCommittee $mosqueCommittee)
    {
        //
    }
}
