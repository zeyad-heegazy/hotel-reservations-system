<?php

namespace App\Http\Requests\Room;

use App\Http\Requests\BaseRequest;

class CreateRoomRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [];
    }
}
