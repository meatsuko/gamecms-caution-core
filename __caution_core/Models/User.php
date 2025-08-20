<?php

namespace Caution\Core\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    public $timestamps = false;

    public static function resolve(): User
    {
        try
        {

            return static::findOrFail(user()->id);
        }
        catch(Exception $e)
        {
            return null;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'shilings',

    ];


}
