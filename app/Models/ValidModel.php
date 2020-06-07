<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
use Validator;

/**
 * App\Validatable\ValidModel
 *
 * @mixin Eloquent
 * @method static Builder|ValidModel newModelQuery()
 * @method static Builder|ValidModel newQuery()
 * @method static Builder|ValidModel query()
 */
class ValidModel extends Model
{

    protected $rules = [];
    /**
     * @var MessageBag
     */
    protected $errors;
    protected $messages = [];

    public function validate()
    {
        $v = Validator::make($this->attributes, $this->rules, $this->messages);
        if ($v->fails()) {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

    public function set_fillable_fields($fillable)
    {
        $this->fillable = $fillable;
    }

    /**
     * @return MessageBag
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Update rule
     *
     * @param $key string key
     * @param $value string
     */
    public function updateRule($key, $value)
    {
        $this->rules[$key] = $value;
    }

    /**
     * Update rule
     *
     * @param $key string key
     * @param $value string
     */
    public function fill_data($attributes, $rules = null, $messages = null)
    {
        $this->attributes = $attributes;
        if ($rules) $this->rules = $rules;
        if ($messages) $this->messages = $messages;
    }

}