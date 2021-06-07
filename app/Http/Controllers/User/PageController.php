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

    public function about(): View
    {
        $page = $this->service->getAbout();

        return view('site.pages.page', ['page' => $page, 'title' => Page::PAGE_TYPE_ABOUT]);
    }

    public function services(): View
    {
        $page = $this->service->getServices();

        return view('site.pages.page', ['page' => $page, 'title' => Page::PAGE_TYPE_SERVICES]);
    }

    public function information(): View
    {
        $page = $this->service->getInformation();

        return view('site.pages.page', ['page' => $page, 'title' => Page::PAGE_TYPE_SERVICES]);
    }
}
