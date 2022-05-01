<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Legislature;

class LegislatureController extends Controller
{
    public function legislatures()
    {
        return Legislature::orderBy('begin', 'DESC')->get();
    }

    public function legislature(Legislature $legislature)
    {
        return $legislature;
    }

    public function lastLegislature()
    {
        if (Legislature::orderBy('begin', 'DESC')->count() == 0) {
            $object = [
                'number' => '',
                'election' => '',
                'begin' => '',
                'end' => '',
                'president'=> '',
                'vicepresident' => '',
                'party' => '',
                'government' => '',
                'color' => '',
                'headofstate' => '',
            ];

            return $object;
        } else {
            return Legislature::orderBy('begin', 'DESC')->first();
        }
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
            'headofstate' => ['required', 'string', 'max:255'],
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
        $legislature->headofstate = $validated['headofstate'];
        $legislature->save();
    }

    public function update(Request $request, Legislature $legislature)
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
            'headofstate' => ['required', 'string', 'max:255'],
        ]);

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
        $legislature->headofstate = $validated['headofstate'];
        $legislature->save();
    }

    public function destroy(Legislature $legislature)
    {
        $legislature->delete();
    }
}
