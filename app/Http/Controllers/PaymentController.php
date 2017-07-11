<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    protected $payment;

    public function __construct()
    {
        $this->payment = new \App\UserPayment;
    }

    public function index()
    {
        $data['payments'] = $this->payment->all()->toArray();
        return view('user.payments.home',$data);
    }
}
