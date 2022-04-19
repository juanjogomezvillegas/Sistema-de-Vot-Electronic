<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Legislature;

class LegislatureController extends Controller
{
    public function legislatures()
    {
        return Legislature::get();
    }

    public function legislature(Legislature $legislature)
    {
        return $legislature;
    }

    public function show()
    {
        return view('legislatures.show');
    }
}
