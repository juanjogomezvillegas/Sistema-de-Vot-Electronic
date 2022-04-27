<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'candidates' => Candidate::orderBy('votes', 'DESC')->orderBy('seats', 'DESC')->get(),
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}
