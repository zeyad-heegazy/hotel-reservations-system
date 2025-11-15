<?php

namespace App\Http\Requests\Guest;

use App\Enums\RoomTypeEnum;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UpdateGuestRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:guests,id',
            'name' => 'sometimes|string',
            'email' => 'sometimes|string|email',
            'phone' => 'sometimes|string',
        ];
    }
}
