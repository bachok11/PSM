<?php

namespace App\Http\Controllers;

use App\QuranTeacher;
use App\tbl_daerah;
use App\tbl_mukim;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class QuranTeacherController extends Controller
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
        $quranTeacher_data = QuranTeacher::get();
        

		return view('quran_teacher.list',compact('quranTeacher_data'));
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
        return view('quran_teacher.add',compact('mukim','daerah'));
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
            'firstname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'lastname' => 'required|string|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'no_ic' => 'required|digits:12|integer',
            'email' => 'required|email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'mobile_no' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'gender' => 'required',            
            'address' => 'required|string',
            'daerah' => 'required',
            'mukim' => 'required',
            'school_name' => 'required|string',
            'account_no' => 'nullable',    
            'appointment_letter' => 'nullable',
        ]);

        try{
            $quranTeacher = new QuranTeacher;  
            $quranTeacher->name = trim($request->firstname);
            $quranTeacher->lastname = trim($request->lastname);
            $quranTeacher->no_ic = $request->no_ic;
            $quranTeacher->email = trim($request->email);
            $quranTeacher->mobile_no = $request->mobile_no;
            $quranTeacher->gender = $request->gender;
            $quranTeacher->address = trim($request->address);
            $quranTeacher->daerahID = $request->daerah;
            $quranTeacher->mukimID = $request->mukim;
            $quranTeacher->school_name = trim($request->school_name);
            $quranTeacher->account_no = $request->account_no;
            $quranTeacher->appointment_letter = $request->appointment_letter;
        
            // throw new Exception('Throw exception test'); //enable this to test exceptions
            if (!$quranTeacher->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }

            // return redirect('/branch/add/staff/'.$newcompany_id)->with('message','Branch Successfully Added');
            return redirect('/quran_teacher/list')->with('message','Quran Teacher Details Successfully Updated');
        }
        catch(Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuranTeacher  $quranTeacher
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $quranTeacher_data = QuranTeacher::where('id','=',$id)->first();
        return view('quran_teacher.view',compact('quranTeacher_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuranTeacher  $quranTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daerah = tbl_daerah::get();
		$quranTeacher_data = QuranTeacher::where('id','=',$id)->first();
        $mukim = [];

		if(!empty($quranTeacher_data)) {
			if(!empty($quranTeacher_data->daerahID)) {
				$mukim = tbl_mukim::where('daerahID', '=', $quranTeacher_data->daerahID)->get();
			}
		}
		return view('quran_teacher.edit')->with(['daerah' => $daerah,
                                                'quranTeacher_data' => $quranTeacher_data,
                                                'mukim' => $mukim]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuranTeacher  $quranTeacher
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
            'school_name' => 'nullable|string',
            'account_no' => 'nullable',    
            'appointment_letter' => 'nullable',
        ]);

            $quranTeacher = QuranTeacher::find($id);  
            $quranTeacher->name = trim($request->firstname);
            $quranTeacher->lastname = trim($request->lastname);
            $quranTeacher->no_ic = $request->no_ic;
            $quranTeacher->email = trim($request->email);
            $quranTeacher->mobile_no = $request->mobile_no;
            $quranTeacher->address = trim($request->address);
            $quranTeacher->daerahID = $request->daerah;
            $quranTeacher->mukimID = $request->mukim;
            $quranTeacher->school_name = trim($request->school_name);
            $quranTeacher->account_no = $request->account_no;
            $quranTeacher->appointment_letter = $request->appointment_letter;
        
            // throw new Exception('Throw exception test'); //enable this to test exceptions
            if (!$quranTeacher->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }
            return redirect('/quran_teacher/list')->with('message','Quran Teacher Details Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuranTeacher  $quranTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quranTeacher_data = QuranTeacher::where('id','=',$id)->delete();        //TODO: Buat soft_delete (https://laravel.com/docs/5.8/eloquent#soft-deleting)
        return redirect('/quran_teacher/list')->with('message','Successfully Deleted');
    }
}
