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

    public function getAbout(): Page
    {
        return $this->repository->getAbout();
    }

    public function getServices(): Page
    {
        return $this->repository->getServices();
    }

    public function getInformation(): Page
    {
        return $this->repository->getInformation();
    }
}
