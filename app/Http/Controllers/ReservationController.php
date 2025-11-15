<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reservation\IndexReservationRequest;
use App\Http\Requests\Reservation\CreateReservationRequest;
use App\Http\Requests\Reservation\StoreReservationRequest;
use App\Http\Requests\Reservation\ViewReservationRequest;
use App\Http\Requests\Reservation\DeleteReservationRequest;
use App\Http\Requests\Reservation\CancelReservationRequest;

use App\Services\ReservationService;
use App\Services\RoomService;
use App\Services\GuestService;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
    public function __construct(
        private readonly ReservationService $reservationService,
        private readonly RoomService $roomService,
        private readonly GuestService $guestService
    ) {}

    public function index(IndexReservationRequest $request): View
    {
        $reservations = $this->reservationService->getAllPaginated(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create(CreateReservationRequest $request): View
    {
        $rooms  = $this->roomService->getAll();
        $guests = $this->guestService->getAll();

        return view('reservations.create', compact('rooms', 'guests'));
    }

    /**
     * Store new reservation
     * @throws \Exception
     */
    public function store(StoreReservationRequest $request): RedirectResponse
    {
        $data = $request->sanitized();

        $this->reservationService->reserve($data);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    public function show(ViewReservationRequest $request): View
    {
        $reservation = $this->reservationService->getById($request->id);

        return view('reservations.show', compact('reservation'));
    }

    /**
     * CANCEL reservation
     */
    public function cancel(CancelReservationRequest $request): RedirectResponse
    {
        $this->reservationService->cancel($request->id);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservation cancelled successfully.');
    }

    /**
     * DELETE reservation
     */
    public function destroy(DeleteReservationRequest $request): RedirectResponse
    {
        $this->reservationService->delete($request->id);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservation deleted successfully.');
    }
}
