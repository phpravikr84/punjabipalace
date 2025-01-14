<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code', 'item_name', 'item_category_id', 'uom_id', 'uom_name'
    ];

     /**
     * Define a relationship with the Uom model.
     */
    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id');
    }

    /**
     * Define a relationship with the Stock Item Category model.
     */
    public function category()
    {
        return $this->belongsTo(StockItemCategory::class, 'item_category_id');
    }

}