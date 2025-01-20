<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'uoms';

    // Define the fillable fields
    protected $fillable = [
        'uom_name',
        'uom_desc',
    ];

    // Timestamps are automatically managed by Laravel
    public $timestamps = true;
}
