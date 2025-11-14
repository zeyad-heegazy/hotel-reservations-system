<?php

namespace App\Repositories;

use App\Enums\ReservationStatusEnum;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ReservationRepository
{
    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Reservation::with(['room', 'guest'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getAll(): Collection
    {
        return Reservation::all();
    }


    public function getById(int $reservationId): Reservation
    {
        return Reservation::findOrFail($reservationId);
    }

    public function create(array $data): Reservation
    {
        return Reservation::create($data);
    }

    public function cancel(int $reservationId): Reservation
    {
        $reservation = Reservation::findOrFail($reservationId);
        $reservation->update([
            'status' => ReservationStatusEnum::CANCELLED->value,
        ]);

        return $reservation;
    }


    public function findAvailableRoom(int $roomId, string $checkIn, string $checkOut): bool
    {
        return !Reservation::where('room_id', $roomId)
            ->where(function ($q) use ($checkIn, $checkOut) {
                $q->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                        $q2->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();
    }

    public function getTotalPrice(string $checkIn,string $checkOut ,Room $room): int
    {
        $nights = Carbon::parse($checkIn)
            ->diffInDays(Carbon::parse($checkOut));

       return $room->price_per_night * $nights;
    }
}
