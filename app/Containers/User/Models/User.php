<?php

namespace App\Containers\User\Models;

use Illuminate\Foundation\Auth\User as BaseUser;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 *
 * @package App\Containers\User\Models
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends BaseUser
{
    use HasApiTokens;
}
