<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'currency_code' => [
                'required',
                'string'
            ],
            'exchange_rate' => [
                'required',
                'int'
            ],
        ];
    }
}
