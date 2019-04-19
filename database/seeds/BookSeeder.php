<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
							'id'    => 1,
							'book_name' => 'The Maze Runner',
							'book_author' => 'James Dashner',
							'pop' => 'Lagos',
							'yop' => 2017,
							'collation' => 'Lagos',
							'isbn' => 'Lagos2017',
							'bar_num' => '678369HDID',
							'call_mark' => 'LA-21',
							'book_category' => 1,
							'book_location' => 'Faculty Of Management Science Library',
							'stock_qty' => 5,
            ],
						[
							'id'    => 2,
							'book_name' => 'Why Should I Learn To Code',
							'book_author' => 'Emmanuel Joseph',
							'pop' => 'Lagos',
							'yop' => 2017,
							'collation' => 'Lagos',
							'isbn' => 'Lagos2017',
							'bar_num' => '678369HDID',
							'call_mark' => 'LA-22',
							'book_category' => 2,
							'book_location' => 'Faculty Of Education Library',
							'stock_qty' => 5,
            ],
						[
							'id'    => 3,
							'book_name' => 'The Selection',
							'book_author' => 'Kiera Cass',
							'pop' => 'Lagos',
							'yop' => 2017,
							'collation' => 'Lagos',
							'isbn' => 'Lagos2017',
							'bar_num' => '678369HDID',
							'call_mark' => 'LA-23',
							'book_category' => 3,
							'book_location' => 'Faculty Of Art Library',
							'stock_qty' => 5,
            ],
						[
							'id'    => 4,
							'book_name' => 'Scientific Wonders on Earth & in Space',
							'book_author' => 'Yusuf Al-Hajj Ahmad',
							'pop' => 'Lagos',
							'yop' => 2017,
							'collation' => 'Lagos',
							'isbn' => 'Lagos2017',
							'bar_num' => '678369HDID',
							'call_mark' => 'LA-24',
							'book_category' => 4,
							'book_location' => 'Faculty Of Engineering Library',
							'stock_qty' => 5,
            ],
						[
							'id'    => 5,
							'book_name' => '8 guideline on Chemistry',
							'book_author' => 'Darussalam',
							'pop' => 'Lagos',
							'yop' => 2017,
							'collation' => 'Lagos',
							'isbn' => 'Lagos2017',
							'bar_num' => '678369HDID',
							'call_mark' => 'LA-25',
							'book_category' => 5,
							'book_location' => 'Faculty Of Science Library',
							'stock_qty' => 5,
            ],
        ]);
    }
}
