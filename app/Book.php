<?php

namespace App;

class Book extends Model
{
	protected $fillable = [
		'book_name',
		'book_author',
		'book_category',
		'book_location',
		'call_mark',
		'stock_qty',
		'pop',
		'yop',
		'collation',
		'isbn',
		'bar_num',
	];

	public function locations() {
        return $this->hasMany(BookLocation::class);
    }
}
