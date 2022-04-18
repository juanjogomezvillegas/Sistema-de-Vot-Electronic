<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    public function countSeats()
    {
        return Configuration::get('seats')->first()->seats;
    }

    public function show(Request $request)
    {
        $config = Configuration::get()->first();

        if (!$request->session()->exists('config')) {
            $request->session()->put('config', $config);
        }

        return view('configuration');
    }

    public function update(Request $request, Configuration $configuration)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'seats' => ['required', 'integer'],
        ]);

        $configuration->title = $request->title;
        $configuration->seats = $request->seats;
        $configuration->save();

        $request->session()->forget('config');

        return redirect('/configuration');
    }
}
