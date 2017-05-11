<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clipping extends Model
{
    protected $fillable = [
        'url',
        'title',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
