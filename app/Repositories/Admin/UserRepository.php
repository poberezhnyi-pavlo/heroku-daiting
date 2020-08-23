<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository
 * @package App\Repositories\Admin
 */
class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function storeUser (array $data): Model
    {
        if (isset($data['avatar'])) {
            $data['avatar'] = $this->storeImage(
                $data['avatar'],
                User::AVATAR_PATH
            );
        }

        return $this->store($data);
    }
}
