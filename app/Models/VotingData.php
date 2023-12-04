<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingData extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_id',
        'candidate_id',
        'user_id'
    ];
}
