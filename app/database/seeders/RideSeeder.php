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
            'id' => 1,
            'start' => DB::raw(("(ST_GeomFromText('POINT(51.0838286 3.7250121)'))")),
            'destination' => DB::raw(("(ST_GeomFromText('POINT(51.09 3.7350121)'))")),
            'start_time' => Carbon::create(2022, 8, 30, 12, 00, 00, 'Europe/Brussels'),
            'end_time' => Carbon::create(2022, 8, 31, 12, 00, 00, 'Europe/Brussels'),
            'type' => 'request',
            'user1_id' => '1',
            'user2_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
