<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artists;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            [
                Artists::FIELD_NAME=>'Skillet',
                Artists::FIELD_DESCRIPTION => 'Zespół muzyczny łączący w sobie rock i metal',
                Artists::FIELD_TYPE => 'band'
            ],
            [
                Artists::FIELD_NAME=>'Evanescence',
                Artists::FIELD_DESCRIPTION => 'Ich muzyka jest często określana jako nu metal',
                Artists::FIELD_TYPE => 'band'
            ],
            [
                Artists::FIELD_NAME=>'Mike Oldfield',
                Artists::FIELD_DESCRIPTION => 'Twórca OST do gry Metal Gear Solid',
                Artists::FIELD_TYPE => 'solo'
            ],
        ]);
    }
}