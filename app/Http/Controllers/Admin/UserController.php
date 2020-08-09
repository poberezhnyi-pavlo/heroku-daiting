<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\VueTableRequest;
use App\Models\Man;
use App\Models\User;
use App\Models\Woman;
use App\Services\Admin\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Languages;
use Countries;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends BaseController
{
    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()
            ->view('admin.users.index', [
                'type' => User::ROLE_ADMIN,
            ]);
    }

    /**
     * @return Response
     */
    public function womanIndex(): Response
    {
        return response()
            ->view('admin.users.index', [
                'type' => Woman::class,
            ]);
    }

    /**
     * @return Response
     */
    public function manIndex(): Response
    {
        return response()
            ->view('admin.users.index', [
                'type' => Man::class,
            ]);
    }

    /**
     * @param VueTableRequest $tableRequest
     * @return JsonResponse
     */
    public function fetch(VueTableRequest $tableRequest): JsonResponse
    {
        $data = $this->service
            ->userIndex($tableRequest->all());

        return response()->json($data);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function deactivate(int $id): RedirectResponse
    {
        $this->service->disable($id);

        return redirect()->back()
        ->with(['warning' => 'The user was deactivated']);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function activate(int $id): RedirectResponse
    {
        $this->service->restore($id);

        return redirect()->back()
            ->with(['success' => 'The user was activate']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param UserCreateRequest $request
     * @return Response
     */
    public function create(UserCreateRequest $request): Response
    {
        return response()->view('admin.users.create', [
            'roles' => array_diff( //remove User role
                User::ROLES,
                [User::ROLE_USER]
            ),
            'type' => $request->type,
            'eyeColors' => Woman::EYE_COLORS,
            'hairColors' => Woman::HAIR_COLORS,
            'langs' => Languages::keyValue(),
            'countries' => Countries::keyValue(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $user
     * @return Response
     */
    public function show(int $user): Response
    {
        $result = $this->service->getItem($user, true);

        return response()
            ->view('admin.users.show', ['user'=> $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        /**
         * @var User
         */
        $user = $this->service
            ->getItem($id, true);

        return response()->view('admin.users.edit', [
            'user' => $user,
            'roles' => $user->getRoles(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, int $id): RedirectResponse
    {
        $array = $request->except([
            '_token',
            '_method',
        ]);

        if ($request->hasFile('avatar')) {
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $array['avatar'] = $request->file('avatar')
                ->storeAs(
                    'avatars',
                    $request->user()->id . '.' . $ext, 'public'
                );
        }

        $this->service->updateWhere($array, $id);

        return redirect()->back()
            ->with(['success' => 'The user was updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $this->service->remove($id);

        return redirect(route('users.index'))
            ->with(['success' => 'The user was deleted successfully']);
    }

    /**
     * @param Request $data
     * @param int $id
     * @return JsonResponse
     */
    public function updateJson(Request $data, int $id): JsonResponse
    {
        $result = $this->service
            ->updateWhere($data->all(), $id);

        return response()->json($result);
    }
}
