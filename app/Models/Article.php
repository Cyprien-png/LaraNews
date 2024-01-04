<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'archived_at'];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function archive()
    {
        // $this->archived_at = now();
        // $this->save();
        $this->timestamps = false;
        $this->update(['archived_at' => now()]);
        $this->timestamps = true;
    }



    // public static function archived()
    // {
    //     return static::whereNotNull('archived_at');
    // }

    // public static function unarchived()
    // {
    //     return static::whereNull('archived_at');
    // }

    public function scopeUnarchived(Builder $query)
    {
        return $query->whereNull('archived_at');
    }

    public function scopeArchived(Builder $query)
    {
        return $query->whereNotNull('archived_at');
    }

    public function scopeSearchTitle(Builder $query, $search)
    {
        return $query->where('title', 'like', "%{$search}%");
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}

