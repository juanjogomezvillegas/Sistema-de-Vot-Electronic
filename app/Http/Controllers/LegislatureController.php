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

    public function create(Request $request)
    {
        $validated = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'election' => ['max:255'],
            'begin' => ['required', 'string', 'max:255'],
            'end' => ['max:255'],
            'president' => ['required', 'string', 'max:255'],
            'vicepresident' => ['required', 'string', 'max:255'],
            'party' => ['required', 'string', 'max:255'],
            'government' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
        ]);

        $legislature = new Legislature();
        $legislature->number = $validated['number'];
        if (!is_null($validated['election'])) {
            $legislature->election = $validated['election'];
        }
        $legislature->begin = $validated['begin'];
        if (!is_null($validated['end'])) {
            $legislature->end = $validated['end'];
        }
        $legislature->president = $validated['president'];
        $legislature->vicepresident = $validated['vicepresident'];
        $legislature->party = $validated['party'];
        $legislature->government = $validated['government'];
        $legislature->color = $validated['color'];
        $legislature->save();
    }

    public function update(Request $request, Legislature $legislature)
    {
        /*$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();*/
    }

    public function destroy(Legislature $legislature)
    {
        $legislature->delete();
    }
}
