<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    public function answers(): MorphToMany
    {
        return $this->morphedByMany(Answer::class, 'taggable');
    }

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function questions(): MorphToMany
    {
        return $this->morphedByMany(Question::class, 'taggable');
    }
}
