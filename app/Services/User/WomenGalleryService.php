<?php

namespace App\Services\User;

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

    public function getWomen(string $lang, array $filters = []): LengthAwarePaginator
    {
        app()->setLocale($lang);

        return $this->womenRepository->getWomenForGallery($filters);
    }
}
