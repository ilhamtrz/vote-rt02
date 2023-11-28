<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\VoterData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VoteController extends Controller
{
    public function index():View{
        $votes = Vote::latest()->paginate(5);
        return view('votes.index', compact('votes'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create():View{
        return view('votes.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse{
        //validate form
        $this->validate($request, [
            'deskripsi'   => 'required|max:255',
            'periode'     => 'required|min:4|max:30'
        ]);
        //create votes
        $vote = Vote::create([
            'deskripsi' => $request->deskripsi,
            'periode'   => $request->periode
        ]);

        // Get Id
        $voteId = $vote->value('id');

        $voterData = DB::table('identity_cards')->get();
        // Masukan data pemilih
        foreach ($voterData as $data) {
            VoterData::create([
                'vote_id'           => $voteId,
                'identity_card_id'  => $data->id,
                'status'            => 0
            ]);
        }

        //redirect to index
        return redirect()->route('votes.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get vote by ID
        $vote = Vote::findOrFail($id);

        //render view with vote
        return view('votes.show', compact('vote'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get vote by ID
        $vote = Vote::findOrFail($id);

        //render view with vote
        return view('votes.edit', compact('vote'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'deskripsi'   => 'required|max:255',
            'periode'     => 'required|min:4|max:30'
        ]);

        //get vote by ID
        $vote = Vote::findOrFail($id);
        $vote->update([
            'deskripsi' => $request->deskripsi,
            'periode'   => $request->periode
        ]);

        //redirect to index
        return redirect()->route('votes.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function endvotes($id): RedirectResponse
    {
        //get vote by ID
        $vote = Vote::findOrFail($id);
        $vote->update([
            'deskripsi' => $vote->deskripsi,
            'periode'   => $vote->periode,
            'status'    => true
        ]);

        //redirect to index
        return redirect()->route('votes.index')->with(['success' => 'Pemilihan selesai']);
    }

    /**
     * destroy
     *
     * @param  mixed $vote
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get vote by ID
        $vote = Vote::findOrFail($id);

        //delete vote
        $vote->delete();

        //redirect to index
        return redirect()->route('votes.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
