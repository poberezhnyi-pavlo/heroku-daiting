<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Page;
use App\Services\User\PageService;
use Illuminate\View\View;

class PageController extends BaseController
{
    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function about(string $lang = 'en'): View
    {
        $page = $this->service->getAbout($lang);

        return view('site.pages.page', ['page' => $page, 'title' => Page::PAGE_TYPE_ABOUT]);
    }

    public function services(string $lang = 'en'): View
    {
        $page = $this->service->getAbout($lang);

        return view('site.pages.page', ['page' => $page, 'title' => Page::PAGE_TYPE_SERVICES]);
    }
}
