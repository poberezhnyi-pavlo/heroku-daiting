<?php

namespace App\Services\User\Profile;

use App\Exceptions\CanPayException;
use App\Models\GiftWoman;
use App\Repositories\Admin\GiftRepository;
use App\Repositories\User\Profile\ManRepository;
use App\Services\BaseService;
use App\Services\Common\PayService;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

final class GiftService extends BaseService
{
    private PayService $payService;
    private ManRepository $manRepository;

    public function __construct(
        GiftRepository $repository,
        PayService $payService,
        ManRepository $manRepository
    ) {
        $this->repository = $repository;
        $this->payService = $payService;
        $this->manRepository = $manRepository;
    }

    public function getGifts(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * @throws CanPayException
     */
    public function create(array $data): GiftWoman
    {
        $man = $this->manRepository->getMan($data['user_id']);
        $gift = $this->repository->getById($data['gift_id']);

        if (!$this->payService->canPayGift($man, $gift)) {
             throw new CanPayException();
        }

        $this->payService->payGift($man, $gift);

        return GiftWoman::create(Arr::except($data, 'user_id'));
    }
}
