<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $tablename = 'event';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'venue',
        'admission',
        'spaces_left',
        'image',
        'managed_by',
        'is_eventbrite',
        'approved'
    ];

}
