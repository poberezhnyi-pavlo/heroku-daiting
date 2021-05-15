<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use Illuminate\View\View;

/**
 * Class MessageController
 * @package App\Http\Controllers\Admin
 */
class MessageController extends Controller
{
    private UserService $userService;

    /**
     * MessageController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $men = $this->userService->indexMen();
        $women = $this->userService->indexWomen();

        return view('admin.messages.index', [
            'men' => $men,
            'women' => $women,
        ]);
    }
}
