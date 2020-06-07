<?php

namespace App\Models;

/**
 * App\Models\UserSimple
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string|null $avatar
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSimple whereDeletedAt($value)
 */
class UserSimple extends User
{
    protected $table = 'users';
    protected $visible = [
        'first_name', 'last_name', 'avatar'
    ];
}
