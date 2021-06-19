<?php

namespace App\Models;

use Database\Factories\CommentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $commentable_id
 * @property string $commentable_type
 * @property string $text
 * @property int $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Model|Eloquent $commentable
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read Collection|Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read User $user
 * @method static CommentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static Builder|Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @method static Builder|Comment withTrashed()
 * @method static Builder|Comment withoutTrashed()
 * @mixin Eloquent
 */
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
