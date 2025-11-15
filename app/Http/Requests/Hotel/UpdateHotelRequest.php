<?php

namespace App\Http\Requests\Hotel;

use App\Http\Requests\BaseRequest;

class UpdateHotelRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'id' => 'required|exists:hotels,id',
            'name' => 'sometimes|string',
            'address' => 'sometimes|string'
        ];
    }
}
