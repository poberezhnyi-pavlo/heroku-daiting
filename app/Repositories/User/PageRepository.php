<?php

namespace App\Repositories\User;

use App\Models\Page;
use App\Repositories\BaseRepository;

class PageRepository extends BaseRepository
{
    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    public function getAbout(): ?Page
    {
        return $this->model->where('type', Page::PAGE_TYPE_ABOUT)->first();
    }

    public function getServices(): ?Page
    {
        return $this->model->where('type', Page::PAGE_TYPE_SERVICES)->first();
    }

    public function getInformation(): ?Page
    {
        return $this->model->where('type', Page::PAGE_TYPE_INFORMATION)->first();
    }
}
