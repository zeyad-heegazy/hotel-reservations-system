<?php

namespace App\Http\Requests\Room;

use App\Enums\RoomTypeEnum;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UpdateRoomRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:rooms,id',
            'hotel_id' => 'sometimes|exists:hotels,id',
            'number' => 'sometimes|string',
            'type' => ['sometimes', 'string',Rule::enum(RoomTypeEnum::class)],
            'price_per_night' => 'sometimes|numeric'
        ];
    }
}
