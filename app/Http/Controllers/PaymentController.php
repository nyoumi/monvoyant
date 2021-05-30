<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


use Stripe;
use Session;

class PaymentController extends Controller
{

    public function index()
    {
        return view('payments.index');
    }
  
    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 300 * 100,
                "currency" => "EUR",
                "source" => $request->stripeToken,
                "description" => "Souscription au pack 1" 
        ]);

        $deposit = Transaction::create([
            'account_id' => Auth::user()->account->id,
            'isDebit' => 0,
            'amount' => 300
        ]);

        $account = Account::find($deposit->account->id);
        $account->update(['balance' => $account->balance + 300]);

  
        Session::flash('success', 'Paiement de 300 Euros  effectué avec succès!');
        return Redirect::to('dashboard');

    }
}