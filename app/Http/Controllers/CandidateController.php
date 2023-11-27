<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CandidateController extends Controller
{
    public function index():View{
        $candidates = Candidate::latest()->paginate(5);
        // Debugbar::info($candidates);
        return view('candidates.index', compact('candidates'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create():View{
        return view('candidates.create');
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
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'no_kk'     => 'required|numeric|digits:16',
            'nama'      => 'required|max:50'
        ]);

        if ($request->image){
            //upload image
            $image = $request->file('image');
            $image->storeAs('public/candidates', $image->hashName());

            //create Candidates
            Candidate::create([
                'image'     => $image->hashName(),
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama
            ]);
        }
        else {
            //create Candidates without image
            Candidate::create([
                'image'     => null,
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama
            ]);
        }

        //redirect to index
        return redirect()->route('candidates.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get Candidate by ID
        $candidate = Candidate::findOrFail($id);

        //render view with Candidate
        return view('candidates.show', compact('candidate'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get Candidate by ID
        $candidate = Candidate::findOrFail($id);
        // Debugbar::info($candidate->no_kk);
        //render view with Candidate
        return view('candidates.edit', compact('candidate'));
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
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'no_kk'     => 'required|numeric|digits:16',
            'nama'      => 'required|max:50|min:1'
        ]);

        //get Candidate by ID
        $candidate = Candidate::findOrFail($id);
        Debugbar::info($candidate);
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/candidates', $image->hashName());

            //delete old image
            Storage ::delete('public/candidates/'.$candidate->image);

            //update calon
            $candidate->update([
                'image'     => $image->hashName(),
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama
            ]);
        }
        else{
            //update tanpa gambar
            $candidate->update([
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama
            ]);
        }

        //redirect to index
        return redirect()->route('candidates.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $candidate
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get Candidate by ID
        $candidate = Candidate::findOrFail($id);

        //delete image
        Storage ::delete('public/candidates/'.$candidate->image);

        //delete Candidate
        $candidate->delete();

        //redirect to index
        return redirect()->route('candidates.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}