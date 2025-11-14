<?php

namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class HotelRepository
{

    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Hotel::with(['rooms'])->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function getAll(): Collection
    {
        return Hotel::all();
    }

    public function getById(int $hotelId): Hotel
    {
        return Hotel::findOrFail($hotelId);
    }
    public function create(array $data): Hotel
    {
        return Hotel::create($data);
    }
    public function update(int $hotelId, array $data): Hotel
    {
        $hotel = Hotel::findOrFail($hotelId);
        $hotel->update($data);

        return $hotel;
    }
    public function delete(int $hotelId): bool
    {
        return Hotel::findOrFail($hotelId)->delete();
    }
}
