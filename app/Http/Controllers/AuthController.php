<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $userId = Auth::user()->id;
        $isVoted = DB::table('voting_data')
            ->where('user_id', '=', $userId)->get();
        $canVote = count($isVoted) == 0 ? true:false;
        if($canVote){
            return redirect('voting');
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('user_voted');
            // return redirect()->back()->with(['sudah_pilih' => 'Anda Sudah Memilih!']);;
        }
        // if(!auth()->attempt($data_login)){
        //     return redirect()->back();
        // }
    }

    public function adminLogin(Request $request){
        $data_login = [
            'kepala_keluarga'   =>  $request->kepala_keluarga,
            'password'          =>  $request->password,
        ];
        if(!Auth::attempt($data_login)){
            return redirect()->back();
        }
        return redirect('dashboard');
    }

    public function adminLogout(){
        auth()->logout();
        return redirect('/');
    }

    public function checkUserVote(){
        if(Auth::user()){
            $userId = Auth::user()->id;
            $isVoted = DB::table('voting_data')
                ->where('user_id', '=', $userId)->get();
            $canVote = count($isVoted) == 0 ? true:false;
            if($canVote){
                return redirect('voting');
            } else {
                Auth::logout();
                return redirect('user_voted');
            }
        }
    }
}
