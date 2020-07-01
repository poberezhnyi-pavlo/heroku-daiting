<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use App\Services\BaseService;
use Exception;

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
    public function userIndex(array $request): array
    {
        return $this->repository->get($request);
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws Exception
     */
    public function disable($id): ?bool
    {
        return $this->repository->remove($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getItem(int $id)
    {
        return $this->repository->getById($id, true);
    }
}
