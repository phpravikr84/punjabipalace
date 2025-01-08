<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Emailtemplate extends Model
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $table    = 'emailtemplate';

    public $timestamps = true;

    protected $fillable = [
        'template_title',
        'short_description',
        'content',
        'status',
        'created_at',
        'updated_at',
    ];

    // Add a constructor to set the date format values
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Set the configuration values that DateFormatTrait requires
        self::$getDateFormat = config('constants.GET_DATE_FORMAT');
        self::$getOnlyDateFormat = config('constants.GET_ONLY_DATE_FORMAT');
        self::$setDateFormat = config('constants.SET_DATE_FORMAT');
        self::$setOnlyDateFormat = config('constants.SET_ONLY_DATE_FORMAT');
    }
}
