<?php

namespace App\Services\Admin;

use App\Repositories\Admin\PageRepository;
use App\Services\BaseService;

/**
 * Class PageService
 * @package App\Services\Admin
 */
class PageService extends BaseService
{
    /**
     * PageService constructor.
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->repository = $pageRepository;
    }
}
