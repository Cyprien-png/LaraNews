<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['body', 'published_at', 'article_id'];


    public function articles(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
