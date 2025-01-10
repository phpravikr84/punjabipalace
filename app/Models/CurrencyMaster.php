<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_code',
        'currency_name',
        'default_currency',
        'created_at',
        'updated_at'
    ];
}
