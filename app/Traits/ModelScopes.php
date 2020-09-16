<?php

namespace App\Traits;

trait ModelScopes
{
    public function scopeOrder($q, $field, $sort = 'asc')
    {
        return $q->orderBy($field, $sort);
    }
}
