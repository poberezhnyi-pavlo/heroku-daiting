<?php

namespace App\Http\Requests\HomeSlide;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateSlideRequest
 * @package App\Http\Requests\HomeSlide
 */
class CreateSlideRequest extends FormRequest
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
                'required',
                'mimes:jpg,png,jpeg',
            ],
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
