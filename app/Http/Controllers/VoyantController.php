<?php

namespace App\Http\Controllers\VoyantController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoyantController extends Controller
{
    public function create()
    {
        return view('voyants.create');
    }
}
