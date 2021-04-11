<?php

namespace App\Services\Admin;

use App\Helpers\ImageHelper;
use App\Http\Requests\Gift\EditGiftRequest;
use App\Models\Gift;
use App\Repositories\Admin\GiftRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GiftService
 * @package App\Services
 */
class GiftService extends BaseService
{
    /**
     * GiftService constructor.
     * @param GiftRepository $giftRepository
     */
    public function __construct(GiftRepository $giftRepository)
    {
        $this->repository = $giftRepository;
    }

    /**
     * @param array $params
     * @return Model
     */
    public function storeGift(array $params): Model
    {
        $params['image'] = ImageHelper::storeImage(
            $params['image'],
            Gift::GIFT_IMG_PATH
        );

        return $this->repository->store($params);
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function removeGift(int $id): ?bool
    {
        $gift = $this->repository->getById($id, true);

        ImageHelper::removeImage($gift->image);

        return $this->repository
            ->forceDestroyByModel($gift);
    }

    /**
     * @param EditGiftRequest $request
     * @param int $id
     * @return bool
     */
    public function updateGift(EditGiftRequest $request, int $id): bool
    {
        $gift = $this->repository->getById($id, true);

        if ($request->has('image')) {

            ImageHelper::removeImage($gift->image);
            $image = ImageHelper::storeImage(
                $request->image,
                Gift::GIFT_IMG_PATH
            );

            $request->merge([
                'image' => $image
            ]);
        }

        return $this->repository->updateModel($gift, $request);
    }
}
