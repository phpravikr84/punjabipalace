<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    // Specify the table name explicitly (not necessary if it follows Laravel's naming convention)
    protected $table = 'menu_items';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_bom',
        'stock_id',
        'menu_type',
        'category_id',
        'menu_id',
    ];

    /**
     * Define a relationship with the Stock model.
     */
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    /**
     * Define a relationship with the MenuCategory model.
     */
    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }

    /**
     * Define a relationship with the Menu model.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    /**
     * Define a relationship with dietary labels, if applicable.
     */
    public function dietaryLabels()
    {
        return $this->belongsToMany(DietaryLabel::class, 'menu_item_dietary_label', 'menu_item_id', 'dietary_label_id');
    }
}
