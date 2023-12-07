<?php

namespace App\Http\Controllers;

use App\Models\VoterData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VoterDataController extends Controller
{
    public function index():View{
        $voterDatas = DB::table('voter_data')
                        ->join('votes', 'voter_data.vote_id', '=', 'votes.id')
                        ->join('users', 'voter_data.user_id', '=', 'users.id')
                        ->select('users.no_kk', 'users.kepala_keluarga', 'voter_data.status',
                                'votes.id', 'votes.deskripsi')->get();
        return view('voterData.index', compact('voterDatas'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create():View{
        return view('voterData.create');
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
            'no_kk'             => 'required|numeric|digits:16',
            'kepala_keluarga'   => 'required|max:50'
        ]);
        //create VoterDatas
        VoterData::create([
            'no_kk'             => $request->no_kk,
            'kepala_keluarga'   => $request->kepala_keluarga
        ]);

        //redirect to index
        return redirect()->route('voterData.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get VoterData by ID
        $voterData = VoterData::findOrFail($id);

        //render view with VoterData
        return view('voterData.show', compact('voterData'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get VoterData by ID
        $voterData = VoterData::findOrFail($id);

        //render view with VoterData
        return view('voterData.edit', compact('voterData'));
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
            'no_kk'             => 'required|numeric|digits:16',
            'kepala_keluarga'   => 'required|max:50'
        ]);

        //get VoterData by ID
        $voterData = VoterData::findOrFail($id);
        $voterData->update([
            'no_kk'             => $request->no_kk,
            'kepala_keluarga'   => $request->kepala_keluarga
        ]);

        //redirect to index
        return redirect()->route('voterData.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $voterData
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get VoterData by ID
        $voterData = VoterData::findOrFail($id);

        //delete VoterData
        $voterData->delete();

        //redirect to index
        return redirect()->route('voterData.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
