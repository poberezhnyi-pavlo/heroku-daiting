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

    public function getAbout(string $lang): ?Page
    {
        app()->setLocale($lang);

        return $this->model->where('type', Page::PAGE_TYPE_ABOUT)->first();
    }

    public function getServices(string $lang): ?Page
    {
        app()->setLocale($lang);

        return $this->model->where('type', Page::PAGE_TYPE_SERVICES)->first();
    }
}
