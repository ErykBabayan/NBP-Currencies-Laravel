<?php

namespace App\Console\Commands;

use App\Service\CurrencyService;
use Illuminate\Console\Command;

class FetchApi extends Command
{
    /** @var string */
    protected $signature = 'app:fetch';

    /** @var string */
    protected $description = 'Fetch NBP Api for Currencies';

    public function handle(): void
    {
        CurrencyService::fetch();
    }
}
