<?php

use App\Sword;
use Illuminate\Database\Seeder;

class SwordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newSword = new Sword;
        $newSword->name = "Broad Sword";
        $newSword->damage = 15;
        $newSword->price = 15.5;
        $newSword->save();

        $newSword = new Sword;
        $newSword->name = "Bastard Sword";
        $newSword->damage = 10;
        $newSword->price = 12.5;
        $newSword->save();

        $newSword = new Sword;
        $newSword->name = "Double Handed Sword";
        $newSword->damage = 25;
        $newSword->price = 22.5;
        $newSword->save();

        factory(App\Sword::class, 50)->create();
    }
}
