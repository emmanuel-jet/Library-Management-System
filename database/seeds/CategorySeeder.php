<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
					[
						'id' => '1',
            'name' => 'Mathematics',
					],
          [
						'id' => '2',
            'name' => 'Computer Science',
					], 
					[
						'id' => '3',
            'name' => 'Education',
					],
					[
						'id' => '4',
            'name' => 'Physics',
					],
					[
						'id' => '5',
            'name' => 'Chemistry',
					],
        ]);
    }
}
