<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingSummaryController extends Controller
{
    public function index(){
        //get Id pemilihan dulu
        $votingDatas = DB::table('voting_summaries')->select('vote_id', 'desc')->distinct()->get();

        return view('voting_summary', compact('votingDatas'));
    }

    public function getSummary($id){
        $votingData = DB::table('voting_summaries')->where('vote_id', '=', $id)->get();
        return response()->json($votingData);
    }
}
