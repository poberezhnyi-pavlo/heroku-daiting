<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\SliderService;
use Illuminate\View\View;

class HomeController extends Controller
{
    private SliderService $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function __invoke(string $lang = 'en'): View
    {
        $sliders = $this->sliderService->getAll($lang);

        return view('site.pages.index', [
            'sliders' => $sliders,
        ]);
    }
}
