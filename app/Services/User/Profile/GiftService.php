<?php

namespace App\Services\User\Profile;

use App\Models\GiftWoman;
use App\Repositories\Admin\GiftRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

final class GiftService extends BaseService
{
    public function __construct(GiftRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getGifts(): Collection
    {
        return $this->repository->getAll();
    }

    public function create(array $data): GiftWoman
    {
        return GiftWoman::create($data);
    }
}
