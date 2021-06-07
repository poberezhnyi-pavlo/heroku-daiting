<?php

namespace App\Services\User;

use App\Models\Woman;
use App\Repositories\User\WomenRepository;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class WomenGalleryService extends BaseService
{
    private WomenRepository $womenRepository;

    public function __construct(WomenRepository $womenRepository)
    {
        $this->womenRepository = $womenRepository;
    }

    public function getWomen(array $filters = []): LengthAwarePaginator
    {
        return $this->womenRepository->getWomenForGallery($filters);
    }

    public function getWomanById(int $id): Woman
    {
        return $this->womenRepository->getById($id);
    }

}
