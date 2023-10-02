<?php

use App\Cat;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cat::create([
            'name'=>'Web',

        ]);
        Cat::create([
            'name'=>'Desktop App',

        ]);
        Cat::create([
            'name'=>'Mobile app',

        ]);
        Cat::create([
            'name'=>'Gaming app',

        ]);
    }

}
