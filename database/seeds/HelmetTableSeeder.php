<?php

use Illuminate\Database\Seeder;
use App\Helmet;

class HelmetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $helm = new Helmet;
        $helm->name = 'Full Helmet';
        $helm->damage = 0;
        $helm->price = 30.0;
        $helm->save();

        //add factory here
        factory(App\Helmet::class, 50)->create();
    }
}
