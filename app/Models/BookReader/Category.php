<?php

namespace App\Models\BookReader;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function books()
    {
        return $this->belongsToMany('App\Models\BookReader\Book');
    }

    public function filteredBooks()
    {
        return $this->belongsToMany('App\Models\BookReader\Book')
            ->wherePivot('category_id', $this->id)
            ->orderBy('updated_at', 'DESC');
    }
}
