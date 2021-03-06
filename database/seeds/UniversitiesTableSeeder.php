<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            'name' => 'Trường Đại học Khoa học Tự nhiên',
            'short_name' => 'HUS'
        ]);

        DB::table('universities')->insert([
            'name' => 'Trường Đại học Khoa học Xã hội và Nhân văn',
            'short_name' => 'USSH'
        ]);

        DB::table('universities')->insert([
            'name' => 'Trường Đại học Ngoại ngữ',
            'short_name' => 'ULIS'
        ]);

        DB::table('universities')->insert([
            'name' => 'Trường Đại học Công nghệ',
            'short_name' => 'UET'
        ]);

        DB::table('universities')->insert([
            'name' => 'Trường Đại học Kinh tế',
            'short_name' => 'UEB'
        ]);
    }
}
