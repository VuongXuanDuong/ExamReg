<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->truncate();

        DB::table('areas')->insert([
            'name' => 'Trường Đại học Công nghệ'
        ]);

        DB::table('areas')->insert([
            'name' => 'Trường Đại học Ngoại ngữ'
        ]);

        DB::table('areas')->insert([
            'name' => 'Trường Đại học Thương Mại'
        ]);

    }
}
