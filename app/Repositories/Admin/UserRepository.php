<?php

namespace App\Repositories\Admin;

use App\Helpers\ImageHelper;
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
            $data['avatar'] = ImageHelper::storeImage(
                $data['avatar'],
                User::AVATAR_PATH
            );
        }

        return $this->store($data);
    }

    /**
     * @param array $data
     * @param User $user
     * @return User
     */
    public function updateUser(array $data, User $user): User
    {
        if (isset($data['avatar'])) {
            ImageHelper::removeImage($user->avatar);

            $data['avatar'] = ImageHelper::storeImage(
                $data['avatar'],
                User::AVATAR_PATH
            );

        }
        $user->update($data);

        return $user;
    }

    /**
     * @param User $user
     * @return bool|null
     */
    public function forceDeleteUser(User $user): ?bool
    {
        if ($user->user) {
            $user->user->forceDelete();
        }

        return $user->forceDelete();
    }

    /**
     * @return mixed
     */
    public function getAllManUsers()
    {
        return $this->model::query()
            ->hasManRelation()
            ->get();
    }

    /**
     * @return mixed
     */
    public function getAllWomanUsers()
    {
        return $this->model::query()
            ->hasWomanRelation()
            ->get();
    }
}
