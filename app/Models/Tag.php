<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read Collection|Article[] $articles
 * @property-read int|null $articles_count
 * @property-read Collection|Question[] $questions
 * @property-read int|null $questions_count
 * @method static TagFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static Builder|Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @method static Builder|Tag withTrashed()
 * @method static Builder|Tag withoutTrashed()
 * @mixin Eloquent
 */
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
