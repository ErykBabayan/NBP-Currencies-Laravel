<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /** @var string[]  */
    protected $fillable = [
            'name',
            'currency_code',
            'exchange_rate',
        ];

    use HasFactory;
}
