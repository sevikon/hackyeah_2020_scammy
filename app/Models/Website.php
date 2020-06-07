<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Website
 *
 * @property int $id
 * @property string $url
 * @property string $domain
 * @property int $ranking
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Website onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website whereRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Website whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Website withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Website withoutTrashed()
 * @mixin \Eloquent
 */
class Website extends ValidModel
{
    // use soft delete instead of permanent delete
    use SoftDeletes;

    protected $attributes = [
        'ranking' => 0,
    ];

    protected $visible = [
        'id', 'url', 'domain', 'ranking',
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'url', 'domain', 'ranking'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function fill_update($data)
    {
        $this->fillable = ['url', 'domain', 'ranking'];
        $this->fill($data);
    }
}
