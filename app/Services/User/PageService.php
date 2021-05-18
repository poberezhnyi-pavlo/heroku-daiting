<?php

namespace App\Services\User;

use App\Models\Page;
use App\Repositories\User\PageRepository;
use App\Services\BaseService;

class PageService extends BaseService
{
    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAbout(string $lang): Page
    {
        return $this->repository->getAbout($lang);
    }

    public function getServices(string $lang): Page
    {
        return $this->repository->getServices($lang);
    }
}
