<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Configuration;
use App\Models\Candidate;

class PageController extends Controller
{
    public function showHistory()
    {
        return view('history.showHistory');
    }

    public function showInstitutions()
    {
        return view('institutions.showInstitutions');
    }

    public function showLaws()
    {
        return view('laws.showLaws');
    }




}
