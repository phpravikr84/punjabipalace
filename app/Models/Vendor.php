<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = [
        'uid', 'sname', 'tax_number', 'saddr', 'scity', 'sdist', 'spin', 'sstate', 'scountry',
        'scperson', 'scmob', 'sphone', 'cin', 'pan', 'email', 'accholder', 'accno', 'bankname',
        'bankbranch', 'ifsc', 'remarks', 'infotext'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
}
