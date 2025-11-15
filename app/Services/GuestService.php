<?php

namespace App\Services;

use App\Models\Guest;
use App\Repositories\GuestRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class GuestService
{
    public function __construct(
        protected GuestRepository $repository
    ) {}

    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($perPage);
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): Guest
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Guest
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Guest
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
