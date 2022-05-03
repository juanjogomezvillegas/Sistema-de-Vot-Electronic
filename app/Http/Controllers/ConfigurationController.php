<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Country;

class ConfigurationController extends Controller
{
    /**
     * Returns number of seats
     *
     * @return Integer
     * **/
    public function countSeats()
    {
        return Configuration::get('seats')->first()->seats;
    }

    /**
     * Returns view configuration
     *
     * @param Request $request request param received
     * @return Response|ResponseFactory
     * **/
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

    /**
     * Update a configuration and returns redirect /configuration
     *
     * @param Request $request request param received
     * @param Configuration $configuration data configuration
     * @return Response|ResponseFactorys
     * **/
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
