<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'name' => 'Toán trong công nghệ',
            'code' => 'MAT2029 1',
            'subject_code' => 'MAT2029'
        ]);

        DB::table('modules')->insert([
            'name' => 'Phát triển ứng dụng web',
            'code' => 'DEVE221 2',
            'subject_code' => 'DEVE221'
        ]);

        DB::table('modules')->insert([
            'name' => 'Lập trình hướng đối tượng',
            'code' => 'OOP1121 3',
            'subject_code' => 'OOP1121'
        ]);

        DB::table('modules')->insert([
            'name' => 'Dự án',
            'code' => 'ELT2029 4',
            'subject_code' => 'ELT2029'
        ]);
    }
}
