<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class VueTableRequest
 * @package App\Http\Requests
 */
class VueTableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'query' => [
                'nullable',
            ],
            'limit' => [
                'required',
                'integer',
            ],
            'page' => [
                'required',
                'integer',
            ],
            'orderBy' => [
                'string',
            ],
            'ascending' => [
                'required',
                'integer',
            ],
            'byColumn' => [
                'required',
                'boolean',
            ],
        ];
    }
}
