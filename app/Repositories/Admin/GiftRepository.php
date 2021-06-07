<?php

namespace App\Repositories\Admin;

use App\Models\Gift;
use App\Repositories\BaseRepository;

/**
 * Class GiftRepository
 * @package App\Repositories\Admin
 */
class GiftRepository extends BaseRepository
{
    /**
     * GiftRepository constructor.
     * @param Gift $gift
     */
    public function __construct(Gift $gift)
    {
        $this->model = $gift;
    }
}
