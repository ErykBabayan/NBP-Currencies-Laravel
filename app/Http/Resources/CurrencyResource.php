<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $currency = $this->resource;

        return [
            'id'            => $currency->id,
            'name'          => $currency->name,
            'currency_code' => $currency->currency_code,
            'exchange_rate' => $currency->exchange_rate,
        ];
    }
}
