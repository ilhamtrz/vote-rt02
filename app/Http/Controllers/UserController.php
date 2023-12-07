<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index():View{
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create():View{
        return view('users.create');
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
            'no_kk'             => 'unique:users|required|numeric|digits:16',
            'kepala_keluarga'   => 'required|max:50'
        ]);
        //create Users
        $user = User::create([
            'no_kk'             => $request->no_kk,
            'kepala_keluarga'   => $request->kepala_keluarga
        ]);

        $user->assignRole('user');

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get User by ID
        $user = User::findOrFail($id);

        //render view with User
        return view('users.show', compact('user'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get User by ID
        $user = User::findOrFail($id);

        //render view with User
        return view('users.edit', compact('user'));
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

        //get User by ID
        $user = User::findOrFail($id);
        $user->update([
            'no_kk'             => $request->no_kk,
            'kepala_keluarga'   => $request->kepala_keluarga
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $user
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get User by ID
        $user = User::findOrFail($id);

        //delete User
        $user->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
