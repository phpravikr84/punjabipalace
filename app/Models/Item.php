<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code',
        'item_name',
        'item_category_id',
        'uom_id',
        'uom_name'
    ];

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class);
    }
}

