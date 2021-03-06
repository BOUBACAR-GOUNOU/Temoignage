<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{   protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('Laravel\User');
    }
}
