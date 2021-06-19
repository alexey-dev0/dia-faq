<?php

namespace App\Models;

use Database\Factories\RatingFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Rating
 *
 * @property int $id
 * @property int $user_id
 * @property int $ratingable_id
 * @property string $ratingable_type
 * @property string $direction
 * @property int $amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Model|Eloquent $ratingable
 * @property-read User $user
 * @method static RatingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static Builder|Rating onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRatingableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRatingableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUserId($value)
 * @method static Builder|Rating withTrashed()
 * @method static Builder|Rating withoutTrashed()
 * @mixin Eloquent
 */
class Rating extends Model
{
    use HasFactory, SoftDeletes;

    public function ratingable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
