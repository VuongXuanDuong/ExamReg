<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(UniversitiesTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(ExamShiftsTableSeeder::class);
        $this->call(ExamRoomsTableSeeder::class);
        $this->call(AreasTableSeeder::class);
    }
}
