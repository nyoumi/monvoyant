<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $accountUser = $user->account;
        //$accountUser = "djdjjdjdjdjdjdj";


        //return view('dashboard', compact('accountUser'));
        return View::make('dashboard')
        ->with('accountUser', $accountUser);  
    }
}
