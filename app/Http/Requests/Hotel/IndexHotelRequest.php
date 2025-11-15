<?php

namespace App\Http\Requests\Hotel;

use App\Http\Requests\BaseRequest;

class IndexHotelRequest extends BaseRequest
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
