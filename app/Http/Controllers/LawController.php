<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Law;

class LawController extends Controller
{
    public function countLaws()
    {
        return Law::count();
    }

    public function laws()
    {
        return Law::orderBy('type', 'ASC')->orderBy('sector', 'ASC')->get();
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sector' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        $law = new Law();
        $law->name = $request->name;
        $law->sector = $request->sector;
        $law->type = $request->type;
        $law->save();
    }

    public function delete(Law $law)
    {
        $law->delete();
    }
}
