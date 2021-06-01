<?php
namespace App\Library\Services;


use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
  
class Facturation
{
  public function deposit($amount){
   

   $deposit = Transaction::create([
        'account_id' => Auth::user()->account->id,
        'isDebit' => 0,
        'amount' => $amount
    ]);

    $account = Account::find($deposit->account->id);
    $account->update(['balance' => $account->balance + $amount]);

    return [
      "error"=>0,
      "balance"=> $account->balance + $amount
    ];
}

public function withdraw($amount){
    
    $account=Auth::user()->account;
    if( $account->balance == 0){
       return [
        "error"=>1005,
        "message"=>"Votre compte est vide!",
        "balance"=> $account->balance
      ];
    }
    if( $amount > $account->balance ){
      return [
        "error"=>1007,
        "message"=>"Crédit en solde insuffisant!",
        "balance"=>$account->balance
      ];
   }

    $withdraw = Transaction::create([
        'account_id' =>  $account->id,
        'isDebit' => 1,
        'amount' => $amount
    ]);

    $account = Account::find( $account->id);
    $account->update(['balance' => $account->balance - $amount]);

    return [
      "error"=>0,
      "balance"=>$account->balance - $amount
    ];
   
}
}