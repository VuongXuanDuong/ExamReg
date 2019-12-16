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
            'code' => 'ELT2029 1',
            'subject_code' => 'ELT2029'
        ]);

        DB::table('modules')->insert([
            'name' => 'Toán trong công nghệ',
            'code' => 'ELT2029 2',
            'subject_code' => 'ELT2029'
        ]);

        DB::table('modules')->insert([
            'name' => 'Toán trong công nghệ',
            'code' => 'ELT2029 3',
            'subject_code' => 'ELT2029'
        ]);

        DB::table('modules')->insert([
            'name' => 'Toán trong công nghệ',
            'code' => 'ELT2029 4',
            'subject_code' => 'ELT2029'
        ]);
    }
}
