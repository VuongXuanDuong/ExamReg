<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExamShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_shifts')->insert([
            'exam_id' => '2',
            'module_id' => '1'
        ]);

        DB::table('exam_shifts')->insert([
            'exam_id' => '2',
            'module_id' => '2'
        ]);

        DB::table('exam_shifts')->insert([
            'exam_id' => '2',
            'module_id' => '3'
        ]);
    }
}
