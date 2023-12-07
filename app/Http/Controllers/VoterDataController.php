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
}
