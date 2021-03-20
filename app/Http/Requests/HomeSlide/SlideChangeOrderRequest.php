<?php

namespace App\Http\Requests\HomeSlide;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SlideChangeOrderRequest
 * @package App\Http\Requests\HomeSlide
 */
class SlideChangeOrderRequest extends FormRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            '*.id' => [
                'numeric',
                'required',
            ],
            '*.order' => [
                'numeric',
                'required',
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
