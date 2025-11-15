<?php

namespace App\Http\Requests\Reservation;

use App\Enums\ReservationStatusEnum;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class StoreReservationRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'room_id' => 'required|exists:rooms,id',
            'guest_id' => 'required|exists:guests,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'status' => ['sometimes', Rule::enum(ReservationStatusEnum::class)],
        ];
    }
}
