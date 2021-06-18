<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(__CLASS__, 'commentable');
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
