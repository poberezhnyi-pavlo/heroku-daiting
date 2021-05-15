<?php

namespace App\Http\Requests\Message;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CreateMessageRequest
 * @package App\Http\Requests\Message
 */
class CreateMessageRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'subject' => [
                'string',
                'nullable',
                'max:200',
            ],
            'message' => [
                'string',
                'required',
                'max:800',
            ],
            'from' => [
                Rule::exists(User::class, 'id'),
                'required',
            ],
            'to' => [
                Rule::exists(User::class, 'id'),
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
