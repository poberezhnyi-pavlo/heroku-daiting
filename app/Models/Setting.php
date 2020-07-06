<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App\Models
 * @property string $name
 * @property string $key
 * @property string $value
 * @property string $append
 * @property string $description
 */
class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'key',
        'value',
        'append',
        'description',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
