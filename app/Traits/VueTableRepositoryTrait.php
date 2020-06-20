<?php

namespace App\Traits;

use Carbon\Carbon;

/**
 * Trait VueTableRepositoryTrait
 * @package App\Traits
 */
trait VueTableRepositoryTrait
{
    /**
     * @param array $request
     * @param array $fields
     * @return array
     */
    public function get(array $request, array $fields=[]): array
    {
        extract($request,EXTR_OVERWRITE);

        $data = $this->model->whereNotIn('role', ['superAdmin'])->select();
        $decodedQuery = json_decode($query, true);

        if (isset($decodedQuery) && $decodedQuery) {
            $data = $byColumn == 1 ?
                $this->filterByColumn($data, $decodedQuery) :
                $this->filter($data, $decodedQuery, $fields);
        }

        $count = $data->count();

        $data->limit($limit)
            ->skip($limit * ($page - 1));

        if (isset($orderBy)) {
            $direction = $ascending == 1 ? 'ASC' : 'DESC';
            $data->orderBy($orderBy, $direction);
        }

        //TODO: needs to refactor
        $results = $data->withTrashed()->get()->toArray();

        return [
            'data' => $results,
            'count' => $count,
        ];
    }

    /**
     * @param $data
     * @param $queries
     * @return mixed
     */
    protected function filterByColumn($data, $queries)
    {
        return $data->where(static function ($q) use ($queries) {
            foreach ($queries as $field => $query) {
                if (is_string($query)) {
                    $q->where($field, 'LIKE', "%{$query}%");
                } else {
                    $start = Carbon::createFromFormat('Y-m-d H:m:s', $query['start'])->startOfDay();
                    $end = Carbon::createFromFormat('Y-m-d H:m:s', $query['end'])->endOfDay();

                    $q->whereBetween($field, [$start, $end]);
                }
            }
        });
    }

    /**
     * @param $data
     * @param $query
     * @param $fields
     * @return mixed
     */
    protected function filter($data, $query, $fields)
    {
        return $data->where(static function ($q) use ($query, $fields) {
            foreach ($fields as $index => $field) {
                $method = $index ? 'orWhere' : 'where';
                $q->{$method}($field, 'LIKE', "%{$query}%");
            }
        });
    }
}
