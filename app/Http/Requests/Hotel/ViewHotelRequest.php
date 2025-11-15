<?php

namespace App\Http\Requests\Hotel;

use App\Http\Requests\BaseRequest;

class ViewHotelRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'id' => 'required|exists:hotels,id',
        ];
    }
}
