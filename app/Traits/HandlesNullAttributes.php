<?php
// app/Traits/HandlesNullAttributes.php

namespace App\Traits;
trait HandlesNullAttributes
{
    protected static function bootHandlesNullAttributes()
    {
        static::retrieved(function ($model) {
            $model->handleNullAttributes();
        });
    }

    protected function handleNullAttributes()
    {
        $skipFields = [
            'created_at',
            'updated_at',
            'deleted_at',
            'email_verified_at'
        ];

        foreach ($this->fillable ?? [] as $attribute) {
            if (in_array($attribute, $skipFields)) {
                continue;
            }
            $this->attributes[$attribute] = !empty($this->attributes[$attribute]) ? $this->attributes[$attribute] : '-';
        }
    }

}
