<?php

namespace App\Services;

use App\Models\Hotel;
use App\Repositories\HotelRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class HotelService
{
    public function __construct(
        protected HotelRepository $repository
    ) {}

    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($perPage);
    }

    public function getById(int $id): Hotel
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Hotel
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Hotel
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
