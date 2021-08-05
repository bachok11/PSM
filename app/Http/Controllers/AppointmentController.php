<?php

namespace App\Http\Controllers;

use App\Mail\AdminAppointmentNotificationMail;
use App\Mail\UserAppointmentNotificationMail;
use Carbon\Carbon;
use App\Appointment;
use App\MosqueCommittee;
use App\Hafiz;
use App\QuranTeacher;
use App\User;
use App\Exam;
use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        
        $appointment_data = Appointment::where([['pass_test', 0],['id_tester',Auth::user()->id]])->get();


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
        // $mosque_data = MosqueCommittee::where('pass_test', '=', 0)->get();
        // $hafiz_data = Hafiz::where('pass_test', '=', 0)->get();
        // $quranTeacher_data = QuranTeacher::where('pass_test', '=', 0)->get();
        $volunteers_data = User::where([['pass_test', 0],['role_id','>',4]])->get();
        $examiner_data = User::where('role_id','1')
                            ->orWhere('role_id','2')
                            ->get();
        $exam_data = Exam::get();

        return view('appointment.add', compact('volunteers_data', 'examiner_data', 'exam_data'));
        // return view('appointment.add', compact('volunteers_data', 'examiner_data'));
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
            'volunteer' => 'required',
            'examiner' => 'required',
            'start_time' => 'date',
            'type_exam' => 'required',
        ]);

        try {
            $appointment = new Appointment;
            $appointment->id_reference = $request->volunteer;
            $appointment->reference = Appointment::$string_reference;
            $appointment->id_tester = $request->examiner;
            $appointment->start_time = $request->start_time;
            $appointment->test_type = $request->type_exam;
            $appointment->pass_test = Appointment::$default_pass_test;
            $appointment->save();

            $email_testee = User::where('id',$appointment->id_reference)->select('email')->first();

            $email_admin = User::whereHas('roles', function ($query) {
                $query->where('role_name', '=', 'Super Admin');
            })
                ->orwhereHas('roles', function ($query) {
                    $query->where('role_name', '=', 'Admin');
                })
                ->get('email');

            $data = array(
                'name' => getUserName($appointment->id_reference),
                'email' => $appointment->email,
                'password' => $appointment->password,
            );

            Mail::to($email_admin)->send(new AdminAppointmentNotificationMail($data));
            Mail::to($email_testee)->send(new UserAppointmentNotificationMail($data));
            
            return redirect('/appointment/list')->with('message', 'Appointment Details Successfully Updated');
            
            // dd('olla');
        } catch (Exception $e) {
            // dd($e);
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
        $user_data = User::where('id', '=', $id)->first();

        return view('appointment.view', compact('appointment_data','user_data'));
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
        $user_data = User::where('id', '=', $appointment_data->id_reference)->first();
        // dd($user_data);

        // return view('hafiz.edit')->with(['daerah' => $daerah,
        //                                         'hafiz_data' => $hafiz_data,
        //                                         'mukim' => $mukim]);
        return view('appointment.edit', compact('appointment_data', 'user_data'));
    }

    public function edit_failed($id)
    {
        $appointment_data = Appointment::where('id', '=', $id)->first();
        $user_data = User::where('id', '=', $appointment_data->id_reference)->first();
        // dd($user_data);

        // return view('hafiz.edit')->with(['daerah' => $daerah,
        //                                         'hafiz_data' => $hafiz_data,
        //                                         'mukim' => $mukim]);
        return view('appointment.edit_failed', compact('appointment_data', 'user_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update_failed(Request $request, $id)
    {
        $this->validate($request, [
            'start_time' => 'date',
            'comment_exam' => 'required',
        ]);

        try {
            $appointment = Appointment::find($id);
            $appointment->start_time = $request->start_time;
            $appointment->pass_test = -1;
            $appointment->comment = $request->comment_exam;
            $appointment->finish_time = Carbon::now();
            $appointment->save();


            return redirect('/appointment/list')->with('message', 'Appointment Details Successfully Updated');

        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'start_time' => 'date',
        ]);

        try {
            $appointment = Appointment::find($id);
            $appointment->start_time = $request->start_time;
            $appointment->save();

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
        // $appointment_data = Appointment::where('id', '=', $id);
        $appointment_data = Appointment::find($id);
        $appointment_data->pass_test = -1;
        $appointment_data->save();

        return redirect('/appointment/list')->with('message', 'Successfully Deleted');
    }

    public function approveTest($id)
    {
        $appointment_data = Appointment::findOrFail($id);
        $appointment_data2 = Appointment::where('id', '=', $id)->select('id_reference')->first();
        $user_data = User::findOrFail($appointment_data2)->first();

        $appointment_data->pass_test = 1;
        $user_data->pass_test = 1;
        $appointment_data->finish_time = Carbon::now();

        $appointment_data->save();
        $user_data->save();

        return redirect('/appointment/list')->with('message', 'Successfully Pass the Testee');
    }
}
