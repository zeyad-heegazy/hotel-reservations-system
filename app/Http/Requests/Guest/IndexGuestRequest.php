<?php

namespace App\Http\Requests\Guest;

use App\Http\Requests\BaseRequest;

class IndexGuestRequest extends BaseRequest
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
