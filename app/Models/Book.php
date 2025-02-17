<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'writer',
        'user_id',
        'category_id',
        'publisher',
        'year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    // public function loan()
    // {
    //     return $this->hasMany(Loan::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
