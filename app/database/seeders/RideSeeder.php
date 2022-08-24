<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rides')->insert([
            'lat_start' => 52.0838286,
            'lng_start' => 3.7250121,
            'lat_destination' => 52.09,
            'lng_destination' => 3.7250121,
            'start_time' => Carbon::create(2022, 7, 20, 10, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 7, 20, 11, 30, 00, 'Europe/Brussels'),
            'type' => 'finished',
            'user1_id' => '1',
            'user2_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('rides')->insert([
            'lat_start' => 51.0838286,
            'lng_start' => 3.7250121,
            'lat_destination' => 51.09,
            'lng_destination' => 3.7250121,
            'start_time' => Carbon::create(2022, 8, 30, 12, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 8, 30, 14, 30, 00, 'Europe/Brussels'),
            'type' => 'match',
            'user1_id' => '1',
            'user2_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('rides')->insert([
            'lat_start' => 51.0538286,
            'lng_start' => 3.7250121,
            'lat_destination' => 51.07,
            'lng_destination' => 3.7350121,
            'start_time' => Carbon::create(2022, 9, 1, 12, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 9, 1, 14, 00, 00, 'Europe/Brussels'),
            'type' => 'request',
            'user1_id' => '1',
            'user2_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
