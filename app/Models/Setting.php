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
 * @property string $category
 * @property string $fieldType
 */
class Setting extends Model
{
    public const CATEGORY_MAIN = 'Main';
    public const CATEGORY_PRICE = 'Price Settings';

    public const CATEGORIES = [
        self::CATEGORY_MAIN,
        self::CATEGORY_PRICE,
    ];

    public const FIELD_INPUT = 'inputField';
    public const FIELD_TEXTAREA = 'textareaField';

    public const FIELDS = [
        self::FIELD_INPUT,
        self::FIELD_TEXTAREA,
    ];

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
        'category',
        'fieldType',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
