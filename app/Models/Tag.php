<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Tag extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;


    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
