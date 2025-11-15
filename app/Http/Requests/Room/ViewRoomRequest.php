<?php

namespace App\Http\Requests\Room;

use App\Http\Requests\BaseRequest;

class ViewRoomRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'id' => 'required|exists:rooms,id',
        ];
    }
}
