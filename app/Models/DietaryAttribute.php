<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietaryAttribute extends Model
{
    use HasFactory;
    
     // Define the table name
     protected $table = 'dietary_attributes';

     // Define the fillable fields
     protected $fillable = [
         'attribute',
         'description',
     ];
 
     // Timestamps are automatically managed by Laravel
     public $timestamps = true;
}
