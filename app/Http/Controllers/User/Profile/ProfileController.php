<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\BaseController;
use App\Http\Requests\User\Profile\ProfileRequest;
use App\Models\User;
use App\Services\User\Profile\ProfileService;
use Illuminate\Http\Response;
use Languages;
use Countries;

class ProfileController extends BaseController
{
    public function __construct(ProfileService $profileService)
    {
        $this->service = $profileService;
    }

    public function showForm(User $user): Response
    {
        return response()->view(
            'site.pages.profile.profile.show', [
                'user' => $user,
            ]
        );
    }

    public function store(ProfileRequest $request, User $user): Response
    {
        $userUpdateProfile = $this->service->store($user, $request->validated());

        return response()->view('site.pages.profile.edit', ['user' => $userUpdateProfile]);
    }
}
