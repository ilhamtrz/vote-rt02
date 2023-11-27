<?php

namespace App\Http\Controllers;

use App\Models\IdentityCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IdentityCardController extends Controller
{
    public function index():View{
        $identityCards = IdentityCard::latest()->paginate(5);
        return view('identityCards.index', compact('identityCards'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create():View{
        return view('identityCards.create');
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
        //create IdentityCards
        IdentityCard::create([
            'no_kk'             => $request->no_kk,
            'kepala_keluarga'   => $request->kepala_keluarga
        ]);

        //redirect to index
        return redirect()->route('identityCards.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get IdentityCard by ID
        $identityCard = IdentityCard::findOrFail($id);

        //render view with IdentityCard
        return view('identityCards.show', compact('identityCard'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get IdentityCard by ID
        $identityCard = IdentityCard::findOrFail($id);

        //render view with IdentityCard
        return view('identityCards.edit', compact('identityCard'));
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

        //get IdentityCard by ID
        $identityCard = IdentityCard::findOrFail($id);
        $identityCard->update([
            'no_kk'             => $request->no_kk,
            'kepala_keluarga'   => $request->kepala_keluarga
        ]);

        //redirect to index
        return redirect()->route('identityCards.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $identityCard
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get IdentityCard by ID
        $identityCard = IdentityCard::findOrFail($id);

        //delete IdentityCard
        $identityCard->delete();

        //redirect to index
        return redirect()->route('identityCards.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
