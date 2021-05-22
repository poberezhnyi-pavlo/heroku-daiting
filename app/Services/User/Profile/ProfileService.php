<?php

namespace App\Services\User\Profile;

use App\Models\User;
use App\Repositories\Admin\UserRepository;
use App\Repositories\User\Profile\ManRepository;
use App\Services\BaseService;

final class ProfileService extends BaseService
{
    private UserRepository $userRepository;

    public function __construct(ManRepository $profileRepository, UserRepository $userRepository)
    {
        $this->repository = $profileRepository;
        $this->userRepository = $userRepository;
    }

    public function store(User $user, array $data): User
    {
        $this->userRepository->updateUser($data, $user);
        $man = $this->repository->store($data);

        $user->user()->associate($man)->save();

        $user->refresh();

        return $user;
    }
}
