<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CandidateController extends Controller
{
    public function index():View{
        $candidates = Candidate::latest()->paginate(3);
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
            // Image REQUIRED JIKA HOSTING DI 000WEBHOSTAPP
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'no_kk'     => 'required|numeric|digits:16',
            'nama'      => 'required|max:50',
            'visi_misi'   => 'required|min:10'
        ]);

        if ($request->image){
            //upload image
            $image = $request->file('image');
            $image->storeAs('public/candidates', $image->hashName());

            //create Candidates
            Candidate::create([
                'image'     => $image->hashName(),
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama,
                'visi_misi'   => $request->visi_misi
            ]);
        }
        else {
            //create Candidates without image
            Candidate::create([
                'image'     => null,
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama,
                'visi_misi'   => $request->visi_misi
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
            'nama'      => 'required|max:50',
            'visi_misi'   => 'required|min:10'
        ]);

        //get Candidate by ID
        $candidate = Candidate::findOrFail($id);
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/candidates', $image->hashName());

            // CARA UPLOAD DI HOSTING
            // Storage::disk('uploads')->put($image->hashName(), $image);

            //delete old image
            Storage ::delete('public/candidates/'.$candidate->image);

            // CARA DELETE DI HOSTING
            // Storage::disk('uploads')->delete($candidate->image);
            // Storage::disk('uploads')->delete($candidate->image . '/' . $candidate->image);

            //update calon
            $candidate->update([
                'image'     => $image->hashName(),
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama,
                'visi_misi'   => $request->visi_misi
            ]);
        }
        else{
            //update tanpa gambar
            $candidate->update([
                'no_kk'     => $request->no_kk,
                'nama'      => $request->nama,
                'visi_misi'   => $request->visi_misi
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

        $activeVote = DB::table('votes')->where('status', '=', 2)->get();
        if (!count($activeVote) == 0){
            return redirect()->route('candidates.index')->with(['error' => 'Masih Ada Pemilihan Yang Berjalan']);
        }

        //delete image
        Storage ::delete('public/candidates/'.$candidate->image);

        // CARA DELETE DI HOSTING
        // Storage::disk('uploads')->delete($candidate->image);
        // Storage::disk('uploads')->delete($candidate->image . '/' . $candidate->image);

        //delete Candidate
        $candidate->delete();

        //redirect to index
        return redirect()->route('candidates.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function getCandidates(): View
    {
        $candidates = DB::table('candidates')->orderBy('id')->get();;
        return view('calon_pilih', compact('candidates'));
    }
}
