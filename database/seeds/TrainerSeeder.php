<?php

use App\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Trainer::create([
            'name'=>'Reham Ahmed',
            'spec'=>'Full stack',
            'img'=>'img1.png'
        ]);
        Trainer::create([
            'name'=>'Rehma Tarek',
            'spec'=>'Backend developer',
            'img'=>'img2.png'
        ]);
        Trainer::create([
            'name'=>'Hany Tarek',
            'spec'=>'Frontend developer',
            'img'=>'img3.png'
        ]);
        Trainer::create([
            'name'=>'Karam Ayman',
            'spec'=>'Testing developer',
            'img'=>'img4.png'
        ]);
    }
}
