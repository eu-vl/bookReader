<?php

namespace App\Models\BookReader;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'image_url',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\BookReader\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
