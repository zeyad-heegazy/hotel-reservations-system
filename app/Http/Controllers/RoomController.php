<?php

namespace App\Http\Controllers;

use App\Http\Requests\Room\CreateRoomRequest;
use App\Http\Requests\Room\DeleteRoomRequest;
use App\Http\Requests\Room\IndexRoomRequest;
use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Http\Requests\Room\ViewRoomRequest;
use App\Services\RoomService;
use App\Services\HotelService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoomController extends Controller
{
    public function __construct(
        private readonly RoomService $roomService,
        private readonly HotelService $hotelService
    ) {}

    public function index(IndexRoomRequest $request): View
    {
        $rooms = $this->roomService->getAllPaginated(10);
        return view('rooms.index', compact('rooms'));
    }

    public function create(CreateRoomRequest $request): View
    {
        $hotels = $this->hotelService->getAll();
        return view('rooms.create', compact('hotels'));
    }

    public function store(StoreRoomRequest $request): RedirectResponse
    {
        $data = $request->sanitized();
        $this->roomService->create($data);
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(ViewRoomRequest $request): View
    {
        $room = $this->roomService->getById($request->id);
        return view('rooms.show', compact('room'));
    }

    public function edit(ViewRoomRequest $request): View
    {
        $room = $this->roomService->getById($request->id);
        $hotels = $this->hotelService->getAllPaginated(100);

        return view('rooms.edit', compact('room', 'hotels'));
    }

    public function update(UpdateRoomRequest $request): RedirectResponse
    {
        $data = $request->sanitized();
        $this->roomService->update($request->id, $data);
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(DeleteRoomRequest $request): RedirectResponse
    {
        $this->roomService->delete($request->id);
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
