<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use App\Services\BaseService;

/**
 * Class DashboardService
 * @package App\Services\Admin
 */
class DashboardService extends BaseService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @return array
     */
    public function getUserData(): array
    {
        return [
            'man' => $this->repository->geCount(['role' => 'man']),
            'woman' => $this->repository->geCount(['role' => 'woman']),
        ];
    }
}
