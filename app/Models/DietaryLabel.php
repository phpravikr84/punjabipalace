<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietaryLabel extends Model
{
    use HasFactory;

    protected $fillable = ['menu_item_id', 'dietary_attribute_id'];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id');
    }

    public function dietaryAttribute()
    {
        return $this->belongsTo(DietaryAttributeMaster::class, 'dietary_attribute_id');
    }
}
