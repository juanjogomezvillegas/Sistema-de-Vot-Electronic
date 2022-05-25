<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Calculate seats of with candidate
     * **/
    private function calculateSeats()
    {
        $candidates = Candidate::orderBy('votes', 'DESC')->get();

        foreach ($candidates as $item) {
            if ($item->votes > 0) {
                $item->seats = round(($item->votes / Candidate::sum('votes')) * Configuration::first()->seats);
                $item->save();
            }
        }
    }

    /**
     * Returns count votes candidates
     *
     * @return Integer
     * **/
    public function countVotes()
    {
        return Candidate::get()->sum('votes');
    }

    /**
     * Returns count candidates
     *
     * @return Integer
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
            'votes' => ['required', 'integer'],
        ]);

        $candidate->name = $validated['name'];
        $candidate->party = $validated['party'];
        $candidate->ideology = $validated['ideology'];
        $candidate->campaign = $validated['campaign'];
        $candidate->color = $validated['color'];
        $candidate->votes = $validated['votes'];
        $candidate->save();

        $this->calculateSeats();
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
     * @return Integer
     * **/
    public function votesYes()
    {
        return Candidate::where('position', 'yes')->sum('seats');
    }

    /**
     * Returns count seats no
     *
     * @return Integer
     * **/
    public function votesNo()
    {
        return Candidate::where('position', 'no')->sum('seats');
    }

    /**
     * Returns count seats abstention
     *
     * @return Integer
     * **/
    public function votesAbstention()
    {
        return Candidate::where('position', 'abstention')->sum('seats');
    }
}
