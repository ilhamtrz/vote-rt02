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

        $activeVote = DB::table('votes')->where('status', '=', 2)->get();
        $isVoteActive = (!count($activeVote) == 0);

        $userId = Auth::user()->id;
        $isVoted = DB::table('voting_data')
            ->where('user_id', '=', $userId)->get();
        $canVote = count($isVoted) == 0 ? true:false;
        if ($isVoteActive){
            if($canVote){
                return redirect('voting');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('user_voted');
            }
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('vote_inactive');
        }
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

    public function adminLogout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin_login');
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
