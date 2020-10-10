<?php

namespace App\Http\Requests;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
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
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $user = $this->input('user');
        $user['deleted_at'] = $this->input('user.deleted_at') ? null : now();

        $this->request->add([
            'user' => $user,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string',
            ],
            'email' => [
                'email',
            ],
            'phone' => [
                'string',
                'min:8',
            ],
            'avatar' => [
                'image',
                'nullable',
            ],
            'role' => [
                Rule::in(array_merge(
                        User::ROLES,
                        [
                            User::ROLE_SUPER_ADMIN,
                        ]
                    )
                ),
            ],
        ];
    }
}
