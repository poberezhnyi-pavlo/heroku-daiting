<?php

namespace App\Repositories\Admin;

use App\Models\Man;
use App\Repositories\BaseRepository;

/**
 * Class ManRepository
 * @package App\Repositories\Admin
 */
class ManRepository extends BaseRepository
{
    /**
     * ManRepository constructor.
     * @param Man $man
     */
    public function __construct(Man $man)
    {
        $this->model = $man;
    }

    /**
     * @param array $manData
     * @return Man
     */
    public function storeMan(array $manData): Man
    {
        return $this->store($manData);
    }
}
