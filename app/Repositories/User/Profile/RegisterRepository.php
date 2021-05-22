<?php

namespace App\Repositories\User\Profile;

use App\Models\User;
use App\Repositories\BaseRepository;

final class RegisterRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
