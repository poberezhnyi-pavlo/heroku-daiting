<?php

namespace App\Http\Requests\User\Profile;

use App\Models\User;
use App\Models\Woman;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        /** @var User $user */
        $user = $this->route('man');

        return [
            'name' => [
                'string',
            ],
            'last_name' => [
                'string',
            ],
            'email' => [
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
                'max:255',
            ],
            'phone' => [
                'string',
                'min:8',
            ],
            'avatar' => [
                'image',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'post_index' => [
                'numeric',
                'nullable',
            ],
            'birth_date' => [
                'date',
                'nullable',
            ],
            'height' => [
                'numeric',
            ],
            'weight' => [
                'numeric',
            ],
            'eye_color' => [
                Rule::in(Woman::EYE_COLORS),
            ],
            'hair_color' => [
                Rule::in(Woman::HAIR_COLORS),
            ],
            'about_myself' => [
                'string',
                'nullable',
            ],
            'interests' => [
                'string',
                'nullable',
            ],
            'education' => [
                'string',
                'nullable',
            ],
            'job' => [
                'string',
                'nullable',
            ],
            'creed' => [
                'string',
                'nullable',
            ],
            'bad_habits' => [
                'string',
                'nullable',
            ],
            'langs' => [
                'array',
            ],
            'age_of_woman' => [
                'numeric',
            ],
            'about_woman' => [
                'string',
                'nullable',
            ],
        ];
    }
}
