<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->has('status')) $payments = Payment::with('currency')->get();
        else $payments = Payment::with('currency')->where('payment_status', $request->status)->get();
        return view('pages.payments.index', compact('payments'));
    }

    public function create()
    {
        $payments = Payment::all();
        $currencies = Currency::all();
        return view('pages.payments.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $client = new Client;

        // $response = $client->get('http://ipinfo.io/'.$request->getClientIp().'/geo');
        
        // $country = '-';
        // if ($response->getStatusCode() === 200) {
        //     $response = json_decode($response->getBody(), true);
        //     if (array_key_exists('country', $response)) {
        //         $country = $response['country'];
        //     }
        // }

        $payment = new Payment;
        $payment->amount = $request->input('amount');
        $payment->currency_id = $request->input('currency_id');
        $payment->payment_fee = 0;
        $payment->master_account_id = Auth::User()->master_account_id;
        $payment->payment_status = 'Succeeded';
        $payment->payment_number = $request->input('payment_number');
        $payment->payment_type = 'Visa credit card';
        $payment->payment_providers = 'GreateEPayments';
        $payment->payment_country_origin = 1;
        // $payment->cvc_check = $request->input('cvc_check');
        $payment->payment_ip = $request->getClientIp();
        $payment->payment_created_by = Auth::User()->id;
        // $payment->disputed = $request->input('disputed');
        // $payment->refunded = $request->input('refunded');

        $payment->description = $request->input('description');
        $payment->account_id = $request->input('account_id');
        // $payment->risk_evaluation = $request->input('risk_evaluation');
        $payment->fingerprint_number = Payment::randString(16);
        // $payment->account_addresses_id = $request->input('account_addresses_id');
        // $payment->failure_code = $request->input('failure_code');
        // $payment->failure_message = $request->input('failure_message');
        
        $payment->save();

        return back()->with(['action' => $request->action, 'payment' => $payment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::where('id', $id)->first();
        $payments = Payment::all();
        return view('pages.payments.show', compact('payment', 'payments'));
    }

    public function edit()
    {
        // $blog = Payment::where('id', $id)->first();
        // return view('pages.payments_edit', compact('payment'));
        // $payments = Payment::all();
        // return view('pages.payments_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      Payment::where('id', $id)->update($request->only(['account_name', 'account_email', 'account_description']));
      return redirect('payments/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
