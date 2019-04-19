<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookLocation extends Model
{
    protected $table = 'book_location';

    protected $fillable = [
        'book_id', 'location'
    ];//

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
