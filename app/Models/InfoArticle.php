<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoArticle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
