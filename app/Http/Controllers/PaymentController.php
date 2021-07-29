<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MosqueCommittee;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function index()
    {
        $mosque_data = MosqueCommittee::where('is_paid','=',0)->get();
        // return view('payment.list');
        return view('payment.list',compact('mosque_data'));

    }


    public function pay(Request $request)
    {
        Stripe::setApiKey('sk_test_51JIEUlL9sCoZ7ikA1QcDajfemLL61mX7EK7sLqN8mbiwPDpKlx8ostXlNrjMdpXwn2aPCdDBxuH4DjIcVwuqeQWs00Hb5hU7Wk');

        $token = request('stripeToken');

        $charge = Charge::create([
            'amount' => 1000,
            'currency' => 'myr',
            'description' => 'Testing',
            'source' => $token,
        ]);

        return 'Payment Success!';
    }
}