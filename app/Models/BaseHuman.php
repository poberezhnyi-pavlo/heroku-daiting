<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class BaseHuman
 * @package App\Models
 */
class BaseHuman extends Model
{
    public const EYE_BROWN = 'brown';
    public const EYE_BLUE = 'blue';
    public const EYE_GREEN = 'green';
    public const EYE_HAZEL = 'hazel';
    public const EYE_AMBER = 'amber';
    public const EYE_GREY = 'grey';
    public const EYE_OTHER = 'other';

    /**
     * Eye colors.
     *
     * @var string[]
     */
    public const EYE_COLORS = [
        self::EYE_BROWN,
        self::EYE_BLUE,
        self::EYE_GREEN,
        self::EYE_HAZEL,
        self::EYE_AMBER,
        self::EYE_GREY,
        self::EYE_OTHER,
    ];

    /**
     * Hair colors
     *
     * @var string[]
     */
    public const HAIR_BROWN = 'brown';
    public const HAIR_BLONDE = 'blonde';
    public const HAIR_BLACK = 'black';
    public const HAIR_AUBURN = 'auburn';
    public const HAIR_RED = 'red';
    public const HAIR_GREY = 'grey';
    public const HAIR_WHITE = 'white';
    public const HAIR_OTHER = 'other';

    /**
     * @var string[]
     */
    public const HAIR_COLORS = [
        self::HAIR_BROWN,
        self::HAIR_BLONDE,
        self::HAIR_BLACK,
        self::HAIR_AUBURN,
        self::HAIR_RED,
        self::HAIR_GREY,
        self::HAIR_WHITE,
        self::HAIR_OTHER,
    ];

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return with(new static)->getTable();
    }

    /**
     * Role relation
     *
     * @return MorphOne
     */
    public function user():MorphOne
    {
        return $this->morphOne(
            User::class,
            'user'
        );
    }

    /**
     * @param array $langs
     * @return void
     * @throws \JsonException
     */
    public function setLangsAttribute(array $langs): void
    {
        $this->attributes['langs'] = json_encode($langs, JSON_THROW_ON_ERROR);
    }

    /**
     * @param $langs
     * @return false|string
     * @throws \JsonException
     */
    public function getLangsAttribute(?string $langs)
    {
        return json_decode($langs, true, 512, JSON_THROW_ON_ERROR);
    }
}
