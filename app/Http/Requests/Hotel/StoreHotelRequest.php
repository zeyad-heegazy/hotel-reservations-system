<?php

namespace App\Http\Requests\Hotel;

use App\Http\Requests\BaseRequest;

class StoreHotelRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string'
        ];
    }
}
