<?php

namespace App\Containers\Prisoner\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Containers\Prisoner\Models\Prisoner
 *
 * @property int $id
 * @property string $username
 * @property string $cell
 * @property string $block
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Prisoner\Models\Prisoner whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Prisoner\Models\Prisoner whereCell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Prisoner\Models\Prisoner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Prisoner\Models\Prisoner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Prisoner\Models\Prisoner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Prisoner\Models\Prisoner whereUsername($value)
 * @mixin \Eloquent
 */
class Prisoner extends Model
{
    protected $fillable = [
        'username',
        'cell',
        'block'
    ];
}
