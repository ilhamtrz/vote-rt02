<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_id',
        'desc',
        'name',
        'count_vote'
    ];
}
