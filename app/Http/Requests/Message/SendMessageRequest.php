<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'thread_id' => [
                'required',
                'int',
            ],
            'user_id' => [
                'required',
                'int',
            ],
            'body' => [
                'required',
                'string',
            ],
        ];
    }
}
