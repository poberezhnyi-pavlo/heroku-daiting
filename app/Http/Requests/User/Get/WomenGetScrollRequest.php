<?php

namespace App\Http\Requests\User\Get;

use Illuminate\Foundation\Http\FormRequest;

class WomenGetScrollRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'from' => [
                'nullable',
                'int',
            ],
            'count' => [
                'nullable',
                'int',
            ]
        ];
    }
}
