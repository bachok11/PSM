<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\MosqueCommittee;
use App\Hafiz;
use App\QuranTeacher;
use App\User;
 use Exception;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
        $appointment_data = Appointment::get();
		return view('appointment.list',compact('appointment_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mosque_data = MosqueCommittee::get();
        $hafiz_data = Hafiz::where('pass_test','=',0)->get();
        $quranTeacher_data = QuranTeacher::get();
        $tester_data = User::get();

        // return view('appointment.add');
        return view('appointment.add',compact('mosque_data','hafiz_data','quranTeacher_data','tester_data'));
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
            'hafiz_testee' => 'required',            
            'tester' => 'required',
            'start_time' => 'date',
            'test_type' => 'required',
        ]);

        // dd($request);

        try{
            $appointment = new Appointment;
            $appointment->id_reference = $request->hafiz_testee;
            $appointment->reference = Hafiz::$default_reference;
            $appointment->id_tester = $request->tester;
            $appointment->start_time = $request->start_time;
            $appointment->test_type = $request->test_type;
            $appointment->save();
        
            // if ( $appointment->save() ) 
            // {
            //     $type_test = $appointment->type_test;
            //     $hafiz_data = new Hafiz;
            //     $hafiz_data->id_juzuk = $type_test;
            //     $hafiz_data->save();
            // }
            
            return redirect('/appointment/list')->with('message','Appointment Details Successfully Updated');
        }
        catch(Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $appointment_data = Appointment::where('id','=',$id)->first();
        return view('appointment.view',compact('appointment_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
