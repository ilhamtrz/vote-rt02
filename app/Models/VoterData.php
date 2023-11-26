<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoterData extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_id',
        'identity_card_id',
        'status'
    ];
}
