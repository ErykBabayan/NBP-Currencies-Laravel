<?php

namespace App\Service;

use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CurrencyService
{
    /** @var string  */
    public const BASE_URL = 'https://api.nbp.pl/api/exchangerates/tables/B?format=json';

    public static function fetch(): void
    {
        $query = Http::get(self::BASE_URL);
        $data = json_decode($query->body(), true);
        foreach ($data[0]['rates'] as $currency) {
            Currency::query()->updateOrCreate([
                'name' => $currency['currency'],
                'currency_code' => $currency['code']
            ],[
                'name' => $currency['currency'],
                'currency_code' => $currency['code'],
                'exchange_rate' => $currency['mid'] * 100
            ]);
        }
    }
}
