<?php

namespace App\Services\Admin;

use App\Helpers\ImageHelper;
use App\Http\Requests\HomeSlide\UpdateSlideRequest;
use App\Models\Slide;
use App\Repositories\Admin\HomePageSlideRepository;
use App\Services\BaseService;
use Arr;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class HomePageSlideService
 * @package App\Services\Admin
 */
class HomePageSlideService extends BaseService
{
    /**
     * HomePageSlideService constructor.
     * @param HomePageSlideRepository $slideRepository
     */
    public function __construct(HomePageSlideRepository $slideRepository)
    {
        $this->repository = $slideRepository;
    }

    /**
     * @param array $params
     * @return Model
     */
    public function createSlide(array $params): Model
    {
        $params['uri'] = $this->storeSlideImage($params['image']);
        $params['order'] = $this->repository->getMaxOrderValue() + 1;

        return $this->repository->store($params);
    }

    /**
     * @param Slide $slide
     * @return array
     */
    public function getSlide(Slide $slide): array
    {
        return $this->repository->getTranslatedSlide($slide);
    }

    /**
     * @param array $request
     * @return Collection
     */
    public function updateOrder(array $request): Collection
    {
        $result = collect($request)->map(function ($item) {
            return Arr::only(
                $item, [
                'id',
                'order',
            ]);
        })->toArray();

        return $this->repository->massUpdate($result);
    }

    /**
     * @param Slide $slide
     * @return bool|null
     * @throws Exception
     */
    public function removeSlide(Slide $slide): ?bool
    {
        ImageHelper::removeImage($slide->uri);

        return $this->repository->forceDestroyByModel($slide);
    }

    /**
     * @param $request
     * @param Slide $slide
     * @return bool
     */
    public function updateSlide(UpdateSlideRequest $request, Slide $slide): bool
    {
        if ($request->has('image')) {

            ImageHelper::removeImage($slide->uri);

            $request->merge([
                'uri' => $this->storeSlideImage($request->image)
            ]);
        }

        return $this->repository->updateModel($slide, $request);
    }

    /**
     * @param $image
     * @return string|null
     */
    private function storeSlideImage($image): ?string
    {
        return ImageHelper::storeImage(
            $image,
            Slide::SLIDE_PATH
        );
    }
}
