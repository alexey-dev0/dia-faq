<?php

namespace App\Models;

use Database\Factories\AnswerFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Answer
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property string $content
 * @property int $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read Question $question
 * @property-read Collection|Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read User $user
 * @method static AnswerFactory factory(...$parameters)
 * @method static Builder|Answer newModelQuery()
 * @method static Builder|Answer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Answer onlyTrashed()
 * @method static Builder|Answer query()
 * @method static Builder|Answer whereContent($value)
 * @method static Builder|Answer whereCreatedAt($value)
 * @method static Builder|Answer whereDeletedAt($value)
 * @method static Builder|Answer whereId($value)
 * @method static Builder|Answer whereQuestionId($value)
 * @method static Builder|Answer whereRating($value)
 * @method static Builder|Answer whereUpdatedAt($value)
 * @method static Builder|Answer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Answer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Answer withoutTrashed()
 * @mixin Eloquent
 */
class Answer extends Model
{
    use HasFactory, SoftDeletes;

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
