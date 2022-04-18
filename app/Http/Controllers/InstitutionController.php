<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;

class InstitutionController extends Controller
{
    public function countInstitutions()
    {
        return Institution::count();
    }

    public function institutions()
    {
        return Institution::orderBy('location', 'ASC')->orderBy('sector', 'ASC')->get();
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sector' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
        ]);

        $institution = new Institution();
        $institution->name = $request->name;
        $institution->sector = $request->sector;
        $institution->location = $request->location;
        $institution->save();
    }

    public function delete(Institution $institution)
    {
        $institution->delete();
    }
}
