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
     * @return Int
     * **/
    public function countSeats()
    {
        return Configuration::first()->seats;
    }

    /**
     * Returns view configuration
     *
     * @return Response|ResponseFactory
     * **/
    public function show()
    {
        $allowElection = Configuration::first()->allowElection;
        $countries = Country::get();

        return view('configuration', [
            'allowElection' => $allowElection,
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

        if ($request->allowElection) {
            $validated['allowElection'] = true;
        } else {
            $validated['allowElection'] = false;
        }

        $configuration->title = $validated['title'];
        $configuration->seats = $validated['seats'];
        $configuration->logo = $validated['countries'];
        $configuration->allowElection = $validated['allowElection'];
        $configuration->save();

        $request->session()->forget('config');

        return redirect('/configuration');
    }
}
