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
						'member_mat_no' => 1380001,
						'member_fac' => 'Education',
						'member_email' => '1380001@st.eksu.edu.ng',
						'member_dept' => 'Computer Science',
						'member_contact' => 9012345678,
					],
					[
						'member_id' => '2',
            'member_name' => 'Micheal Joseph',
						'member_mat_no' => 1380002,
						'member_fac' => 'Management Science',
						'member_email' => '1380002@st.eksu.edu.ng',
						'member_dept' => 'Accounting',
						'member_contact' => 8123456789,
					],
					[
						'member_id' => '3',
            'member_name' => 'Babajide Janet',
						'member_mat_no' => 1380003,
						'member_fac' => 'Sciences',
						'member_email' => '1380003@st.eksu.edu.ng',
						'member_dept' => 'Plant Science',
						'member_contact' => 7098765432,
					],
					[
						'member_id' => '4',
            'member_name' => 'Bose Micheal',
						'member_mat_no' => 1380004,
						'member_fac' => 'Management Science',
						'member_email' => '1380004@st.eksu.edu.ng',
						'member_dept' => 'Accounting',
						'member_contact' => 9087654321,
					],
					[
						'member_id' => '5',
            'member_name' => 'Jetech Emmanuel',
						'member_mat_no' => 1380005,
						'member_fac' => 'Engineering',
						'member_email' => '1380005@st.eksu.edu.ng',
						'member_dept' => 'Computer Engineering',
						'member_contact' => '7123456789',
					],
        ]);
    }
}
