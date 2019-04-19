<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('members')->insert([
					[
						'member_id' => '1',
            'member_name' => 'Emmanuel Joseph',
						'member_mat_no' => 168430036,
						'member_fac' => 'Education',
						'member_email' => 'emmanueljet774@gmail.com',
						'member_dept' => 'Computer Science',
						'member_contact' => 9064847962,
					],
					[
						'member_id' => '2',
            'member_name' => 'Micheal Joseph',
						'member_mat_no' => 168430037,
						'member_fac' => 'Management Science',
						'member_email' => 'kayodej245@gmail.com',
						'member_dept' => 'Accounting',
						'member_contact' => 9025250015,
					],
					[
						'member_id' => '3',
            'member_name' => 'Babajide Janet',
						'member_mat_no' => 168430038,
						'member_fac' => 'Sciences',
						'member_email' => 'jomotayo45@gmail.com',
						'member_dept' => 'Plant Science',
						'member_contact' => 8128411482,
					],
					[
						'member_id' => '4',
            'member_name' => 'Bose Micheal',
						'member_mat_no' => 168430039,
						'member_fac' => 'Management Science',
						'member_email' => 'bosem245@gmail.com',
						'member_dept' => 'Accounting',
						'member_contact' => 9064783925,
					],
					[
						'member_id' => '5',
            'member_name' => 'Jetech Emmanuel',
						'member_mat_no' => 168430035,
						'member_fac' => 'Engineering',
						'member_email' => 'jetechunlimited@gmail.com',
						'member_dept' => 'Computer Engineering',
						'member_contact' => '8023438107',
					],
        ]);
    }
}
