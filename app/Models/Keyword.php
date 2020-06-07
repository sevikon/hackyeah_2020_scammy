<?php

namespace App\Models;

use App\Services\Common\StaticArray;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Keyword
 *
 * @property int $id
 * @property string $keyword_title
 * @property int $keyword_value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newQuery()
 * @method static Builder|Keyword onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereKeywordTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereKeywordValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereUpdatedAt($value)
 * @method static Builder|Keyword withTrashed()
 * @method static Builder|Keyword withoutTrashed()
 * @mixin Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Keyword whereDeletedAt($value)
 */
class Keyword extends ValidModel
{
    // use soft delete instead of permanent delete
    use SoftDeletes;

    protected $attributes = [
        'keyword_value' => StaticArray::KEYWORD_DEFAULT_VALUE,
    ];

    protected $visible = [
        'id', 'keyword_title', 'keyword_value',
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'keyword_title', 'keyword_value',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function fill_update($data)
    {
        $this->fillable = ['keyword_title', 'keyword_value'];
        $this->fill($data);
    }
}
