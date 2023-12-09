<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\VoterData;
use App\Models\VotingData;
use App\Models\VotingSummary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        Vote::create([
            'deskripsi' => $request->deskripsi,
            'periode'   => $request->periode
        ]);

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

    public function endvotes($id): RedirectResponse
    {
        //get vote by ID
        $vote = Vote::findOrFail($id);
        $vote->update([
            'deskripsi' => $vote->deskripsi,
            'periode'   => $vote->periode,
            'status'    => 3
        ]);

        // add summary
        $votingDatas = DB::table('voting_data')
            ->join('candidates', 'voting_data.candidate_id', '=', 'candidates.id')
            ->select('candidates.nama', DB::raw('COUNT(*) as total_votes'))
            ->groupBy('voting_data.candidate_id', 'candidates.id')
            ->get();

        foreach($votingDatas as $votingData){
            VotingSummary::create([
                'vote_id'       =>  $vote->id,
                'desc'          =>  $vote->deskripsi,
                'name'          =>  $votingData->nama,
                'count_vote'    =>  $votingData->total_votes
            ]);
        }
        DB::table('voting_data')->truncate();
        DB::table('voter_data')->truncate();

        //redirect to index
        return redirect()->route('votes.index')->with(['success' => 'Pemilihan selesai']);
    }

    public function startvotes($id): RedirectResponse
    {
        // cek pemilihan aktif
        $activeVote = DB::table('votes')->where('status', '=', 2)->get();
        if(!count($activeVote) == 0){
            return redirect()->route('votes.index')->with(['error' => 'Sedang Ada Pemilihan Yang Sedang Berjalan']);
        }

        $voterData = DB::table('users')->get();
        // Admin tidak masuk pemilihan
        unset($voterData[0]);

        // Cek Pemilih Aktif
        if (count($voterData) === 0){
            return redirect()->route('votes.index')->with(['error' => 'Pemilih Masih Kosong, Tambahkan KK dulu!']);
        }

        // Cek Calon
        $candidate = DB::table('candidates')->get();
        if (count($candidate) == 0){
            return redirect()->route('votes.index')->with(['error' => 'Calon Masih Kosong, Tambahkan Calon dulu!']);
        }

        // Masukan data pemilih
        foreach ($voterData as $data) {
            VoterData::create([
                'vote_id'   => $id,
                'user_id'   => $data->id,
                'status'    => 0
            ]);
        }

        //get vote by ID
        $vote = Vote::findOrFail($id);
        $vote->update([
            'deskripsi' => $vote->deskripsi,
            'periode'   => $vote->periode,
            'status'    => 2
        ]);

        //redirect to index
        return redirect()->route('votes.index')->with(['success' => 'Pemilihan Dimulai']);
    }


    public function voteCandidate(Request $request)
    {
        // Pilih vote yang aktif saja
        $voteActiveId = DB::table('votes')
            ->where('status', '=', 2)
            ->get()->first()->id;

        $userId = Auth::user()->id;

        VotingData::create([
            'vote_id'       => $voteActiveId,
            'candidate_id'  => $request->candidate,
            'user_id'       => $userId
        ]);

        $voterData = VoterData::findOrFail($userId);
        $voterData->update([
            'vote_id'   => $voterData->vote_id,
            'user_id'   => $voterData->user_id,
            'status'    => 1
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('success_vote');
    }
}
