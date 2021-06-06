<?php

namespace App\Repositories\User;

use App\Models\Woman;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

final class WomenRepository extends BaseRepository
{
    private const COUNT_WOMAN_FOR_SCROLL = 3;

    public function __construct(Woman $woman)
    {
        $this->model = $woman;
    }

    public function getWomenForGallery(array $params): LengthAwarePaginator
    {
        return $this
            ->model
            ->newQuery()
            ->leftJoin('users', function (JoinClause $query) {
                $query->on('women.id', '=', 'users.user_id');
                $query->where('users.user_type', '=', Woman::class);
            })
            ->select([
                'women.id as id',
                'users.avatar as avatar',
                DB::raw('CONCAT(users.name, \' \', users.last_name) as full_name')
            ])
            ->paginate($params['limit'])
        ;
    }

    public function getWoman(array $params): Collection
    {
        return $this
            ->model
            ->newQuery()
            ->leftJoin('users', function (JoinClause $query) {
                $query->on('women.id', '=', 'users.user_id');
                $query->where('users.user_type', '=', Woman::class);
            })
            ->select([
                'women.id as id',
                'users.avatar as avatar',
                DB::raw('CONCAT(users.name, \' \', users.last_name) as full_name')
            ])
            ->offset($params['from'] ?? 0)
            ->limit($params['count'] ?? self::COUNT_WOMAN_FOR_SCROLL)
            ->get()
        ;
    }
}
