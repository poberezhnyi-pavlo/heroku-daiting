<?php

namespace App\Http\Requests\Gift;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;

/**
 * Class EditGiftRequest
 * @package App\Http\Requests\Gift
 */
class EditGiftRequest extends FormRequest
{
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
                'mimes:jpg,png,jpeg',
            ],
            'price' => [
                'numeric',
            ],
            'deleted_at' => [
                'date',
                'nullable',
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'deleted_at' => $this->has('published')
                ? null
                : new \DateTime(),
        ]);
    }
}
