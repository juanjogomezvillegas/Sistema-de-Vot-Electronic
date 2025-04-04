<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Candidate;

class ElectoralMethod
{
    public function __construct()
    {
    }

    /**
     * Calculate seats with method d'hondt
     * **/
    public function hondt($votes, $total_seats)
    {
        $seats = array_fill(0, count($votes), 0);

        for ($i = 0; $i < $total_seats; $i++) {
            $quot = [];
            for ($j = 0; $j < count($votes); $j++) {
                $quot[$j] = $votes[$j] / ($seats[$j] + 1);
            }
            $i_max = array_keys($quot, max($quot))[0];
            $seats[$i_max]++;
        }

        return $seats;
    }
}

class CandidateController extends Controller
{
    /**
     * Calculate seats of with candidate
     * **/
    private function calculateSeats()
    {
        $methods = new \App\Http\Controllers\ElectoralMethod();
        $candidates = Candidate::orderBy('votes', 'DESC')->get();
        $candidates_votes = [];

        $i = 0;
        foreach ($candidates as $item) {
            $candidates_votes[$i] = $item->votes;
            $i++;
        }

        $candidates_seats = $methods->hondt($candidates_votes,Configuration::first()->seats);

        $i = 0;
        foreach ($candidates as $item) {
            $item->seats = $candidates_seats[$i];
            $i++;
            $item->save();
        }
    }

    /**
     * Returns count votes candidates
     *
     * @return Int
     * **/
    public function countVotes()
    {
        return Candidate::sum('votes');
    }

    /**
     * Returns count candidates
     *
     * @return Int
     * **/
    public function countCandidates()
    {
        return Candidate::count();
    }

    /**
     * Returns list candidates
     *
     * @return Object
     * **/
    public function candidates()
    {
        return Candidate::orderBy('votes', 'DESC')->orderBy('seats', 'DESC')->get();
    }

    /**
     * Returns data candidate
     *
     * @param Candidate $candidate data candidate
     * @return Object
     * **/
    public function candidate(Candidate $candidate)
    {
        return $candidate;
    }

    /**
     * Returns list candidates
     *
     * @return Object
     * **/
    public function candidatesSeats()
    {
        return Candidate::where('seats', '>', '0')->orderBy('votes', 'DESC')->orderBy('seats', 'DESC')->get();
    }

    /**
     * Returns view candidates.show
     *
     * @return Response|ResponseFactory
     * **/
    public function show()
    {
        return view('candidates.show');
    }

    /**
     * Create a new candidate
     *
     * @param Request $request request param received
     * **/
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'party' => ['required', 'string', 'max:255'],
            'ideology' => ['required', 'string', 'max:255'],
            'campaign' => ['required'],
            'color' => ['required', 'string', 'max:255'],
        ]);

        $candidate = new Candidate();
        $candidate->name = $validated['name'];
        $candidate->party = $validated['party'];
        $candidate->ideology = $validated['ideology'];
        $candidate->campaign = $validated['campaign'];
        $candidate->color = $validated['color'];
        $candidate->save();
    }

    /**
     * Update a candidate
     *
     * @param Request $request request param received
     * @param Candidate $candidate data candidate
     * **/
    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'party' => ['required', 'string', 'max:255'],
            'ideology' => ['required', 'string', 'max:255'],
            'campaign' => ['required'],
            'color' => ['required', 'string', 'max:255'],
        ]);

        $candidate->name = $validated['name'];
        $candidate->party = $validated['party'];
        $candidate->ideology = $validated['ideology'];
        $candidate->campaign = $validated['campaign'];
        $candidate->color = $validated['color'];
        $candidate->save();
    }

    /**
     * Delete a candidate
     *
     * @param Candidate $candidate data candidate
     * **/
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
    }

    /**
     * Returns redirect voted
     *
     * @param Candidate $candidate data candidate
     * @return Response|ResponseFactory
     * **/
    public function votes(Candidate $candidate)
    {
        $candidate->votes = $candidate->votes + 1;
        $candidate->save();

        $this->calculateSeats();

        return redirect('voted');
    }

    /**
     * Returns view voted
     *
     * @return Response|ResponseFactory
     * **/
    public function voted()
    {
        return view('voted');
    }

    /**
     * Returns view results
     *
     * @return Response|ResponseFactory
     * **/
    public function results()
    {
        return view('results');
    }

    /**
     * Restart votes all candidates
     * **/
    public function restartVotes()
    {
        $candidates = Candidate::get();

        foreach ($candidates as $item) {
            $item->votes = 0;
            $item->seats = 0;
            $item->save();
        }
    }

    /**
     * Update votes of candidate
     *
     * @param Request $request request param received
     * @param Candidate $candidate data candidate
     * **/
    public function updateVotes(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'votes' => ['required', 'integer'],
        ]);

        $candidate->votes = $validated['votes'];
        $candidate->save();

        $this->calculateSeats();
    }

    /**
     * Returns view pactometer
     *
     * @return Response|ResponseFactory
     * **/
    public function pactometer()
    {
        return view('pactometer');
    }

    /**
     * Update position of candidate
     *
     * @param Request $request request param received
     * @param Candidate $candidate data candidate
     * **/
    public function updatePosition(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'position' => ['required', 'string', 'max:255']
        ]);

        $candidate->position = $validated['position'];
        $candidate->save();
    }

    /**
     * Returns count seats yes
     *
     * @return Int
     * **/
    public function votesYes()
    {
        return Candidate::where('position', 'yes')->sum('seats');
    }

    /**
     * Returns count seats no
     *
     * @return Int
     * **/
    public function votesNo()
    {
        return Candidate::where('position', 'no')->sum('seats');
    }

    /**
     * Returns count seats abstention
     *
     * @return Int
     * **/
    public function votesAbstention()
    {
        return Candidate::where('position', 'abstention')->sum('seats');
    }
}
