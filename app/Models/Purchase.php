<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id', 
        'tran_no', 
        'odate', 
        'delivery_date', 
        'remarks', 
        'file_attach',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
