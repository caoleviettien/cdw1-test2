<?php

use Illuminate\Database\Seeder;

class AirplaneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airplanes')->insert([
            'airplane_name' => 'Vietnam Airlines'
        ]);

        DB::table('airplanes')->insert([
            'airplane_name' => 'VietJet Air'
        ]);

        DB::table('airplanes')->insert([
            'airplane_name' => 'Japan Airlines'
        ]);
        DB::table('airplanes')->insert([
            'airplane_name' => 'Bamboo Airways'
        ]);

        DB::table('airplanes')->insert([
            'airplane_name' => 'China Airways'
        ]);

        DB::table('airplanes')->insert([
            'airplane_name' => 'American Airlines'
        ]);
    }
}
