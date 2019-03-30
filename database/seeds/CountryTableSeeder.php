<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('countries')->insert([
            'country_name' => 'Viet Nam'
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Japan'
        ]);

        DB::table('countries')->insert([
            'country_name' => 'China'
        ]);

        DB::table('countries')->insert([
            'country_name' => 'America'
        ]);
    }
}
