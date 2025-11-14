<?php

namespace App\Repositories;

use App\Models\Guest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class GuestRepository
{
    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Guest::with(['reservations'])->orderBy('created_at', 'desc')->paginate($perPage);
    }
    public function getAll(): Collection
    {
        return Guest::all();
    }
    public function getById(int $guestId): Guest
    {
        return Guest::findOrFail($guestId);
    }
    public function create(array $data): Guest
    {
        return Guest::create($data);
    }
    public function update(int $guestId, array $data): Guest
    {
        $guest = Guest::findOrFail($guestId);
        $guest->update($data);

        return $guest;
    }
    public function delete(int $guestId): bool
    {
        return Guest::findOrFail($guestId)->delete();
    }
}
