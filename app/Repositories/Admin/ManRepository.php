<?php

namespace App\Repositories\Admin;

use App\Models\Man;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class ManRepository
 * @package App\Repositories\Admin
 */
class ManRepository extends BaseRepository
{
    /**
     * ManRepository constructor.
     * @param Man $man
     */
    public function __construct(Man $man)
    {
        $this->model = $man;
    }

    /**
     * @param array $data
     * @param Man $man
     * @return bool
     */
    public function updateMan(array $data, Man $man): bool
    {
        return $man->update($data);
    }

    public function getMan(int $userId): Man
    {
        return User::whereKey($userId)->first()->user;
    }
}
