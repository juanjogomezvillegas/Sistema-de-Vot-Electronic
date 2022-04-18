<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'date_event' => ['required'],
            'time_event' => ['required'],
            'government' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255']
        ]);

        $history = new History();
        $history->date_event = $request->date_event;
        $history->time_event = $request->time_event;
        $history->name_event = $request->name_event;
        $history->government = $request->government;
        $history->color = $request->color;
        $history->save();
    }

    public function update(Request $request, History $history)
    {
        $request->validate([
            'government' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255']
        ]);

        $history->name_event = $request->name_event;
        $history->government = $request->government;
        $history->color = $request->color;
        $history->save();
    }

    public function delete(History $history)
    {
        return $history->delete();
    }

    public function histories()
    {
        return History::orderBy('date_event', 'DESC')->orderBy('time_event', 'DESC')->get();
    }

    public function dataHistory(History $history)
    {
        return $history;
    }

    public function dataHistoryLast(History $history)
    {
        if (History::count() > 0) {
            return $history->orderBy('date_event', 'DESC')->orderBy('time_event', 'DESC')->first();
        } else {
            $histories = [
                'date_event' => '',
                'time_event' => '',
                'name_event' => '',
                'government' => '',
                'color' => '#000000'
            ];

            return $histories;
        }
    }
}
