<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoyantController extends Controller
{
    public function create()
    {
        return view('voyant.create');
    }
}
