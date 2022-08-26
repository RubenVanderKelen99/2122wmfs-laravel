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

        DB::table('rides')->insert([
            'lat_start' => 50.85900195059725,
            'lng_start' => 4.116697996984888,
            'lat_destination' => 51.06045342743059,
            'lng_destination' => 3.7100268270687886,
            'start_time' => Carbon::create(2022, 9, 1, 16, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 9, 1, 18, 00, 00, 'Europe/Brussels'),
            'type' => 'offer',
            'user1_id' => '3',
            'user2_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('rides')->insert([
            'lat_start' => 51.04643223077092,
            'lng_start' => 3.74235719823259351,
            'lat_destination' => 50.93141606783226,
            'lng_destination' => 4.065817849534523,
            'start_time' => Carbon::create(2022, 9, 2, 8, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 9, 2, 9, 00, 00, 'Europe/Brussels'),
            'type' => 'offer',
            'user1_id' => '4',
            'user2_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('rides')->insert([
            'lat_start' => 51.00348395850357,
            'lng_start' => 3.6776991693953414,
            'lat_destination' => 51.08128153924863,
            'lng_destination' => 2.598934333795222,
            'start_time' => Carbon::create(2022, 9, 3, 12, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 9, 3, 14, 00, 00, 'Europe/Brussels'),
            'type' => 'request',
            'user1_id' => '5',
            'user2_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('rides')->insert([
            'lat_start' => 51.031489414463515,
            'lng_start' => 2.3745126958907488,
            'lat_destination' => 50.41820368729852,
            'lng_destination' => 4.446042351396847,
            'start_time' => Carbon::create(2022, 9, 11, 8, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 9, 11, 18, 00, 00, 'Europe/Brussels'),
            'type' => 'request',
            'user1_id' => '6',
            'user2_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
