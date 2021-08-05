<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PaymentNotificationMail;
use Illuminate\Support\Facades\Mail;
use App\MosqueCommittee;
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

    public function stripe($id)
    {
        $mosqueCommittee_data = MosqueCommittee::where('id', '=', $id)
            ->first();

        return view('/stripe/stripe')->with(['mosqueCommittee_data' => $mosqueCommittee_data,]);
    }

    public function stripePost(Request $request, $id)
    {
        $mosqueCommittee = MosqueCommittee::find($id);
        $mosqueCommittee->is_paid = 1;
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
        );

        Mail::to($email_admin)->send(new PaymentNotificationMail($data));

        if (!$mosqueCommittee->save()) {
            throw new Exception("Could not save data, Please contact us if it happens again.");
        }
        return redirect('/payment/list')->with('message', 'Payment has made successfully!');
    }
}
