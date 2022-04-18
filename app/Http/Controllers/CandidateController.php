<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Candidate;

class CandidateController extends Controller
{
    private function calculateSeats()
    {
        $candidates = Candidate::get();

        foreach ($candidates as $item) {
            $item->seats = round(($item->votes / Candidate::sum('votes')) * Configuration::first()->seats);
            $item->save();
        }
    }

    public function countVotes()
    {
        return Candidate::get()->sum('votes');
    }

    public function countCandidates()
    {
        return Candidate::count();
    }

    public function candidates()
    {
        return Candidate::orderBy('votes', 'DESC')->orderBy('seats', 'DESC')->get();
    }

    public function candidate(Candidate $candidate)
    {
        return $candidate;
    }

    public function candidatesSeats()
    {
        return Candidate::where('seats', '>', '0')->orderBy('votes', 'DESC')->orderBy('seats', 'DESC')->get();
    }

    public function show()
    {
        return view('candidates.show');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'party' => ['required', 'string', 'max:255'],
            'ideology' => ['required', 'string', 'max:255'],
            'campaign' => ['required'],
            'color' => ['required', 'string', 'max:255'],
        ]);

        $candidate = new Candidate();
        $candidate->name = $request->name;
        $candidate->party = $request->party;
        $candidate->ideology = $request->ideology;
        $candidate->campaign = $request->campaign;
        $candidate->color = $request->color;
        $candidate->save();
    }

    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'party' => ['required', 'string', 'max:255'],
            'ideology' => ['required', 'string', 'max:255'],
            'campaign' => ['required'],
            'color' => ['required', 'string', 'max:255'],
        ]);

        $candidate->name = $request->name;
        $candidate->party = $request->party;
        $candidate->ideology = $request->ideology;
        $candidate->campaign = $request->campaign;
        $candidate->color = $request->color;
        $candidate->save();
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
    }

    public function vote()
    {
        return view('vote', [
            'candidates' => Candidate::orderBy('votes', 'DESC')->orderBy('seats', 'DESC')->get(),
        ]);
    }

    public function votes(Candidate $candidate)
    {
        $candidate->votes = $candidate->votes + 1;
        $candidate->save();

        $this->calculateSeats();

        return redirect('voted');
    }

    public function voted()
    {
        return view('voted');
    }

    public function results()
    {
        return view('results');
    }

    public function restartVotes()
    {
        $candidates = Candidate::get();

        foreach ($candidates as $item) {
            $item->votes = 0;
            $item->seats = 0;
            $item->save();
        }
    }

    public function pactometer()
    {
        return view('pactometer');
    }

    public function updatePosition(Request $request, Candidate $candidate)
    {
        $request->validate([
            'position' => ['required', 'string', 'max:255']
        ]);

        $candidate->position = $request->position;
        $candidate->save();
    }

    public function sumVotes(Candidate $candidate)
    {
        $candidate->votes = $candidate->votes + 1;
        $candidate->save();

        $this->calculateSeats();
    }

    public function substractVotes(Candidate $candidate)
    {
        if ($candidate->votes > 0) {
            $candidate->votes = $candidate->votes - 1;
            $candidate->save();

            $this->calculateSeats();
        }
    }

    public function votesYes()
    {
        return Candidate::where('position', 'yes')->sum('seats');
    }

    public function votesNo()
    {
        return Candidate::where('position', 'no')->sum('seats');
    }

    public function votesAbstention()
    {
        return Candidate::where('position', 'abstention')->sum('seats');
    }
}
