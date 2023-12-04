<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $data_login = [
            'no_kk'     =>  $request->no_kk,
            'password'  =>  'password'
        ];
        if(!Auth::attempt($data_login)){
            return redirect()->back();
        }
        return view('calon_pilih');
    }
}
