<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hotel\CreateHotelRequest;
use App\Http\Requests\Hotel\DeleteHotelRequest;
use App\Http\Requests\Hotel\IndexHotelRequest;
use App\Http\Requests\Hotel\StoreHotelRequest;
use App\Http\Requests\Hotel\UpdateHotelRequest;
use App\Http\Requests\Hotel\ViewHotelRequest;
use App\Services\HotelService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HotelController extends Controller
{
    public function __construct(
        private readonly HotelService $hotelService
    )
    {
    }

    public function index(IndexHotelRequest $request): View
    {
        $hotels = $this->hotelService->getAllPaginated(10);
        return view('hotels.index', compact('hotels'));
    }

    public function create(CreateHotelRequest $request): View
    {
        return view('hotels.create');
    }

    public function store(StoreHotelRequest $request): RedirectResponse
    {
        $data = $request->sanitized();
        $this->hotelService->create($data);

        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function show(ViewHotelRequest $request): View
    {
        $hotel = $this->hotelService->getById($request->id);
        return view('hotels.show', compact('hotel'));
    }

    public function edit(ViewHotelRequest $request): View
    {
        $hotel = $this->hotelService->getById($request->id);
        return view('hotels.edit', compact('hotel'));
    }


    public function update(UpdateHotelRequest $request): RedirectResponse
    {
        $data = $request->sanitized();
        $this->hotelService->update($request->id, $data);
        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy(DeleteHotelRequest $request): RedirectResponse
    {
        $this->hotelService->delete($request->id);
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}

