<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'title',
        'thumbnail',
        'description',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
