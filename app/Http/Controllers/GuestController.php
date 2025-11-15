<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guest\IndexGuestRequest;
use App\Http\Requests\Guest\CreateGuestRequest;
use App\Http\Requests\Guest\StoreGuestRequest;
use App\Http\Requests\Guest\ViewGuestRequest;
use App\Http\Requests\Guest\UpdateGuestRequest;
use App\Http\Requests\Guest\DeleteGuestRequest;
use App\Services\GuestService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GuestController extends Controller
{
    public function __construct(
        private readonly GuestService $guestService
    ) {}

    public function index(IndexGuestRequest $request): View
    {
        $guests = $this->guestService->getAllPaginated(10);
        return view('guests.index', compact('guests'));
    }

    public function create(CreateGuestRequest $request): View
    {
        return view('guests.create');
    }

    public function store(StoreGuestRequest $request): RedirectResponse
    {
        $data = $request->sanitized();
        $this->guestService->create($data);

        return redirect()->route('guests.index')
            ->with('success', 'Guest created successfully.');
    }

    public function show(ViewGuestRequest $request): View
    {
        $guest = $this->guestService->getById($request->id);

        return view('guests.show', compact('guest'));
    }

    public function edit(ViewGuestRequest $request): View
    {
        $guest = $this->guestService->getById($request->id);

        return view('guests.edit', compact('guest'));
    }

    public function update(UpdateGuestRequest $request): RedirectResponse
    {
        $data = $request->sanitized();

        $this->guestService->update($request->id, $data);

        return redirect()->route('guests.index')
            ->with('success', 'Guest updated successfully.');
    }

    public function destroy(DeleteGuestRequest $request): RedirectResponse
    {
        $this->guestService->delete($request->id);

        return redirect()->route('guests.index')
            ->with('success', 'Guest deleted successfully.');
    }
}
