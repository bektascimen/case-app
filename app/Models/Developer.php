<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Developer
 *
 * @property int $id
 * @property string $developer
 * @property int $time
 * @property int $difficulty_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereDeveloper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereDifficultyLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Developer extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "developers";
    /**
     * @var array
     */
    protected $guarded = [];
}
