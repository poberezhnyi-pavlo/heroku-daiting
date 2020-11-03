<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ImageOrderRequest
 * @package App\Http\Requests
 */
class ImageOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.id' => 'numeric',
            '*.uri' => 'string',
            '*.order' => 'numeric',
            '*.woman_id' => Rule::exists('women', 'id'),
            '*.created_at' => 'date',
            '*.updated_at' => 'date',
        ];
    }
}
