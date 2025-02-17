<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'comment',
    ];

    // public function book()
    // {
    //     return $this->belongsTo(Book::class);
    // }

    public function user()
    {
        return $this->belongsTo(User2::class);
    }
}


