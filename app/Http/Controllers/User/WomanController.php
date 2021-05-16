<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Get\WomenGetRequest;
use App\Models\Woman;
use App\Services\User\WomenGalleryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WomanController extends Controller
{
    private WomenGalleryService $womenService;

    public function __construct(WomenGalleryService $womenService)
    {
        $this->womenService = $womenService;
    }

    public function index(WomenGetRequest $request, string $lang = 'en'): View
    {
        $women = $this->womenService->getWomen($lang, $request->all());

        return view('site.pages.woman.index', ['women' => $women]);
    }

    public function show(Woman $woman): View
    {
        return view();
    }
}
