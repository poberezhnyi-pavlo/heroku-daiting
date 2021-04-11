<?php

namespace App\Http\Requests\Gift;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateGiftRequest
 * @package App\Http\Requests\Gift
 */
class CreateGiftRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.title' => [
                'string',
                'nullable',
            ],
            '*.description' => [
                'string',
                'nullable',
            ],
            'image' => [
                'required',
                'mimes:jpg,png,jpeg',
            ],
            'price' => [
                'numeric',
                'required',
            ],
            'published' => [

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
