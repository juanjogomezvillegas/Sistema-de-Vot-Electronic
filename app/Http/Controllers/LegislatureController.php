<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Legislature;

class LegislatureController extends Controller
{
    /**
     * Returns list legislatures
     *
     * @return Object
     * **/
    public function legislatures()
    {
        return Legislature::orderBy('begin', 'DESC')->get();
    }

    /**
     * Returns data legislature
     *
     * @param Legislature $legislature data legislature
     * @return Object
     * **/
    public function legislature(Legislature $legislature)
    {
        return $legislature;
    }

    /**
     * Returns data last legislature
     *
     * @return Object
     * **/
    public function lastLegislature()
    {
        if (Legislature::count() == 0) {
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

    /**
     * Returns view legislatures.show
     *
     * @return Response|ResponseFactory
     * **/
    public function show()
    {
        return view('legislatures.show');
    }

    /**
     * Create a new legislature
     *
     * @param Request $request request param received
     * **/
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

    /**
     * Update a legislature
     *
     * @param Request $request request param received
     * @param Legislature $legislature data legislature
     * **/
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

    /**
     * Delete a legislature
     *
     * @param Legislature $legislature data legislature
     * **/
    public function destroy(Legislature $legislature)
    {
        $legislature->delete();
    }
}
