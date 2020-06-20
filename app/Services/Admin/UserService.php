<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use App\Services\BaseService;

/**
 * Class UserService
 * @package App\Services\Admin
 */
class UserService extends BaseService
{
    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @param array $request
     * @return array
     */
    public function index(array $request): array
    {
        return $this->repository->get($request);
    }
}
