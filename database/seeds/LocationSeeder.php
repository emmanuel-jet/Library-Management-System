<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
							'id'    => 1,
							'name' => 'Faculty Of Education Library',
            ],
						[
							'id'    => 2,
							'name' => 'Faculty Of Art Library',
            ],
						[
							'id'    => 3,
							'name' => 'Faculty Of Science Library',
            ],
						[
							'id'    => 4,
							'name' => 'Faculty Of Management Science Library',
            ],
						[
							'id'    => 5,
							'name' => 'Faculty Of Engineering Library',
            ],
        ]);
    }
}
