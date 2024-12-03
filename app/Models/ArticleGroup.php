<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleGroup extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'article_groups';

    /**
     * Get the website that owns the ArticleGroup
     */
    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }

    /**
     * Get the user that owns the ArticleGroup
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
