<?php

namespace App\Http\Requests\Guest;

use App\Enums\RoomTypeEnum;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class StoreGuestRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
        ];
    }
}
