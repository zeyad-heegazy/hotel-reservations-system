<?php

namespace App\Services;

use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use App\Repositories\RoomRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReservationService
{
    public function __construct(
        protected ReservationRepository $repository,
        protected RoomRepository $roomRepository,
    ) {}

    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($perPage);
    }

    public function getById(int $id): Reservation
    {
        return $this->repository->getById($id);
    }

    /**
     * @throws \Exception
     */
    public function reserve(array $data): Reservation
    {
        $available = $this->repository->findAvailableRoom(
            $data['room_id'],
            $data['check_in'],
            $data['check_out']
        );

        if (!$available) {
            throw new \Exception('Room is not available for these dates.');
        }


        $room = $this->roomRepository->getById($data['room_id']);

        $data['total_price'] = $this->repository->getTotalPrice($data['check_in'], $data['check_out'], $room);

        return $this->repository->create($data);
    }

    public function cancel(int $reservationId): Reservation
    {
        return $this->repository->cancel($reservationId);
    }
    public function delete(int $reservationId): bool
    {
        return $this->repository->delete($reservationId);
    }
}
