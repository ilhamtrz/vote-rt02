<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoterData extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_id',
        'user_id',
        'status'
    ];

    protected $primaryKey = 'user_id';
}
