<?php

use Illuminate\Database\Seeder;

class AirportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            'airport_name' => 'Noi Bai',
            'airport_code' => 'HAN',
            'city_name' => 'Ha Noi'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Tan Son Nhat',
            'airport_code' => 'SGN',
            'city_name' => 'Ho Chi Minh City'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Tokyo International Airport',
            'airport_code' => 'HND',
            'city_name' => 'Tokyo'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Hokaido Airport',
            'airport_code' => 'HKO',
            'city_name' => 'Hokaido'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Shanghai International Airport',
            'airport_code' => 'SHI',
            'city_name' => 'Shanghai'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Beijing International Airport',
            'airport_code' => 'BEG',
            'city_name' => 'Beijing'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Kennendy International Airport',
            'airport_code' => 'KEN',
            'city_name' => 'New York'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'San Francisco International Airport',
            'airport_code' => 'SAN',
            'city_name' => 'San Francisco'
        ]);

    }
}
