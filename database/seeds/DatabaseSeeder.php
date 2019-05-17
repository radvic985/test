<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('WorkshopSeeder');
    }
}

class WorkshopSeeder extends Seeder
{

    public function run()
    {
        DB::table('workshops')->delete();

        $workshops = [
            ['day' => 'June 1st', 'time' => '9AM - 12PM', 'slot' => '5'],
            ['day' => 'June 1st', 'time' => '12PM - 3PM', 'slot' => '5'],
            ['day' => 'June 1st', 'time' => '3PM - 6PM', 'slot' => '7'],
            ['day' => 'June 2nd', 'time' => '9AM - 12PM', 'slot' => '5'],
            ['day' => 'June 2nd', 'time' => '12PM - 3PM', 'slot' => '5'],
            ['day' => 'June 2nd', 'time' => '3PM - 6PM', 'slot' => '12'],
            ['day' => 'June 3rd', 'time' => '9AM - 12PM', 'slot' => '5'],
            ['day' => 'June 3rd', 'time' => '12PM - 3PM', 'slot' => '7'],
            ['day' => 'June 3rd', 'time' => '3PM - 6PM', 'slot' => '5'],
        ];
        DB::table('workshops')->insert($workshops);
    }

}