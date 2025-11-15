<?php

namespace App\Services;

use App\Models\Room;
use App\Repositories\RoomRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class RoomService
{
    public function __construct(
        protected RoomRepository $repository
    ) {}

    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($perPage);
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): Room
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Room
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Room
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
