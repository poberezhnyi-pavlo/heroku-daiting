<?php

namespace App\Http\Requests\HomeSlide;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateSlideRequest
 * @package App\Http\Requests\HomeSlide
 */
class UpdateSlideRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.title' => [
                'string',
            ],
            '*.body' => [
                'string',
            ],
            'image' => [
                'mimes:jpg,png,jpeg',
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
