<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function sanitized(): array
    {
        return $this->validated();
    }

    protected function prepareForValidation(): void
    {
        $cleaned = array_map(function ($value) {
            return is_string($value) ? trim($value) : $value;
        }, $this->all());

        $this->merge($cleaned);
    }

    public function rules(): array
    {
        return [];
    }
}
