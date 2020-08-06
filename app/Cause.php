<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $casts = [
        'causes' => 'array'
    ];

    public function setOptionsAttribute($causes)
{
    $this->attributes['causes'] = json_encode($causes);
}
}
