<?php

namespace App\Services\User\Profile;

use App\Repositories\User\Profile\RegisterRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

final class RegisterService extends BaseService
{
    public function __construct(RegisterRepository $registerRepository)
    {
        $this->repository = $registerRepository;
    }

    public function register(array $data): Model
    {
        $userData = Arr::except($data,'password');

        return $this->repository->store(Arr::add($userData, 'password', Hash::make($data['password'])));
    }
}
