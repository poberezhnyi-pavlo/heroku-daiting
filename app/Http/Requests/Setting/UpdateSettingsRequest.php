<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateSettingsRequest
 * @package App\Http\Requests\Setting
 */
class UpdateSettingsRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.id' => [
                'integer',
                'required',
            ],
            '*.key' => [
                'string',
                'required',
            ],
            '*.value' => [
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
