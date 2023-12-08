<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingDataController extends Controller
{
    public function index(){
        $votingDatas = DB::table('voting_data')
            ->join('candidates', 'voting_data.candidate_id', '=', 'candidates.id')
            ->select('candidates.nama', DB::raw('COUNT(*) as total_votes'))
            ->groupBy('voting_data.candidate_id', 'candidates.nama')
            ->get()->toJson();

        return view('dashboard', compact('votingDatas'));
        // dd($votingDatas);
    }
}
