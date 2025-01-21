<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_category_name', 
        'item_category_desc'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
