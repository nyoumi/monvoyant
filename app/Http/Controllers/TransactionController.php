<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function initDeposit(){
        return view('deposit');
    }

    public function initWithdraw(){
        return view('withdraw');
    }

    public function deposit(Request $request){
        $request->validate([
            'amount' => 'required',
        ]);

       $deposit = Transaction::create([
            'account_id' => Auth::user()->account->id,
            'isDebit' => 1,
            'amount' => $request->get('amount')
        ]);

        $account = Account::find($deposit->account->id);
        $account->update(['balance' => $account->balance + $request->get('amount')]);

        return redirect('dashboard')->with('success');
    }

    public function withdraw(Request $request){
        $request->validate([
            'amount' => 'required',
        ]);

        if(Auth::user()->account->balance == 0){
           return redirect('/init-withdraw')->withErrors('Your balance is 0. You can\'t withdraw');
        }

        $deposit = Transaction::create([
            'account_id' => Auth::user()->account->id,
            'isDebit' => 0,
            'amount' => $request->get('amount')
        ]);

        $account = Account::find($deposit->account->id);
        $account->update(['balance' => $account->balance - $request->get('amount')]);

        return redirect('dashboard')->with('success');
    }
}
