<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Country;

class ConfigurationController extends Controller
{
    public function countSeats()
    {
        return Configuration::get('seats')->first()->seats;
    }

    public function show(Request $request)
    {
        $config = Configuration::get()->first();
        $countries = Country::get();

        if (!$request->session()->exists('config')) {
            $request->session()->put('config', $config);
        }

        return view('configuration', [
            'countries' => $countries,
        ]);
    }

    public function update(Request $request, Configuration $configuration)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'seats' => ['required', 'integer'],
            'countries' => ['required', 'string', 'max:255'],
        ]);

        $configuration->title = $validated['title'];
        $configuration->seats = $validated['seats'];
        $configuration->logo = $validated['countries'];
        $configuration->save();

        $request->session()->forget('config');

        return redirect('/configuration');
    }
}
