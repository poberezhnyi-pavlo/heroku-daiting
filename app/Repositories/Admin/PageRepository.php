<?php

namespace App\Repositories\Admin;

use App\Models\Page;
use App\Repositories\BaseRepository;

/**
 * Class PageRepository
 * @package App\Repositories\Admin
 */
class PageRepository extends BaseRepository
{
    /**
     * PageRepository constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->model = $page;
    }
}
