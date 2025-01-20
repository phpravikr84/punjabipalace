<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

     // Define the table name
     protected $table = 'tables';

     // Define the fillable fields
     protected $fillable = [
         'table_no',
         'seating_capacity',
         'icon_image'
     ];
 
     // Timestamps are automatically managed by Laravel
     public $timestamps = true;
     
}
