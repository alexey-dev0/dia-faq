<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
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
 * App\Models\Article
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $description
 * @property string $content
 * @property int $rating
 * @property int $views
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read Collection|Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read User $user
 * @method static ArticleFactory factory(...$parameters)
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static \Illuminate\Database\Query\Builder|Article onlyTrashed()
 * @method static Builder|Article query()
 * @method static Builder|Article whereContent($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereDeletedAt($value)
 * @method static Builder|Article whereDescription($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereRating($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @method static Builder|Article whereUserId($value)
 * @method static Builder|Article whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|Article withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Article withoutTrashed()
 * @mixin Eloquent
 */
class Article extends Model
{
    use HasFactory, SoftDeletes;

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
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
