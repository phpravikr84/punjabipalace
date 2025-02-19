<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table    = 'roles';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'guard_name',
        'created_at',
        'updated_at',
    ];
}
