<?php

namespace App\Http\Requests\User\Get;

use Illuminate\Foundation\Http\FormRequest;

class WomenGetRequest extends FormRequest
{
    protected const DEFAULT_LIMIT = 10;

    public function all($keys = null): array
    {
        $data = parent::all($keys);

        $data['limit'] = $data['limit'] ?? self::DEFAULT_LIMIT;

        return $data;
    }

    public function rules(): array
    {
        return [
            'page' => [
                'int',
                'min:1',
            ],
            'limit' => [
                'int',
                'min:1',
            ],
        ];
    }
}
