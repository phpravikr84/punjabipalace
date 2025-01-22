<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id', 
        'item_id', 
        'uom_id', 
        'quantity', 
        'unit_price', 
        'total_price', 
        'stock_item_type', 
        'tran_type', 
        'remarks',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }
}
