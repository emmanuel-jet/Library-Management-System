<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersTableSeeder::class);
			$this->call(CategorySeeder::class);
			$this->call(LocationSeeder::class);
			$this->call(BookSeeder::class);
			$this->call(MemberSeeder::class);
    }
        
		// $path = 'db/lms.sql';
		// DB::unprepared(file_get_contents($path));
		// $this->command->info('Databases seeded Successfully!');
}

