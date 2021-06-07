<?php

namespace App\Http\Requests\Gift;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GiftSendToWomanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'woman_id' => [
                'required',
                'integer',
//                Rule::exists('women', 'id'),
            ],
            'gift_id' => [
                'required',
                'integer',
//                Rule::exists('gifts', 'id'),
            ]
        ];
    }
}
