<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'companyname',
        'company_logo',
        'contact_person_name',
        'company_type',
        'caddr',
        'city',
        'dist',
        'pin',
        'state',
        'country',
        'cmob',
        'cphone',
        'designation',
        'registrationno',
        'tinno',
        'remarks',
        'active',
    ];
}
