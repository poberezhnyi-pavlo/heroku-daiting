<?php

namespace App\Http\Requests\UserStore;

use App\Models\Woman;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

/**
 * Class UserStoreRequest
 * @package App\Http\Requests\UserStore
 */
class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('admin-panel');
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // intercept and change data on 'deleted_at' field
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
        if ($this->woman) {
            return Arr::collapse([
                $this->getUserRules(),
                $this->getWomanRules(),
            ]);
        } elseif ($this->man) {
            return Arr::collapse([
                $this->getUserRules(),
                $this->getManRules(),
            ]);
        }

        return $this->getUserRules();
    }

    /**
     * @return array
     */
    private function getUserRules(): array
    {
        return [
            'user.name' => [
                'string',
            ],
            'user.last_name' => [
                'string',
            ],
            'user.email' => [
                'email',
                'unique:users,email',
                'max:255',
            ],
            'user.password' => [
                'string',
                'min:8',
            ],
            'user.phone' => [
                'string',
                'min:8',
            ],
            'user.avatar' => [
                'image',
                'nullable',
            ],
        ];
    }

    /**
     * @return array
     */
    private function getWomanRules(): array
    {
        return [
            'woman.birth_date' => [
                'date',
                'nullable',
            ],
            'woman.amount_of_children' => [
                'numeric',
            ],
            'woman.height' => [
                'numeric',
            ],
            'woman.weight' => [
                'numeric',
            ],
            'woman.eye_color' => [
                Rule::in(Woman::EYE_COLORS),
            ],
            'woman.hair_color' => [
                Rule::in(Woman::HAIR_COLORS),
            ],
            'woman.education' => [
                'string',
                'nullable',
            ],
            'woman.job' => [
                'string',
                'nullable',
            ],
            'woman.vises' => [
                'string',
                'nullable',
            ],
            'woman.creed' => [
                'string',
                'nullable',
            ],
            'woman.bad_habits' => [
                'string',
                'nullable',
            ],
            'woman.ideal_man' => [
                'string',
                'nullable',
            ],
            'woman.about_myself' => [
                'string',
                'nullable',
            ],
            'woman.city' => [
                'string',
                'nullable',
            ],
            'woman.video.*' => [
                'url',
                'nullable',
            ],
            'woman.image.*' => [
                'image',
                'nullable',
            ],
        ];
    }

    /**
     * @return array
     */
    private function getManRules(): array
    {
        return [
            'man.country' => [
                'string',
                'nullable',
            ],
            'man.city' => [
                'string',
                'nullable',
            ],
            'man.address' => [
                'string',
                'nullable',
            ],
            'man.post_index' => [
                'numeric',
                'nullable',
            ],
            'man.birth_date' => [
                'date',
                'nullable',
            ],
            'man.height' => [
                'numeric',
            ],
            'man.weight' => [
                'numeric',
            ],
            'man.eye_color' => [
                Rule::in(Woman::EYE_COLORS),
            ],
            'man.hair_color' => [
                Rule::in(Woman::HAIR_COLORS),
            ],
            'man.about_myself' => [
                'string',
                'nullable',
            ],
            'man.interests' => [
                'string',
                'nullable',
            ],
            'man.education' => [
                'string',
                'nullable',
            ],
            'man.job' => [
                'string',
                'nullable',
            ],
            'man.creed' => [
                'string',
                'nullable',
            ],
            'man.bad_habits' => [
                'string',
                'nullable',
            ],
            'man.langs' => [
                'array',
            ],
            'man.age_of_woman' => [
                'numeric',
            ],
            'man.about_woman' => [
                'string',
                'nullable',
            ],
        ];
    }
}
