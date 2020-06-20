<?php

namespace App\Services;

use App\Repositories\BaseRepository;

/**
 * Class BaseService
 * @package App\Services
 */
abstract class BaseService
{
    /**
     * @var BaseRepository
     */
    public $repository;
}
