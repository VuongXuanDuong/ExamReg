<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name'=>'210-G2',
            'total_computer'=>'30',
            'area_id' => '1'
        ]);
//        DB::table('rooms')->truncate();
//        factory(Room::class, 10)->create();

        DB::table('rooms')->insert([
            'name' => '201-G2',
            'total_computer' => '40',
            'area_id' => '1'
        ]);

        DB::table('rooms')->insert([
            'name' => '202-G2',
            'total_computer' => '40',
            'area_id' => '1'
        ]);

        DB::table('rooms')->insert([
            'name' => '207-G2',
            'total_computer' => '40',
            'area_id' => '1'
        ]);

        DB::table('rooms')->insert([
            'name' => '208-G2',
            'total_computer' => '40',
            'area_id' => '1'
        ]);
    }
}
