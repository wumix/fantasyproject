<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Input;

class MembershipController extends HomeController
{
    private $_api_context;

    public function __construct()
    {
        parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    function index($isPopup = false)
    {

        $data['membership_plans'] = \App\Membership::all();
        return $isPopup ? view('user.memberships.member_popup', $data) : view('user.memberships.home', $data);
    }

    function subscribeMembership(Request $request, $id)
    {
        $this->postPaymentWithpaypal($request);

        $membership = \App\Membership::where('id', $id)->first()->toArray();

        // echo strtotime(getGmtTime());
        $end_date = date('Y-m-d h:i:s', strtotime('+1 years'));
//        die;
//        dd( $membership['start_date']);
        // dd($membership);
        $request->request->remove("_token");
        //  dd($request->all());

        //  $user_memberhsip=\App\User::where('id','317')->with('membership')->get()->toArray();
        // $user_memberhsip->sy
        $user_memberhsip = \App\User::find('317');
        $user_memberhsip->membership()->attach($membership['id'], [
            'end_date' => $end_date, 'start_date' => getGmtTime()]);
        $request->request->add(['amount' => $membership['price']]);


    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        dd($request->plan_id);
        $id=$request->plan_id;
        $user_memberhsip = \App\User::where('id', $id)->with('membership')->get()->toArray();
        $membership = \App\Membership::where('id', $id)->first()->toArray();
        // dd($membership);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName("Gamithon " . $membership['name'] . " Membership")/** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));
        /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Membership Purchase Gamithon');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))/** Specify return URL **/
        ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/

        try {
            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('membersip_id', $id);

        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $membership_id = Session::get('membersip_id');
        //dd($payment_id);

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);


        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
            $result = $result->toArray();
            //dd($result);
            $payment_detail = [];
            $payment_detail['paypal_payment_id'] = $result['id'];
            $payment_detail['intent'] = $result['intent'];
            $payment_detail['amount'] = $result['transactions'][0]['item_list']['items'][0]['price'];
            $payment_detail['currency'] = $result['transactions'][0]['item_list']['items'][0]['currency'];
            $payment_detail['description'] = $result['transactions'][0]['item_list']['items'][0]['name'];
            $payment_detail['merchant_id'] = $result['transactions'][0]['payee']['merchant_id'];
            $payment_detail['email'] = $result['transactions'][0]['payee']['email'];
            $payment_detail['user_id'] = \Auth::id();
            $payment_detail['date'] = getGmtTime();
            //  dd($payment_detail);
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            $user_memberhsip = \App\User::find(\Auth::id());
            $end_date = date('Y-m-d h:i:s', strtotime('+1 years'));
            $user_memberhsip->membership()->attach($membership_id, [
                'end_date' => $end_date, 'start_date' => getGmtTime()]);
            $payment = new \App\UserPayment;
            $payment->fill($payment_detail);
            $payment->save();
            \Session::put('success', 'Payment success');
            //dd('end here');
            return Redirect::route('userdashboard');
        }
        \Session::put('error', 'Payment failed');

        return Redirect::route('paywithpaypal');
    }

    public function memberShipPopup()
    {
        return $this->index(true);
    }
}
