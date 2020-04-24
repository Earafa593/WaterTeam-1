<?php

use App\Water_quality;
use Illuminate\Database\Seeder;

class Water_qualityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Water_quality;
        $a->name = "Good";
        $a->save();
    }
}
