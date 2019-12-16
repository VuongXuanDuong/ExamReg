<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExamRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_rooms')->insert([
            'exam_shift_id' => '1',
            'room_id' => '1',
            'name' => 'Phòng thi số 1'
        ]);

        DB::table('exam_rooms')->insert([
            'exam_shift_id' => '1',
            'room_id' => '4',
            'name' => 'Phòng thi số 2'
        ]);

        DB::table('exam_rooms')->insert([
            'exam_shift_id' => '1',
            'room_id' => '2',
            'name' => 'Phòng thi số 3'
        ]);
    }
}
