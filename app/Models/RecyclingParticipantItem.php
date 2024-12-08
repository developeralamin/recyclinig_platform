<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecyclingParticipantItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'participant_id'
    ];
}
