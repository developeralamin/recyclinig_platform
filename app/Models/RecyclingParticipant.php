<?php

namespace App\Models;

use App\Models\RecyclingEvent;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecyclingParticipantItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecyclingParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'notes',
        'count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(RecyclingEvent::class);
    }

    public function items()
    {
        return $this->hasMany(RecyclingParticipantItem::class, 'participant_id');
    }
}
