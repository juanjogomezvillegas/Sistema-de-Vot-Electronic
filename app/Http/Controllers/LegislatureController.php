<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegislatureController extends Controller
{
    public function show()
    {
        return view('legislatures.show');
    }
}
