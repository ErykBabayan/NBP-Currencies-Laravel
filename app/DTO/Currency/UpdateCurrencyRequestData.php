<?php

namespace App\DTO\Currency;

use Spatie\LaravelData\Data;

class UpdateCurrencyRequestData extends Data
{
    public function __construct(
        public string $name,
        public string $currencyCode,
        public int $exchangeRate,
    ) {
    }

    /** @param array<string|int> $array */
    public static function fromArray(array $array): self
    {
        return new self(
            name: $array['name'],
            currencyCode: $array['currencyCode'],
            exchangeRate: $array['exchangeRate'],
        );
    }

}
