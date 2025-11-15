<?php

namespace App\Http\Requests\Room;

use App\Enums\RoomTypeEnum;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class StoreRoomRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'hotel_id' => 'required|exists:hotels,id',
            'number' => 'required|string',
            'type' => ['required', 'string',Rule::enum(RoomTypeEnum::class)],
            'price_per_night' => 'required|numeric'
        ];
    }
}
