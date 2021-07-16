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
        $appointment_data = Appointment::where('pass_test', '=', 0)->get()->toArray();
        // dd($appointment_data);
        return view('appointment.list', compact('appointment_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mosque_data = MosqueCommittee::get();
        $hafiz_data = Hafiz::where('pass_test', '=', 0)->get();
        $quranTeacher_data = QuranTeacher::get();
        $tester_data = User::get();

        // return view('appointment.add');
        return view('appointment.add', compact('mosque_data', 'hafiz_data', 'quranTeacher_data', 'tester_data'));
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


        try {
            $appointment = new Appointment;
            $appointment->id_reference = $request->hafiz_testee;
            $appointment->reference = Hafiz::$default_reference;
            $appointment->id_tester = $request->tester;
            $appointment->start_time = $request->start_time;
            $appointment->test_type = $request->test_type;
            $appointment->pass_test = Appointment::$default_pass_test;
            // dd($appointment);

            if (!$appointment->save()) { // save() returns a boolean
                throw new Exception("Could not save data, Please contact us if it happens again.");
            }
            return redirect('/appointment/list')->with('message', 'Appointment Details Successfully Updated');
        } catch (Exception $e) {
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
        $appointment_data = Appointment::where('id', '=', $id)->first();
        $hafiz_data = Hafiz::where('id', '=', $id)->first();

        return view('appointment.view', compact('appointment_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment_data = Appointment::where('id', '=', $id)->first();
        $hafiz_data = Hafiz::where('id', '=', $id)->first();

        // return view('hafiz.edit')->with(['daerah' => $daerah,
        //                                         'hafiz_data' => $hafiz_data,
        //                                         'mukim' => $mukim]);
        return view('appointment.edit', compact('appointment_data', 'hafiz_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hafiz_testee' => 'required',
            'tester' => 'required',
            'start_time' => 'date',
            'test_type' => 'required',
        ]);

        try {
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

            return redirect('/appointment/list')->with('message', 'Appointment Details Successfully Updated');
        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment_data = Appointment::where('id', '=', $id)->delete();        //TODO: Buat soft_delete (https://laravel.com/docs/5.8/eloquent#soft-deleting)
        return redirect('/appointment_data/list')->with('message', 'Successfully Deleted');
    }

    public function approveTest($id)
    {
        $appointment_data = Appointment::findOrFail($id);
        $appointment_data2 = Appointment::where('id', '=', $id)->select('id_reference')->first();
        $hafiz_data = Hafiz::findOrFail($appointment_data2)->first();

        $appointment_data->pass_test = 1;
        $hafiz_data->pass_test = 1;

        $appointment_data->save();
        $hafiz_data->save();

        return redirect('/appointment_data/list')->with('message', 'Successfully Pass the Testee');
    }
}
