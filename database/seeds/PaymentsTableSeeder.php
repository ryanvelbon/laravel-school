<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {

    	DB::table('payments')->delete();

        $records = DB::table('group_student')->get();

        foreach($records as $record){

        	for ($x = 0; $x <= random_int(0, 4); $x++) {

        		$date_as_int = strtotime(date("Y-m-j"))-(86400*random_int(0,200));

        		DB::table('payments')->insert(
        			['student_id' => $record->student_id,
        			'group_id' => $record->group_id,
        			'amount' => random_int(2,18) * 10,
        			'date' => date("Y-m-j", $date_as_int)]
        		);
			}
        }
    }
}