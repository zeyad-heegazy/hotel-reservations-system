<?php

namespace App\Http\Requests\Reservation;

use App\Http\Requests\BaseRequest;

class IndexReservationRequest extends BaseRequest
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
