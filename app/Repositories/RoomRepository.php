<?php

namespace App\Repositories;

use App\Models\Room;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class RoomRepository
{
    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Room::with('hotel')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
    public function getAll(): Collection
    {
        return Room::with('hotel')->get();
    }
    public function getById(int $roomId): Room
    {
        return Room::with('hotel')->findOrFail($roomId);
    }
    public function create(array $data): Room
    {
        return Room::create($data);
    }
    public function update(int $roomId, array $data): Room
    {
        $room = Room::findOrFail($roomId);
        $room->update($data);

        return $room;
    }
    public function delete(int $roomId): bool
    {
        return Room::findOrFail($roomId)->delete();
    }
}
