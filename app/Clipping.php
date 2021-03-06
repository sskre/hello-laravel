<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clipping extends Model
{
    protected $fillable = [
        'url',
        'title',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
