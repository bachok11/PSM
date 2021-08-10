<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PaymentNotificationMail;
use Illuminate\Support\Facades\Mail;
use App\MosqueCommittee;
use App\QuranTeacher;
use App\Hafiz;
use App\User;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Exception;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mosque_data = MosqueCommittee::where([['role_id', 5], ['pass_test', 1], ['is_paid', '=', 0]])
            ->orWhere([['role_id', 6], ['pass_test', 1], ['is_paid', '=', 0]])
            ->orWhere([['role_id', 7], ['pass_test', 1], ['is_paid', '=', 0]])
            ->get();

            

        return view('payment.list', compact('mosque_data'));
    }

    public function index_quran()
    {
        $quranTeacher_data = QuranTeacher::where([['role_id', 8], ['pass_test', 1], ['is_paid', '=', 0]])
            ->get();
            // dd($quranTeacher_data);

        return view('payment.list_quran', compact('quranTeacher_data'));
    }

    public function index_hafiz()
    {
        $hafiz_data = Hafiz::where([['role_id', 9], ['pass_test', 1], ['is_paid', '=', 0]])
            ->get();

        return view('payment.list_hafiz', compact('hafiz_data'));
    }

    public function stripe($id)
    {
        $user_data = User::where('id', '=', $id)
            ->first();

        return view('/stripe/stripe')->with(['user_data' => $user_data,]);
    }

    public function stripePost(Request $request, $id)
    {
        $user = User::find($id);
        $user->is_paid = 1;
        $email_volunteer_paid = $user->email;
        $user->save();

        $data = array(
            'name' => $user->name,
            'email' => $user->email,
        );

        Mail::to($email_volunteer_paid)->send(new PaymentNotificationMail($data));

        if (!$user->save()) {
            throw new Exception("Could not save data, Please contact us if it happens again.");
        }
        return redirect('/payment/list')->with('message', 'Payment has made successfully!');
    }
}
