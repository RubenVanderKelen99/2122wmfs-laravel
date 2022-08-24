<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Ruben Van der Kelen',
            'email' => 'ruben.vanderkelen@student.odisee.be',
            'password' => Hash::make('Azerty123'),
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        for ($i = 2; $i <= 10; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => 'user ' . $i,
                'email' => 'user' . $i . '@email.com',
                'password' => Hash::make('Azerty123'),
                'email_verified_at' => null,
                'remember_token' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
