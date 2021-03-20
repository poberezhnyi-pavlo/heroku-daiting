<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\HomeSlide\CreateSlideRequest;
use App\Http\Requests\HomeSlide\SlideChangeOrderRequest;
use App\Http\Requests\HomeSlide\UpdateSlideRequest;
use App\Http\Resources\Slides\SingleSlideResource;
use App\Http\Resources\Slides\SlideResource;
use App\Models\Slide;
use App\Services\Admin\HomePageSlideService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SlidesController
 * @package App\Http\Controllers\Admin
 */
class SlidesController extends BaseController
{
    /**
     * SlidesController constructor.
     * @param HomePageSlideService $slideService
     */
    public function __construct(HomePageSlideService $slideService)
    {
        $this->service = $slideService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            SlideResource::collection($this->service->index())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSlideRequest $request
     * @return JsonResponse
     */
    public function store(CreateSlideRequest $request): JsonResponse
    {
        $this->service->createSlide($request->all());

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param Slide $slide
     * @return JsonResponse
     */
    public function show(Slide $slide): JsonResponse
    {
        $translatedSlide = $this->service->getSlide($slide);

        return response()->json(
            SingleSlideResource::make($slide, $translatedSlide)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSlideRequest $request
     * @param Slide $slide
     * @return JsonResponse
     */
    public function update(UpdateSlideRequest $request, Slide $slide): JsonResponse
    {
        return response()->json(
            $this->service->updateSlide(
                $request,
                $slide
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slide $slide
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Slide $slide): JsonResponse
    {
        $result = $this->service->removeSlide($slide);

        return response()->json($result);
    }

    /**
     * @param SlideChangeOrderRequest $request
     * @return JsonResponse
     */
    public function changeOrder(SlideChangeOrderRequest $request): JsonResponse
    {
        return response()->json(
            $this->service->updateOrder($request->all())
        );
    }
}
