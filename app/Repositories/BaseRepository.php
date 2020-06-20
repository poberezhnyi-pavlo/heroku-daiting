<?php

namespace App\Repositories;

use App\Traits\VueTableRepositoryTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository
{
    use VueTableRepositoryTrait;

    /**
     * @var Model
     */
    public $model;
}
