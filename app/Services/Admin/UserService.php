<?php

namespace App\Services\Admin;

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
    protected $womanRepository;

    /**
     * @var ManRepository
     */
    protected $manRepository;

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

        $user =  $this->repository->storeUser($data['user']);

        if (array_key_exists('woman', $data)) {
            $woman = $this->womanRepository->storeWoman($data['woman']);
            $user->user()->associate($woman)->save();
        }

        return $user;
    }

    public function updateUser(array $request)
    {

    }
}
