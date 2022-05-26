<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Candidate;

class HomeController extends Controller
{
    /**
     * Returns view index
     *
     * @return Response|ResponseFactory
     * **/
    public function index()
    {
        $allowElection = Configuration::first()->allowElection;

        return view('index', [
            'allowElection' => $allowElection,
            'candidates' => Candidate::orderBy('votes', 'DESC')->orderBy('seats', 'DESC')->get(),
        ]);
    }

    /**
     * Returns view dashboard
     *
     * @return Response|ResponseFactory
     * **/
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Returns redirect / and session flush
     *
     * @return Response|ResponseFactory
     * **/
    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}
