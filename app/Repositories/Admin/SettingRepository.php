<?php

namespace App\Repositories\Admin;

use App\Models\Setting;
use App\Repositories\BaseRepository;

/**
 * Class SettingRepository
 * @package App\Repositories\Admin
 */
class SettingRepository extends BaseRepository
{
    /**
     * SettingRepository constructor.
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    /**
     * @param string $by
     * @return mixed
     */
    public function getAllGrouped(string $by)
    {
        return $this->model::get()->groupBy($by);
    }
}
