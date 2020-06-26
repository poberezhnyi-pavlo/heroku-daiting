<?php

namespace App\Services\Admin;

use App\Repositories\Admin\SettingRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as CommonCollection;

/**
 * Class SettingService
 * @package App\Services\Admin
 */
class SettingService extends BaseService
{
    /**
     * SettingService constructor.
     * @param SettingRepository $settingRepository
     */
    public function __construct(SettingRepository $settingRepository)
    {
        $this->repository = $settingRepository;
    }

    /**
     * @return Collection
     */
    public function getSettings(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * @param array $request
     * @return CommonCollection
     */
    public function updateSettings(array $request): CommonCollection
    {
        return $this->repository
            ->massUpdate($request);
    }
}
