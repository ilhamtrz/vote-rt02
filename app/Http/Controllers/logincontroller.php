<?php

namespace App\Http\Controllers;

use App\Models\warga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function postlogin(Request $request)
    {
        $NoKK = $request->input('NoKK');

        // Mencari warga dengan NoKK yang sesuai
        $warga = DB::table('wargas')->where('NoKK', $NoKK)->first();

        if ($warga) {
            // Jika warga ditemukan, buat sesi dan arahkan ke halaman 'welcome'
            session(['NoKK' => $NoKK]);
            return view('welcome');
        } else {
            // Jika warga tidak ditemukan, kembalikan ke halaman login dengan pesan error
            return view('login');

            // return back()->withErrors(['NoKK' => 'Nomor Kartu Keluarga tidak ditemukan.']);
        }
    }
}
