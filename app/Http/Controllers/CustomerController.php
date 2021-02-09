<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountAddress;
use App\Models\AccountTaxId;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Account::all();
        return view('pages.customers.index', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $customer = $request->input();

        // print_r($customer);

        if ($request->input('account_country')) {
            $account_address = new AccountAddress;
            $account_address->country_id = $request->input('account_country');
            $account_address->account_street_address_1 = $request->input('account_street_address_1');
            $account_address->account_street_address_2 = $request->input('account_street_address_2');
            $account_address->account_country = $request->input('account_country');
            $account_address->account_city = $request->input('account_city');
            $account_address->account_postal_code = $request->input('account_postal_code');
            $account_address->save();
        }

        $country_id = $request->input('account_country');
        $get_account_address = AccountAddress::where('country_id', $country_id)->first();
        $user_id = Auth::User()->id;

        $account = new Account;
        $account->account_name = $request->input('account_name');
        $account->account_email = $request->input('account_email');
        $account->account_description = $request->input('account_description');
        $account->account_billing_address_id = $get_account_address['id'];
        $account->account_shipping_address_id = 0;
        $account->timezone_id = 0;
        $account->invoice_prefix = 0;
        $account->next_invoice_sequence = 0;
        $account->tax_status = $request->input('tax_status');
        $account->account_status = 'none';
        $account->master_account_id = $user_id;
        $account->save();

        $account_email = $request->input('account_email');
        $get_account = Account::where('account_email', $account_email)->first();

        for ($i = 1; $i < 11; $i++) {
            if ($request->input('tax_id' . $i) == "") {
                break;
            } else {
                $account_tax = new AccountTaxId;
                $account_tax->account_id = $get_account['id'];
                $account_tax->country_id = 0;
                $account_tax->tax_account_number = $request->input('tax_account_number' . $i);
                $account_tax->save();
            }
        }

        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Account::where('id', $id)->first();
        $taxids = AccountTaxId::where('account_id', $customer->id)->get();
        return view('pages.customers.show', compact('customer'), compact('taxids'));
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
        Account::where('id', $id)->update($request->only(['account_name', 'account_email', 'account_description']));
        return redirect('customers/' . $id);
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
