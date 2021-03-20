<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Setting\UpdateSettingsRequest;
use App\Services\Admin\SettingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

/**
 * Class SettingController
 * @package App\Http\Controllers\Admin
 */
class SettingController extends BaseController
{
    /**
     * SettingController constructor.
     * @param SettingService $settingService
     */
    public function __construct(SettingService $settingService)
    {
        $this->service = $settingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $data = $this->service->getSettings();

        return response()
            ->view('admin.settings.index', [
                'data' => $data,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSettingsRequest $request
     * @return Collection
     */
    public function update(UpdateSettingsRequest $request): Collection
    {
        return $this->service
            ->updateSettings($request->all());
    }

}
