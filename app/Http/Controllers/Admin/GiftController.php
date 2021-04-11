<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Gift\CreateGiftRequest;
use App\Http\Requests\Gift\EditGiftRequest;
use App\Models\Gift;
use App\Services\Admin\GiftService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class GiftController
 * @package App\Http\Controllers\Admin
 */
class GiftController extends BaseController
{
    /**
     * GiftController constructor.
     * @param GiftService $giftService
     */
    public function __construct(GiftService $giftService)
    {
        $this->service = $giftService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $gifts = $this->service->index(true);

        return response()->view('admin.gifts.index', [
            'gifts' => $gifts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('admin.gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateGiftRequest $request
     * @return RedirectResponse
     */
    public function store(CreateGiftRequest $request): RedirectResponse
    {
        $this->service->storeGift($request->all());

        return redirect()->route('gifts.index')
            ->with('success', 'The Gift has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $gift = $this->service->getItem($id, true);

        return response()->view('admin.gifts.edit', [
            'gift' => $gift,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditGiftRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(EditGiftRequest $request, $id): RedirectResponse
    {
        $this->service->updateGift($request, $id);

        return redirect()->route('gifts.index')
            ->with('success', 'The Gift has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->removeGift($id);

        return redirect()->route('gifts.index')
            ->with('success', 'The Gift has been deleted!');
    }
}
