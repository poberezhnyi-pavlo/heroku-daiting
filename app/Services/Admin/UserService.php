<?php

namespace App\Services\Admin;

use App\Models\Man;
use App\Models\User;
use App\Models\Woman;
use App\Repositories\Admin\ManRepository;
use App\Repositories\Admin\UserRepository;
use App\Repositories\Admin\WomanRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class UserService
 * @package App\Services\Admin
 */
class UserService extends BaseService
{
    /**
     * @var WomanRepository
     */
    protected WomanRepository $womanRepository;

    /**
     * @var ManRepository
     */
    protected ManRepository $manRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     * @param WomanRepository $womanRepository
     * @param ManRepository $manRepository
     */
    public function __construct(
        UserRepository $userRepository,
        WomanRepository $womanRepository,
        ManRepository $manRepository
    )
    {
        $this->repository = $userRepository;
        $this->womanRepository = $womanRepository;
        $this->manRepository = $manRepository;
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
     * @param array $data
     * @return Model
     */
    public function storeUser(array $data): Model
    {
        if (!array_key_exists('password', $data['user'])) {
            $data['user']['password'] = Hash::make(Str::random(10));
        }

        /** @var User $user */
        $user =  $this->repository->storeUser($data['user']);

        if (array_key_exists('woman', $data)) {
            /** @var Woman $woman */
            $woman = $this->womanRepository->storeWoman($data['woman']);
            $user->user()->associate($woman)->save();
        }

        if (array_key_exists('man', $data)) {
            /** @var Man $man */
            $man = $this->manRepository->store($data['man']);
            $user->user()->associate($man)->save();
        }

        return $user;
    }

    /**
     * @param array $data
     * @param int $userId
     * @return User
     */
    public function updateUser(array $data, int $userId): User
    {
        /**
         * @var User
         */
        $user = $this->repository->getById($userId, true);

        $updatedUser = $this->repository
            ->updateUser($data['user'], $user);

        if (array_key_exists('woman', $data)) {
            $this->womanRepository->updateWoman($data['woman'], $user->user);
        }

        if (array_key_exists('man', $data)) {
            $this->manRepository->updateMan($data['man'], $user->user);
        }

        return $updatedUser;
    }

    /**
     * @param int $userId
     * @return bool|null
     */
    public function destroyUser(int $userId): ?bool
    {
        /**
         * @var User
         */
        $user = $this->repository->getById($userId, true);

        return $this->repository
            ->forceDeleteUser($user);
    }

    /**
     * @return mixed
     */
    public function indexMen()
    {
        return $this->repository->getAllManUsers();
    }

    /**
     * @return mixed
     */
    public function indexWomen()
    {
        return $this->repository->getAllWomanUsers();
    }
}
